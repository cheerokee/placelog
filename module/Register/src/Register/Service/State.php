<?php
namespace Register\Service;

use Base\Service\AbstractService;

class State extends AbstractService{
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Register\Entity\State';
    }

    public function insert(array $data)
    {
        $entity = parent::insert($data); // TODO: Change the autogenerated stub
    }

    public function update(array $data)
    {
        $entity = parent::update($data);
    }
}


























?>