<?php
namespace Catalog\Form;
use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class Stock extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('stock', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $field = new \Zend\Form\Element\Text("description");
        $field->setLabel($this->translate("Descrição: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required');
        $this->add($field);

        $field = new \Zend\Form\Element\Text("quantity");
        $field->setLabel($this->translate("Quantidade: *"))
            ->setAttribute('class','form-control moeda')
            ->setAttribute('required','required');
        $this->add($field);

        $this->add(array(
            'name' => 'sku',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Catalog\Entity\Sku',
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
                'label' => $this->translate('Sku: *'),
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
