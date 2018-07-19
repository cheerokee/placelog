<?php
namespace Base\Form;

use Zend\Form\Form;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class FormBase extends Form
{
    public $translate;
    public function __construct($name,ObjectManager $objectManager)
    {
        parent::__construct($name);
        $this->setHydrator(new DoctrineHydrator($objectManager));
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'
        ));
    }

    public function translate($str){
        return $str;
    }
}