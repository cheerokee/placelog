<?php
namespace Financial\Service;

use Base\Service\AbstractService;

class Payment extends AbstractService{
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);
        $this->entity = __NAMESPACE__ . '\Entity\\' . __CLASS__;
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