<?php
namespace Acl\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

class Action extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity = 'Acl\Entity\Action';
    }
}