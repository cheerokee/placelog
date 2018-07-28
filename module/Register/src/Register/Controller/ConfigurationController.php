<?php
namespace Register\Controller;

use Base\Controller\CrudController;
use Register\Entity\Configuration;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\Hydrator;

class ConfigurationController extends CrudController{
    public function __construct(){
        $this->title = $this->translate("Configuração Geral do Sistema");
        $this->table = 'Configuration';
        $this->entity = 'Register\Entity\\'.$this->table ;
        $this->service = 'Register\Service\\'.$this->table ;
        $this->form = 'Register\Form\\'.$this->table ;
        $this->controller = "configuration";
        $this->route = "configuration/defaults";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-cog',
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
                    'label' => $this->translate('Id'),
                    'list' => true,
                ),
                'title'=>array(
                    'label' => $this->translate('Título'),
                    'list' => true,
                ),
                'chave'=>array(
                    'label' => $this->translate('Chave'),
                    'list' => true,
                ),
                'value'=>array(
                    'label' => $this->translate('valor'),
                    'list' => true,
                ),
            ),
        );
    }
}

?>