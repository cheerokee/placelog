<?php

namespace Register\Form;

use Base\Form\FormBase;
//use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class Person  extends FormBase
{

    public function __construct(EntityManager  $objectManager) {
        parent::__construct('person', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setInputFilter(new PersonFilter());
        
        $this->setAttribute('method', 'post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $field = new \Zend\Form\Element\Hidden('friendlyUrl');
        $this->add($field);
        
        $criteria = Criteria::create();
        $criteria->where($criteria->expr()->neq('name', 'superadmin'));
        $criteria->orderBy(array('id' => 'ASC'));

        $typePerson = new \Zend\Form\Element\Select("type_person");
        $typePerson->setLabel($this->translate("Tipo de Pessoa: *"))
            ->setValueOptions(array(
                '0' => $this->translate("Física"),
                '1' => $this->translate("Jurídica")
            ))
            ->setAttribute('value','0')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($typePerson);

        $document = new \Zend\Form\Element\Text("document");
        $document->setLabel($this->translate("Documento: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('CPF para pessoa Física ou CNPJ para pessoa Jurídica'));
        $this->add($document);

        $name = new \Zend\Form\Element\Text("name");
        $name->setLabel($this->translate("Nome: *"))
                ->setAttribute('class','form-control')
                ->setAttribute('required','required')
                ->setAttribute('placeholder',$this->translate('Entre com o nome'));
        $this->add($name);

        $friendlyUrl = new \Zend\Form\Element\Hidden("friendlyUrl");
        $this->add($friendlyUrl);

        $email = new \Zend\Form\Element\Text("email");
        $email->setLabel($this->translate("Email: *"))
                ->setAttribute('class','form-control')
                ->setAttribute('required','required')
                ->setAttribute('placeholder',$this->translate('Entre com o Email'));
        $this->add($email);

        $phone = new \Zend\Form\Element\Text("phone");
        $phone->setLabel($this->translate("Telefone: *"))
            ->setAttribute('class','form-control telefone')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Entre com o telefone'));
        $this->add($phone);

        $celphone = new \Zend\Form\Element\Text("celphone");
        $celphone->setLabel("Celular: ")
            ->setAttribute('class','form-control telefone')
            ->setAttribute('placeholder',$this->translate('Entre com o Celular'));
        $this->add($celphone);

        $password = new \Zend\Form\Element\Password("password");
        $password->setLabel($this->translate("Password: "))
                ->setAttribute('class','form-control password')
                ->setAttribute('id','password-cad')
                ->setAttribute('placeholder',$this->translate('Entre com a senha'));
        $this->add($password);
        
        $confirmation = new \Zend\Form\Element\Password("confirmation");
        $confirmation->setLabel($this->translate("Redigite: "))
                ->setAttribute('class','form-control')
                ->setAttribute('placeholder',$this->translate('Redigite a senha'));
        $this->add($confirmation);

//        $this->add(array(
//            'name' => 'company',
//            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
//            'options' => array(
//                'disable_inarray_validator' => true,
//                'object_manager' => $objectManager,
//                'target_class' => 'Register\Entity\Person',
//                'property' => 'name',
//                'display_empty_item' => true,
//                'empty_item_label' => $this->translate('Selecione...'),
//                'is_method' => true,
//                'find_method' => array(
//                    'name' => 'findBy',
//                    'params' => array(
//                        'criteria' => array(),
//                        'orderBy' => array('id' => 'ASC'),
//                    )
//                ),
//                'label' => $this->translate('Empresa'),
//                'column-size' => 'sm-4',
//                'label_attributes' => array('class' => 'col-sm-2 input-sm')
//            ),
//            'attributes' => array(
//                'class' => 'form-control',
//                'disabled' => 'disabled'
//            )
//        ));

        $field = new \Zend\Form\Element\File("image");
        $field  ->setLabel('Foto: ')
                ->setAttribute('placeholder','Altere a imagem');
        $this->add($field);

        $active = new \Zend\Form\Element\Hidden('active');
        $active->setAttribute('value','1');
        $this->add($active);
        
        $this->add(array(
            'name' => 'submit',
            'type'=>'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => $this->translate('Salvar'),
                'class' => 'btn-success'
            )
        ));
    }
}
