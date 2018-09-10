<?php
namespace Address\Form;

use Base\Form\FormBase;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class Address extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('address', $objectManager);

        $this->setAttribute('method','post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $street = new \Zend\Form\Element\Text("street");
        $street->setLabel($this->translate("Endereço: "))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($street);

        $number = new \Zend\Form\Element\Text("number");
        $number->setLabel($this->translate("Número: "))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($number);

        $zipCode = new \Zend\Form\Element\Text("zipCode");
        $zipCode->setLabel($this->translate("CEP: "))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($zipCode);

        $neighborhood = new \Zend\Form\Element\Text("neighborhood");
        $neighborhood->setLabel($this->translate("Bairro: "))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($neighborhood);

        $this->add(array(
            'name' => 'state',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Register\Entity\State',
                'property' => 'name',
                'display_empty_item' => true,
                'empty_item_label' => $this->translate('Selecione...'),
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('id' => 'ASC'),
                    )
                ),
                'label' => $this->translate('Estado'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'city',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Register\Entity\City',
                'property' => 'name',
                'display_empty_item' => true,
                'empty_item_label' => $this->translate('Selecione...'),
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('id' => 'ASC'),
                    )
                ),
                'label' => $this->translate('Cidade'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name'=>'submit',
            'type'=>'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' =>'Salvar',
                'class' => 'btn-success'
            )
        ));
    }
}
?>