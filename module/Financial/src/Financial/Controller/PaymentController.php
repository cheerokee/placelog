<?php

namespace Financial\Controller;

use Base\Controller\CrudController;

class PaymentController extends CrudController
{
    protected $route;

    public function __construct() 
    {
        $this->title = "Pagamentos";

        $this->table = 'payment';
        $this->entity = 'Financial\Entity\\'.$this->table ;
        $this->service = 'Financial\Service\\'.$this->table ;
        $this->form = 'Financial\Form\\'.$this->table ;
        $this->controller = "payment";
        $this->route = $this->table."/default";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa fa-share-alt-square',
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

    public function  indexAction($list = null)
    {
        return parent::indexAction($list); // TODO: Change the autogenerated stub
    }

    public function editAction($request = null)
    {
        return parent::editAction($request); // TODO: Change the autogenerated stub
    }

    public function newAction($request = null)
    {
        return parent::newAction($request); // TODO: Change the autogenerated stub
    }
}
