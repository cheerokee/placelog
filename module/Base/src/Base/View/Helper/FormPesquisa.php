<?php
namespace Base\View\Helper;

use Zend\Form\Form;
use Zend\View\Helper\AbstractHelper;

class FormPesquisa extends AbstractHelper
{
    public function __invoke()
    {
        $view = $this->getView();
        $form_search = $view->form_search;
        if($form_search instanceof Form){
            $form_search->setAttribute('action', $view->url($view->rota(), array(
                'controller' => $view->rota('controller'),
                'action' => $view->rota('action')
            )));
            $form_search->prepare();
            $output = "";
            $output .= $view->form(null, \TwbBundle\Form\View\Helper\TwbBundleForm::LAYOUT_HORIZONTAL)
                ->openTag($form_search);
            $output .= $view->formCollection($form_search);
            $output .= $view->form()->closeTag();
            return $output;
        }
        return '';
    }
}