<?php

namespace Acl\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function __construct()
    {

    }

    public function indexAction()
    {
        return new ViewModel(array());
    }
}
