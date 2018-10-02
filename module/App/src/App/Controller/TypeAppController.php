<?php

namespace App\Controller;

use Base\Controller\CrudController;

class TypeAppController extends CrudController
{
    protected $route;

    public function __construct() 
    {
        $this->title = "Tipo de Aplicações";

        $this->table = 'TypeApp';
        $this->entity = 'App\Entity\\'.$this->table ;
        $this->service = 'App\Service\\'.$this->table ;
        $this->form = 'App\Form\\'.$this->table ;
        $this->controller = "TypeApp";
        $this->route = "type-app/default";

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
                'name'=>array(
                    'label' => 'Nome',
                    'list' => true,
                ),
                'key_value'=>array(
                    'label' => 'Valor Chave',
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
