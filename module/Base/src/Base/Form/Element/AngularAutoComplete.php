<?php
namespace Base\Form\Element;


use Zend\Form\Element;

class AngularAutoComplete extends Element
{
    protected $attributes = [
        'type' => 'angular'
    ];
    
    public function setOptions($options)
    {
        $options['column-size'] = 'sm-3';
        parent::setOptions($options);
    }
}