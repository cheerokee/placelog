<?php

namespace Catalog\Controller;

use Base\Controller\CrudController;

class SkuController extends CrudController
{
    protected $route;

    public function __construct() 
    {
        $this->title = "Sku";

        $this->table = 'Sku';
        $this->entity = 'Catalog\Entity\\'.$this->table ;
        $this->service = 'Catalog\Service\\'.$this->table ;
        $this->form = 'Catalog\Form\\'.$this->table ;
        $this->controller = "Sku";
        $this->route = "sku/default";

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
                'name'=>array(
                    'label' => 'Nome',
                    'list' => true,
                ),
                'product'=>array(
                    'label' => 'Produto',
                    'list' => true,
                ),
                'weightStr'=>array(
                    'label' => 'Peso',
                    'list' => true,
                ),
                'widthStr'=>array(
                    'label' => 'Largura',
                    'list' => true,
                ),
                'heightStr'=>array(
                    'label' => 'Altura',
                    'list' => true,
                ),
                'lengthStr'=>array(
                    'label' => 'Comprimento',
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
