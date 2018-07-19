<?php

namespace Site\Form;

use Zend\InputFilter\InputFilter;

class BannerFilter  extends InputFilter
{
    
    public function __construct() 
    {
        $this->add(array(
            'name'=>'ativo',
            'required'=>false,
        ));

        $this->add(array(
            'name'=>'cor',
            'required'=>false,
        ));
    }
    
}
