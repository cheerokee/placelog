<?php
namespace Site\Controller;

use Base\Controller\CrudController;

class TextController extends CrudController{
    public function __construct() {
        $this->title = "Texto";
        $this->table = "Text";
        $this->entity = 'Site\Entity\\'.$this->table ;
        $this->service = 'Site\Service\\'.$this->table ;
        $this->form = 'Site\Form\\'.$this->table ;
        $this->controller = "text";
        $this->route = "text/defaults";


        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-file-text',
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
                'title'=>array(
                    'label' => $this->translate('Título'),
                    'list' => true,
                ),
                'text'=>array(
                    'label' => $this->translate('Texto'),
                    'list' => true,
                ),
                'key'=>array(
                    'label' => $this->translate('Chave'),
                    'list' => true,
                )
            ),
        );
    }
}