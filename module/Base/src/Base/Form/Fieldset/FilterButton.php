<?php
namespace Base\Form\Fieldset;

use Zend\Form\Fieldset;

class FilterButton extends Fieldset
{
    public function __construct($name = null)
    {
        parent::__construct($name);
        
        $this->setAttribute('class', 'form-inline');
        
        $this->add(
            array(
                'name' => 'button-filter',
                'type' => 'button',
                'attributes' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-success btn-sm',
                    'value' => 'Filtro'
                ),
                'options' => array(
                    'glyphicon' => 'glyphicon glyphicon-search',
                    'label' => gettext('Pesquisar'),
                    'column-size' => 'sm-2'
                )
            ),array(
                'priority' => 0, // Increase value to move to top of form
            )
        );
    }
}