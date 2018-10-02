<?php

namespace Register\Controller;

use Base\Controller\CrudController;

class CompanyController extends CrudController
{
    protected $route;

    public function __construct() 
    {
        $this->table = 'person';
        $this->entity = 'Register\Entity\Person' ;
        $this->service = 'Register\Service\\'.$this->table ;
        $this->form = 'Register\Form\\'.$this->table ;
        $this->controller = "person";
        $this->route = "company/default";

        $this->title = "Empresas";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-fw fa fa-user',
            'route' => $this->route,
            'controller' => $this->controller,
            'actions' => array(
                'enable' =>true,
                'customs' => array(
                    'permissions' => array(
                        'rota' => 'person-role',
                        'title' => 'Perfil',
                        'enable' => false,
                        'class' => 'btn btn-warning',
                        'icon' => 'fa fa-list',
                        'group' => false,
                        'authorize' => false
                    ),
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
                'email'=>array(
                    'label' => 'E-mail',
                    'list' => true,
                ),
                'document' => array(
                    'label' => 'Documento',
                    'list' => true
                )
            ),
            'filters' => array(
                'name' => array(
                    'label'     => 'Nome',
                    'type'      => 'autocomplete',
                    'column'    => 'col-md-12'
                ),
                'email' => array(
                    'label'     => 'E-mail',
                    'type'      => 'texto',
                    'strategy'  => 'like', //exact
                    'column'    => 'col-md-12'
                ),
                'type_person' => array(
                    'label'     => 'Tipo de Pessoa',
                    'type'      => 'select',
                    'column'    => 'col-md-12',
                ),
                'document' => array(
                    'label'     => 'Documento',
                    'type'      => 'custom',
                    'column'    => 'col-md-12',
                ),
                'active' => array(
                    'label'     => 'Ativo',
                    'type'      => 'custom',
                    'column'    => 'col-md-12',
                )
            )
        );
    }

    public function  indexAction($list = null)
    {
        $role       = 'Empresa';
        $list = $this->getEm()->getRepository('Register\Entity\Person')->getByRole($role);
        return parent::indexAction($list);
    }

    public function newAction($request = null, $form = null, $redirect = null)
    {
        $form = $this->getServiceLocator()->get($this->form);
        foreach ($form as $element) {
            if($element->getName() == 'role')
            {
                $db_empresa = $this->getEm()->getRepository('Acl\Entity\Role')->findOneByName('Empresa');
                if($db_empresa)
                $element->setAttribute('value',$db_empresa->getId());
            }
        }
        return parent::newAction($request, $form, $redirect);
    }
}
