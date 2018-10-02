<?php
namespace Register\Form;

use Base\Form\FormBase;
use Doctrine\ORM\EntityManager;

class Image extends FormBase{
    public function __construct(EntityManager  $objectManager){
        parent::__construct('image', $objectManager);
        $this->setAttribute('method','post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
                
        $title = new \Zend\Form\Element\Text("title");
        $title->setLabel('Título: *');
        $title->setAttribute('required','required');
        $this->add($title);

        $key = new \Zend\Form\Element\File("image");
        $key->setLabel('Imagem: *');
        $key->setAttribute('required','required');
        $this->add($key);

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