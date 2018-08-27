<?php

namespace DataFrete\Controller;

use Base\Controller\CrudController;
use Zend\View\Model\ViewModel;

class DataFreteController extends CrudController
{
    protected $route;

    public function __construct() 
    {

        $this->title = "Data Frete";

        $this->table = "DataFrete";
        $this->entity =     $this->table . '\Entity\Config';
        $this->service =    $this->table . '\Service\Sincronization';
        $this->form =       $this->table . '\Form\Config';
        $this->controller = "DataFrete";
        $this->route = "data-frete/default";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-share-alt-square',
            'route' => $this->route,
            'controller' => $this->controller,
            'actions' => array(
                'enable' =>true,
                'defaults' => array(
                    'edit' => array(
                        'enable' => true,
                        'class' => 'btn btn-info',
                        'icon' => 'fa fa-edit'
                    ),
                    'delete' => array(
                        'enable' => true,
                        'class' => 'btn btn-danger decision',
                        'icon' => 'fa fa-trash'
                    ),
                    'view' => array(
                        'enable' => false,
                        'class' => 'btn btn-info',
                        'icon' => 'fa fa-eye'
                    ),
                ),
            ),
            'fields' => array(
                'id'=>array(
                    'label' => 'Id',
                    'list' => true,
                ),
            ),
        );
    }

    public function indexAction()
    {
    }

    public function configAction()
    {
        $this->layout()->setTemplate('layout/admin_limpo.phtml');
        $form = $this->getServiceLocator()->get($this->form);
        return new ViewModel(array('form' => $form,'title' => 'Data Frete'));
    }

    public function testeAction(){
        $service = $this->getServiceLocator()->get($this->service);
        $service->getValorFrete();
        die;
    }
}
