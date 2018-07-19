<?php
namespace Register\Form;

use Zend\Form\Form;

class Configuration extends Form{
    public function __construct($name = null, $options = array()){
        parent::__construct('configuration',$options);
        $this->setAttribute('method','post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
                
        $title = new \Zend\Form\Element\Text("title");
        $title->setLabel('Título: *');
        $title->setAttribute('required','required');
        $this->add($title);

        $key = new \Zend\Form\Element\Text("chave");
        $key->setLabel('Chave: *');
        $title->setAttribute('required','required');
        $this->add($key);

        $value = new \Zend\Form\Element\Text("value");
        $value->setLabel('Valor: ');
        $this->add($value);
              
        $this->add(array(
            'name'=>'submit',
            'type'=>'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' =>'Salvar',
                'class' => 'btn-success'
            )
        ));
    }
}
?>