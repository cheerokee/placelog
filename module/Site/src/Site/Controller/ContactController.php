<?php
namespace Site\Controller;

use Base\Controller\CrudController;

class ContactController extends CrudController{
    public function __construct() {
        $this->title = "Contato";
        $this->table = 'Contact';
        $this->entity = 'Site\Entity\\'.$this->table ;
        $this->service = 'Site\Service\\'.$this->table ;
        $this->form = 'Site\Form\\'.$this->table ;
        $this->controller = "contact";
        $this->route = 'contact/defaults';


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
                'name'=>array(
                    'label' => $this->translate('Nome'),
                    'list' => true,
                ),
                'phone'=>array(
                    'label' => $this->translate('Telefone'),
                    'list' => true,
                ),
                'email'=>array(
                    'label' => $this->translate('E-mail'),
                    'list' => true,
                ),
                'message'=>array(
                    'label' => $this->translate('Mensagem'),
                    'list' => true,
                ),
                'answered'=>array(
                    'label' => $this->translate('Respondido'),
                    'list' => true,
                ),
                'createdAt'=>array(
                    'label' => $this->translate('Criado Em'),
                    'list' => true,
                ),

            ),
        );
    }

}