<?php
namespace Base\Form;

use Zend\Form\Form;

class AbstractForm extends Form
{

    public function __construct($name = null, $options = null)
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'
        ));
    }
    
    public function init()
    {
        $this->add(array(
            'name' => 'button-submit',
            'type' => 'button',
            'attributes' => array(
                'type' => 'submit',
                'class' => 'btn btn-success'
            ),
            'options' => array(
                'column-size' => 'sm-12 col-lg-12',
                'label' => 'Salvar Registro'
            )
        ),array(
            'priority' => 0, // Increase value to move to top of form
        ));
    }
}