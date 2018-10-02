<?php
namespace Admin\Controller;

use Base\Controller\CrudController;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Acl\Permissions\Acl;

class IndexController extends CrudController {
    protected $em;
    
    public function __construct(){

    }

    public function indexAction()
    {
        $allowed = $this->isAllow('Dashboard','Visualizar');

        if($allowed){
            return new ViewModel(array());
        }else{
            return $this->redirect()->toRoute('not-have-permission');
        }
    }
}
