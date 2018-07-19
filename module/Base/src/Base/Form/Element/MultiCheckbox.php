<?php
namespace Base\Form\Element;

use DoctrineModule\Form\Element\ObjectMultiCheckbox;
use Zend\Stdlib\ArrayUtils;

class MultiCheckbox extends ObjectMultiCheckbox
{
    public function setValue($value)
    {
        
        if ($value instanceof \Traversable)
        {
            $value = ArrayUtils::iteratorToArray($value);

            foreach ($value as $key => $row)
            {
                $values[] = $row->getId();
            }

            return parent::setValue($values);
        }
        elseif ($value == null)
        {
            return parent::setValue(array());
        }
        elseif (!is_array($value))
        {
            return parent::setValue((array)$value);
        }
    }
}