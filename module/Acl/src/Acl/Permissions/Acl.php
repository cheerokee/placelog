<?php

namespace Acl\Permissions;

use Acl\Entity\HistoryAccess;
use Acl\Entity\Privilege;
use Doctrine\ORM\EntityManager;
use Zend\Permissions\Acl\Acl as ClassAcl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

class Acl extends ClassAcl
{
    protected $roles;
    protected $resources;
    protected $privileges;
    protected $em;

    public function __construct(array $roles, array $resources, array $privileges, EntityManager $em)
    {
        $this->roles = $roles;
        $this->resources = $resources;
        $this->privileges = $privileges;
        $this->em = $em;

        $this->loadRoles();
        $this->loadResources();
        $this->loadPrivileges();
    }

    protected function loadRoles()
    {
        foreach ($this->roles as $role)
        {
            if($role->getParent())
            {
                $this->addRole(new Role($role->getName(),new Role($role->getParent()->getName())));
            }else{
                $this->addRole(new Role($role->getName()));
            }

            if($role->getIsAdmin())
                $this->allow($role->getName(),array(),array());
        }
    }

    protected function loadResources()
    {
        foreach($this->resources as $resource)
        {
            $this->addResource(new Resource($resource->getName()));
        }
    }

    protected function loadPrivileges()
    {
        foreach($this->privileges as $privilege)
        {
            $this->allow($privilege->getRole()->getName(),$privilege->getResource()->getName(),$privilege->getName());
        }
    }

    public function isAllowed($role = null, $resource = null, $privilege = null,$history_register = true)
    {
        $db_role = $this->em->getRepository('Acl\Entity\Role')->findOneByName($role);
        $db_resource = $this->em->getRepository('Acl\Entity\Resource')->findOneByName($resource);


        //APAGANDO O HISTÓRICO DO ANO PASSADO
        $db_history_olds = $this->em->getRepository('Acl\Entity\HistoryAccess')->getByYear(date('Y')-1);

        if(!empty($db_history_olds))
        {
            foreach($db_history_olds as $db_history_old)
            {
                $this->em->remove($db_history_old);
                $this->em->flush();
            }
        }

        //VERFICANDO PERMISSÃO
        $result =  parent::isAllowed($role, $resource, $privilege);
        //Se não tiver permissão procura nos filhos, porque se o filho tiver permissão o pai tem
        while($result === false && $db_role->getParent()){
            $db_role = $db_role->getParent();

            $result =  parent::isAllowed($db_role->getName(), $resource, $privilege);
        }

        if($result){
            $db_privilege = $this->em->getRepository('Acl\Entity\Privilege')->findOneBy(array(
                'role'      =>  $db_role,
                'resource'  =>  $db_resource,
                'name'      =>  $privilege
            ));

            if($db_privilege instanceof Privilege) {
                //Registrando histórico
                /**
                 * @var HistoryAccess $db_history_access
                 */
                if($history_register) {
                    $db_history_access = new HistoryAccess();
                    $db_history_access->setCreatedAt(new \DateTime('now'));
                    $db_history_access->setPrivilege($db_privilege);

                    $this->em->persist($db_history_access);
                    $this->em->flush();
                }
            }
        }

        return $result;
    }

}