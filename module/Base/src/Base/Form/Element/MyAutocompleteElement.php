<?php
namespace Base\Form\Element;

use Zf2DoctrineAutocomplete\Form\Element\ObjectAutocomplete;

class MyAutocompleteElement extends ObjectAutocomplete {

    private $initialized = false;

    public function setOptions($options) {
        if (!$this->initialized) {
            $options = array_merge($options, array(
                'class' => get_class($this),
                //'object_manager' => $options['em'], // For Doctrine ORM
                //'object_manager' => $options['sm'], // For Doctrine ORM
                'object_manager' => $options['sm']->get('Doctrine\ORM\EntityManager'),
                //'object_manager' => $options['sm'],
                'empty_item_label' => 'Nothing found',
                'select_warning_message' => 'Select a itemName in list'
            ));
            $this->initialized = true;
        }

        parent::setOptions($options);
    }

}