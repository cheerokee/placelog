<?php
namespace Acl\Form;

use Base\Form\FormBase;

use Doctrine\Common\Collections\Criteria,
    Doctrine\ORM\EntityManager,
    Zend\Form\Element\Select;

class Action extends FormBase{
    public function __construct(EntityManager  $objectManager,$name = null,$parent = null) {
        parent::__construct('actions', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $field = new \Zend\Form\Element\Text("name");
        $field->setLabel($this->translate("Nome: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required');
        $this->add($field);

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
