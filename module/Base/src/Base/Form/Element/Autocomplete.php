<?php
namespace Base\Form\Element;

use Base\Form\Element\ObjectAutocomplete;

class Autocomplete extends ObjectAutocomplete {
    
    private $initialized = false;
    
    public function setOptions($options) {

        if (!$this->initialized) {
            $options = array_merge($options, array(
                'object_manager' => $options['object_manager'],
            ));
            $this->initialized = true;
        }
        
        parent::setOptions($options);
    }
}