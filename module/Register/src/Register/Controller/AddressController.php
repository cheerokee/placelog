<?php
namespace Register\Controller;

use Base\Controller\CrudController;
use Register\Entity\Address;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\Hydrator;

class AddressController extends CrudController{
    public function __construct(){
        $this->title = "Endereço";
        $this->table = 'address';
        $this->entity = 'Register\Entity\\'.$this->table ;
        $this->service = 'Register\Service\\'.$this->table ;
        $this->form = 'Register\Form\\'.$this->table ;
        $this->controller = "address";
        $this->route = "address/defaults";

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
                    'label' => 'Id',
                    'list' => true,
                ),
                'street'=>array(
                    'label' => $this->translate('Endereço'),
                    'list' => true,
                ),
                'number'=>array(
                    'label' => $this->translate('Número'),
                    'list' => true,
                ),
                'zipCode'=>array(
                    'label' => $this->translate('CEP'),
                    'list' => true,
                ),
                'neighborhood'=>array(
                    'label' => $this->translate('Bairro'),
                    'list' => true,
                ),
                'city'=>array(
                    'label' => $this->translate('Cidade'),
                    'list' => true,
                ),
            ),
        );
    }

    public function newAction($request = null)
    {
        return parent::newAction($request); // TODO: Change the autogenerated stub
    }
}

?>