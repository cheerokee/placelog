<?php
namespace Admin\Service;

use Base\Service\AbstractService;

class LayoutOption extends AbstractService{
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Admin\Entity\LayoutOption';
    }

    public function insert(array $data)
    {
        $entity = parent::insert($data);
    }

    public function update(array $data)
    {
        $entity = parent::update($data);
    }
}


























?>