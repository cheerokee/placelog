<?php
namespace Register\Controller;

use Base\Controller\CrudController;
use Register\Entity\ReferenceImage;
use Zend\Stdlib\Hydrator;

class ReferenceImageController extends CrudController{
    public function __construct(){
        $this->title = $this->translate("Referencia");
        $this->table = 'reference-image';
        $this->entity = 'Register\Entity\\'.$this->table ;
        $this->service = 'Register\Service\\'.$this->table ;
        $this->form = 'Register\Form\\'.$this->table ;
        $this->controller = "reference-image";
        $this->route = "reference-image/defaults";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-image',
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
                'name'=>array(
                    'label' => $this->translate('Nome'),
                    'list' => true,
                ),
            ),
        );
    }
}

?>