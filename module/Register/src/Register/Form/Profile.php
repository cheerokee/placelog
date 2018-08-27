<?php
namespace Register\Form;

use Base\Form\FormBase;
use Doctrine\ORM\EntityManager;

class Profile extends FormBase {

    public function __construct(EntityManager  $objectManager) {
        parent::__construct('prfile', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setInputFilter(new ProfileFilter());
        $this->setAttribute('method', 'post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
                
        $name = new \Zend\Form\Element\Text("name");
        $name->setLabel('Nome: *')
            ->setAttribute('required','required')
            ->setAttribute('placeholder','Entre com o nome do perfil');
        $this->add($name);

        $this->add(array(
            'name' => 'profile',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Register\Entity\Profile',
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
                'label' => $this->translate('Perfil Pai'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $chave = new \Zend\Form\Element\Text("chave");
        $chave->setLabel('Chave: *')
            ->setAttribute('required','required')
            ->setAttribute('placeholder','Entre com o identificador do perfil');
        $this->add($chave);

        $this->add(array(
            'name'=>'submit',
            'type'=>'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success'
            )
        ));
    }
}
?>