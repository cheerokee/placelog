<?php
namespace Site\Controller;

use Base\Controller\CrudController;

class TestimonyController extends CrudController{
    public function __construct() {
        $this->title = "Depoimentos";
        $this->table = 'Testimony';
        $this->entity = 'Site\Entity\\'.$this->table ;
        $this->service = 'Site\Service\\'.$this->table ;
        $this->form = 'Site\Form\\'.$this->table ;
        $this->controller = "testimony";
        $this->route = 'testimony/defaults';


        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-comment-o',
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
                    'label' => $this->translate('Nome'),
                    'list' => true,
                ),
                'testimony'=>array(
                    'label' => $this->translate('Depoimento'),
                    'list' => true,
                ),
                'image'=>array(
                    'label' => $this->translate('Imagem'),
                    'list' => true,
                ),
                'occupation'=>array(
                    'label' => $this->translate('Ocupação'),
                    'list' => true,
                ),
            ),
        );
    }

}