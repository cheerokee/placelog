<?php

namespace Acl\Entity;

use Doctrine\ORM\EntityRepository;

class RoleRepository extends EntityRepository
{
    public function fetchParent(){
        $entities = $this->findAll();
        $array = array();

        foreach($entities as $entity)
        {
            $array[$entity->getId()] = $entity->getName();
        }

        return $array;
    }
}