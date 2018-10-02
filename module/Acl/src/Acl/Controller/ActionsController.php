<?php
namespace Acl\Controller;

use Base\Controller\CrudController;

class ActionsController extends CrudController
{
    public function __construct()
    {
        $this->title = "Ações";

        $this->entity       =   "Acl\Entity\Action";
        $this->service      =   "Acl\Service\Action";
        $this->form         =   "Acl\Form\Action";
        $this->controller   =   "Actions";
        $this->route        =   "actions/default";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-fw fa fa-dot-circle-o',
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
                )
            ),
        );
    }
}