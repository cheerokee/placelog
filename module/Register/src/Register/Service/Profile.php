<?php
namespace Register\Service;

use Base\Service\AbstractService;

class Profile extends AbstractService{
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Register\Entity\Profile';
    }
}


























?>