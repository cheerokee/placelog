<?php
namespace Register\Form;

use Zend\Form\Form;

class Profile extends Form{
    public function __construct($name = null, $options = array()){
        parent::__construct('profile',$options);
        $this->setAttribute('method','post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
                
        $name = new \Zend\Form\Element\Text("name");
        $name->setLabel('Nome: *')
            ->setAttribute('required','required')
            ->setAttribute('placeholder','Entre com o nome do perfil');
        $this->add($name);

        $chave = new \Zend\Form\Element\Text("chave");
        $chave->setLabel('Chave: *')
            ->setAttribute('required','required')
            ->setAttribute('placeholder','Entre com o identificador do perfil');
        $this->add($chave);

        $information = new \Zend\Form\Element\Textarea("information");
        $information->setLabel('Informação: ')
            ->setAttribute('placeholder','Entre com o nome do perfil');
        $this->add($information);
              
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