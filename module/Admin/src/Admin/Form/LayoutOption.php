<?php
namespace Admin\Form;
use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class LayoutOption extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('layout-option', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $title = new \Zend\Form\Element\Text("title");
        $title->setLabel($this->translate("Título: "))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($title);

        $field = new \Zend\Form\Element\Select("element");
        $field->setLabel($this->translate("Elemento: "))
            ->setValueOptions(array(
                'smart-fixed-header'        => 'Cabeçalho Fixo',
                'smart-fixed-navigation'    => 'Menu Fixo',
                'smart-fixed-ribbon'        => 'Navegação Fixa',
                'smart-fixed-footer'        => 'Rodapé Fixo',
                'smart-fixed-container'     => 'Centralizar em Container',
                'smart-rtl'                 => 'Direita para Esquerda',
                'smart-topmenu'             => 'Menu no Topo',
            ))
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($field);

        $field = new \Zend\Form\Element\Select("active");
        $field->setLabel($this->translate("Ativo: "))
            ->setValueOptions(array(
                '0' => 'Não',
                '1' => 'Sim'
            ))
            ->setAttribute('value','0')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
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
