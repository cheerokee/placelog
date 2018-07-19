<?php
namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Form\Form;

class MostraOptions extends AbstractHelper
{
    public function __invoke($field,$value = '')
    {
        $view = $this->getView();
        if($view->form instanceof Form){
            $elements = $view->form->getElements();
            $options = $elements[$field]->getValueOptions();
            return $options[$value];
        }
        return '';
    }
}