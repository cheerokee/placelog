<?php
namespace Base\Form\Fieldset;

use Zend\Form\Fieldset;

class SubmitCancel extends Fieldset
{
    public function __construct($name = null)
    {
        parent::__construct($name);
        
        $this->setAttribute('class', 'form-inline');
        
        $this->add(
            array(
                'name' => 'button-submit',
                'type' => 'button',
                'attributes' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-success btn-sm',
                    'value' => 'Submit'
                ),
                'options' => array(
                    'glyphicon' => 'floppy-disk',
                    'label' => gettext('Salvar Registro'),
                    'column-size' => 'sm-3'
                )
            ),array(
                'priority' => 0, // Increase value to move to top of form
            )
        );
        
        $this->add(
            array(
                'name' => 'button-cancel',
                'type' => 'button',
                'attributes' => array(
                    'type' => 'button',
                    'onclick' =>'window.history.back();',
                    'class' => 'btn btn-danger btn-sm',
                    'value' => 'Cancel'
                ),
                'options' => array(
                    'glyphicon' => 'ban-circle',
                    'label' => gettext('Cancelar'),
                    'column-size' => 'sm-3',
                ),
                
            ),array(
                'priority' => -1, // Increase value to move to top of form
            )
        );
        
        $this->add(
            array(
                'name' => 'button-reset',
                'type' => 'button',
                'attributes' => array(
                    'type' => 'reset',
                    'class' => 'btn btn-primary btn-sm',
                    'value' => 'Reset'
                ),
                'options' => array(
                    'glyphicon' => 'erase',
                    'label' => gettext('Resetar'),
                    'column-size' => 'sm-3',
                ),
        
            ),array(
                'priority' => -2, // Increase value to move to top of form
            )
        );
        
        
    }
}