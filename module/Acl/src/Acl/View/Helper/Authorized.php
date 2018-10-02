<?php

namespace Acl\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Doctrine\ORM\EntityManager;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

class Authorized extends AbstractHelper implements ServiceLocatorAwareInterface{
    protected $serviceLocator,$em;

    /**
     * @return mixed
     */
    public function getEm()
    {
        return $this->em;
    }

    /**
     * @param mixed $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    public function __invoke($resource,$privilege) {
        $helperPluginManager = $this->getServiceLocator();
        // the second one gives access to... other things.
        $serviceManager = $helperPluginManager->getServiceLocator();
        $this->setEm($serviceManager->get('Doctrine\ORM\EntityManager'));

        $session = (array) $_SESSION['Person'];
        /**
         * @var User $user
         */
        foreach($session as $v){
            if(isset($v['storage']))
                $login = $v['storage'];
        }

        $db_login = $this->getEm()->getRepository('Register\Entity\Person')->findOneById($login->getId());

        $acl        = $serviceManager->get('Acl\Permissions\Acl');
        $roles      = $db_login->getPersonRoles()->getValues();
        $allowed    = false;
        if(!empty($roles)){
            foreach($roles as $role){
                $allowed = $acl->isAllowed($role->getRole()->getName(),$resource,$privilege,false);

                if($allowed)
                {
                    break;
                }
            }
        }

        return $allowed;
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::setServiceLocator()
     */
    public function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::getServiceLocator()
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

}
