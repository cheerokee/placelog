<?php

namespace Acl\Controller;

use Base\Controller\CrudController;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class IndexController extends CrudController
{
    public function __construct()
    {}

    public function indexAction($list = null)
    {
        $allowed = $this->isAllow('Painel de Autorização','Visualizar');

        if($allowed){
            return new ViewModel(array());
        }else{
            return $this->redirect()->toRoute('not-have-permission');
        }
    }
}
