<?php
namespace Site\Form;

use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class Text extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('text', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $title = new \Zend\Form\Element\Text("title");
        $title->setLabel($this->translate("Título: *"))
            ->setAttribute('type','text')
            ->setAttribute('class','form-control');
        $this->add($title);

        $key = new \Zend\Form\Element\Text("key");
        $key->setLabel($this->translate("Chave: *"))
            ->setAttribute('type','text')
            ->setAttribute('class','form-control');
        $this->add($key);

        $text = new \Zend\Form\Element\Textarea("text");
        $text->setLabel($this->translate("Texto: "))
            ->setAttribute('type','textarea')
            ->setAttribute('class','form-control rich-text');
        $this->add($text);

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
