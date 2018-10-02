<?php

namespace Acl\Controller;

use Base\Controller\CrudController;

class ResourcesController extends CrudController
{
    protected $route;

    public function __construct()
    {
        $this->title = "Recursos";

        $this->table = 'Resource';
        $this->entity = 'Acl\Entity\\'.$this->table ;
        $this->service = 'Acl\Service\\'.$this->table ;
        $this->form = 'Acl\Form\\'.$this->table ;
        $this->controller = "Resource";
        $this->route = "resources/default";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-share-alt-square',
            'route' => $this->route,
            'controller' => $this->controller,
            'actions' => array(
                'enable' =>true,
                'customs' => array(
                ),
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
            ),
        );
    }
}
