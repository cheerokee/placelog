<?php
namespace Acl\Form;

use Base\Form\FormBase;

use Doctrine\ORM\EntityManager;

class Resource extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('resources', $objectManager);

        $this->setAttribute('method','post');
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $name = new \Zend\Form\Element\Text('name');
        $name->setLabel('Nome')
                ->setAttribute('placeholder','Entre com o nome');
        $this->add($name);

        $this->add(array(
            'name' => 'submit',
            'type'=>'Zend\Form\Element\Submit',
            'attributes' => array(
            'value'=> $this->translate('Salvar'),
            'class' => 'btn-success'
            )
        ));
    }
}
