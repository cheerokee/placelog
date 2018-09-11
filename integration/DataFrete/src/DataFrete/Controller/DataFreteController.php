<?php

namespace DataFrete\Controller;

use Base\Controller\CrudController;
use Zend\View\Model\ViewModel;

class DataFreteController extends CrudController
{
    protected $route;

    public function __construct() 
    {

        $this->title = "Data Frete";

        $this->table = "DataFrete";
        $this->entity =     $this->table . '\Entity\Config';
        $this->service =    $this->table . '\Service\Sincronization';
        $this->form =       $this->table . '\Form\Config';
        $this->controller = "DataFrete";
        $this->route = "data-frete/default";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-share-alt-square',
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
            ),
        );
    }

    public function indexAction()
    {
    }

    public function configAction()
    {
        $this->layout()->setTemplate('layout/admin_limpo.phtml');
        $form = $this->getServiceLocator()->get($this->form);
        return new ViewModel(array('form' => $form,'title' => 'Data Frete'));
    }

    public function testeAction(){
        $service = $this->getServiceLocator()->get($this->service);
        $service->getValorFrete();
        die;
    }

    public function panelAction(){
        if(isset($_SESSION['empresa'])){
            $db_company = $this->getEm()->getRepository('Register\Entity\Person')->findOneById($_SESSION['empresa']);
        }else{
            $db_company = $this->getEm()->getRepository('Register\Entity\Person')->findOneById($this->getLogin());
        }

        return new ViewModel(array('company' => $db_company));
    }

    public function rastreioAction(){
        $this->layout()->setTemplate('layout/layout-limpo.phtml');

        if($this->params()->fromRoute('company',0) != '') {
            $friendlyUrl = $this->params()->fromRoute('company', 0);

            $db_companies = $this->getEm()->getRepository('Register\Entity\Person')->findBy(array('friendlyUrl' => $friendlyUrl));

            if(!empty($db_companies) && count($db_companies) > 1)
            {
                echo "<div class='alert alert-danger'>Foi encontrado mais de uma empresa com esse endereço, contacte o administrador do sistema!</div>";
                die;
            }else if(count($db_companies) === 0){
                echo "<div class='alert alert-danger'>O Endereço acessado não corresponde a nenhuma empresa!</div>";
                die;
            }else{
                $db_config  =   $this->getEm()->getRepository('DataFrete\Entity\Config')->findOneByCompany($db_companies[0]->getId());

                return new ViewModel(array(
                    'company'   =>  $db_companies[0],
                    'config'    =>  $db_config
                ));
            }

        }else{
            echo "<div class='alert alert-danger'>O Endereço acessado não corresponde a nenhuma empresa!</div>";
            die;
        }
    }
}
