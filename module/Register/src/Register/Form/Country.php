<?php
namespace Register\Form;
use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class Country extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('', $objectManager);

        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('Id');
        $this->add($id);

        $name = new \Zend\Form\Element\Text("name");
        $name->setLabel("Name: *")
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
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
