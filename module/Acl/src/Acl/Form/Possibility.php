<?php
namespace Acl\Form;

use Base\Form\FormBase;

use Doctrine\Common\Collections\Criteria,
    Doctrine\ORM\EntityManager,
    Zend\Form\Element\Select;

class Possibility extends FormBase{
    public function __construct(EntityManager  $objectManager,$name = null,$parent = null) {
        parent::__construct('possibilities', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $this->add(array(
            'name' => 'resource',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Acl\Entity\Resource',
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
                'label' => $this->translate('Recurso: *'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'action',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Acl\Entity\Action',
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
                'label' => $this->translate('Ação: *'),
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
            'value'=> $this->translate('Salvar'),
            'class' => 'btn-success'
            )
        ));
    }
}
