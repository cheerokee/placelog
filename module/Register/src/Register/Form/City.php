<?php
namespace Register\Form;
use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class City extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('city', $objectManager);

        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('Id');
        $this->add($id);

        $name = new \Zend\Form\Element\Text("name");
        $name->setLabel($this->translate("Nome: *"))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($name);

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
                'label' => $this->translate('Estado: *'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        
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
