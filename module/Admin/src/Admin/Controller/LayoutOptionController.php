<?php
namespace Admin\Controller;

use Base\Controller\CrudController;

class LayoutOptionController extends CrudController{
    public function __construct() {
        $this->title        = "Configuração de Opções de Layout";
        $this->table        = 'LayoutOption';
        $this->entity       = 'Admin\Entity\\'.$this->table ;
        $this->service      = 'Admin\Service\\'.$this->table ;
        $this->form         = 'Admin\Form\\'.$this->table ;
        $this->controller   = "layout-option";
        $this->route        = "layout-option/defaults";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-fw fa fa-image',
            'route' => $this->route,
            'controller' => $this->controller,
            'actions' => array(
                'enable' =>true,
                'defaults' => array(
                    'edit' => array(
                        'enable' => false,
                        'class' => 'btn btn-info',
                        'icon' => 'fa fa-edit'
                    ),
                    'delete' => array(
                        'enable' => false,
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
                'title'=>array(
                    'label' => $this->translate('Título'),
                    'list' => true,
                ),
                'activeStr'=>array(
                    'label' => $this->translate('Ativo'),
                    'list' => true,
                )
            ),
        );
    }

}