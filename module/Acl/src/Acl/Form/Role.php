<?php
namespace Acl\Form;

use Base\Form\FormBase;

use Doctrine\Common\Collections\Criteria,
    Doctrine\ORM\EntityManager,
    Zend\Form\Element\Select;

class Role extends FormBase{
    public function __construct(EntityManager  $objectManager,$name = null,$parent = null) {
        parent::__construct('roles', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $field = new \Zend\Form\Element\Text("name");
        $field->setLabel($this->translate("Nome: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required');
        $this->add($field);

//        $this->add(array(
//            'name' => 'parent',
//            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
//            'options' => array(
//                'disable_inarray_validator' => true,
//                'object_manager' => $objectManager,
//                'target_class' => 'Acl\Entity\Role',
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
//                'label' => $this->translate('Perfil Pai: *'),
//                'column-size' => 'sm-4',
//                'label_attributes' => array('class' => 'col-sm-2 input-sm')
//            ),
//            'attributes' => array(
//                'class' => 'form-control',
//            )
//        ));

        $allParent = array_merge(array(0=>'Nenhum'),$parent);
        $parent = new Select();
        $parent ->setLabel('Herda')
                ->setName('parent')
                ->setOptions(array('value_options' => $allParent));
        $this->add($parent);

        $isAdmin = new \Zend\Form\Element\Checkbox("isAdmin");
        $isAdmin->setLabel("Admin?");
        $this->add($isAdmin);

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
