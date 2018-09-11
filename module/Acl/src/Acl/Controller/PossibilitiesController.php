<?php
namespace Acl\Controller;

use Base\Controller\CrudController;

class PossibilitiesController extends CrudController
{
    public function __construct()
    {
        $this->title = "Possibilidades";

        $this->entity       =   "Acl\Entity\Possibility";
        $this->service      =   "Acl\Service\Possibility";
        $this->form         =   "Acl\Form\Possibility";
        $this->controller   =   "Possibilities";
        $this->route        =   "possibilities/default";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'pe-7s-share',
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
                'action'=>array(
                    'label' => 'Ação',
                    'list' => true,
                ),
                'resource'=>array(
                    'label' => 'Recurso',
                    'list' => true,
                )
            ),
        );
    }

    public function indexAction($list = null)
    {
        return parent::indexAction($list); // TODO: Change the autogenerated stub
    }

    public function newAction($request = null, $form = null, $redirect = null)
    {
        return parent::newAction($request, $form, $redirect); // TODO: Change the autogenerated stub
    }

    public function getPossibilitiesAction()
    {
        $arr = array();
        $db_resources = $this->getEm()->getRepository('Acl\Entity\Resource')->findAll();
        if(!empty($db_resources))
        {
            foreach($db_resources as $db_resource)
            {
                $db_possibilities = $this->getEm()->getRepository('Acl\Entity\Possibility')->findByResource($db_resource);
                $arr_actions = array();
                if(!empty($db_possibilities))
                {
                    foreach($db_possibilities as $db_possibility)
                    {
                        $arr_actions[] = array(
                            'id'    =>  $db_possibility->getAction()->getId(),
                            'name'  =>  $db_possibility->getAction()->getName()
                        );
                    }
                }

                $arr[] = array(
                    'id'    => $db_resource->getId(),
                    'name'  => $db_resource->getName(),
                    'actions' => $arr_actions
                );
            }
        }
        echo json_encode($arr);
        die;
    }
}