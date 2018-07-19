<?php

namespace Register\Form;

use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class BankAccount  extends FormBase{

    public function __construct(EntityManager  $objectManager) {
        parent::__construct('bank-account', $objectManager);
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $this->add(array(
            'name' => 'person',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Register\Entity\Person',
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
                'label' => $this->translate('Usuário: *'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $bank = new \Zend\Form\Element\Text("bank");
        $bank->setLabel($this->translate("Banco: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required');
        $this->add($bank);

        $agency = new \Zend\Form\Element\Text("agency");
        $agency->setLabel($this->translate("Agência: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required');
        $this->add($agency);

        $account = new \Zend\Form\Element\Text("account");
        $account->setLabel($this->translate("Conta: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required');
        $this->add($account);

        $type = new \Zend\Form\Element\Select("type");
        $type->setLabel($this->translate("Tipo: *"))
            ->setValueOptions(array(
                '0' => $this->translate('Corrente'),
                '1' => $this->translate('Poupança')
            ))
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($type);

        $active = new \Zend\Form\Element\Select("active");
        $active->setLabel($this->translate("Ativo: *"))
            ->setValueOptions(array(
                '0' => $this->translate("inativo"),
                '1' => $this->translate("ativo")
            ))
            ->setAttribute('value','1')
            ->setAttribute('class','form-control');
        $this->add($active);

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
