<?php
namespace Transaction\Form;
use Base\Form\FormBase;
use Doctrine\ORM\EntityManager;

class ItemOrder extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('item-order', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $this->add(array(
            'name' => 'product',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Transaction\Entity\Product',
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
                'label' => $this->translate('Produto: *'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'sku',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Transaction\Entity\Sku',
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
                'label' => $this->translate('SKU: *'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'order',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Transaction\Entity\Order',
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
                'label' => $this->translate('Pedido: *'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $field = new \Zend\Form\Element\Text("quantity");
        $field->setLabel($this->translate("Quantidade: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Entre com a quantidade'));
        $this->add($field);

        $field = new \Zend\Form\Element\Text("price");
        $field->setLabel($this->translate("Preço: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Entre com o preço do item'));
        $this->add($field);

        $field = new \Zend\Form\Element\Text("descount");
        $field->setLabel($this->translate("Desconto: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Desconto'));
        $this->add($field);

        $field = new \Zend\Form\Element\Text("freight");
        $field->setLabel($this->translate("Frete: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Entre com o frete'));
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
