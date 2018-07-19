<?php
namespace Site\Service;

use Base\Service\AbstractService;

class Text extends AbstractService{
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Site\Entity\Text';
    }
}


























?>