<?php
namespace Register\Controller;

use Base\Controller\CrudController;
use DoctrineModule\Form\Element\ObjectSelect;
use Register\Entity\Profile;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\Hydrator;

class ProfileController extends CrudController{
    public function __construct(){
        $this->title = "Perfil";
        $this->table = 'Profile';
        $this->entity = 'Register\Entity\\'.$this->table ;
        $this->service = 'Register\Service\\'.$this->table ;
        $this->form = 'Register\Form\\'.$this->table ;
        $this->controller = "Profile";
        $this->route = "profile/defaults";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-share-alt-square',
            'route' => $this->route,
            'controller' => $this->controller,
            'actions' => array(
                'enable' =>true,
                'customs' => array(
                    'permissions' => array(
                        'rota' => 'permission',
                        'title' => 'Permissões',
                        'enable' => false,
                        'class' => 'btn btn-warning',
                        'icon' => 'fa fa-list',
                        'group' => false,
                    ),
                ),
                'defaults' => array(
                    'edit' => array(
                        'enable' => true,
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
                'name'=>array(
                    'label' => 'Nome',
                    'list' => true,
                ),
                'profile'=>array(
                    'label' => 'Perfil Pai',
                    'list' => true,
                ),
                'chave'=>array(
                    'label' => 'Chave',
                    'list' => true,
                ),
            ),
        );
    }
    
    public function permissaoAction(){
        //Tabelas disponíveis no sitema
        $tabelas = array(
            'configuration' => 'Configurações',
            'company' => 'Empresas',
            'employee' => 'Funcionários',
            'customer' => 'Clientes',
            'person' => 'Pessoa',
            'profile' => 'Perfil',
            'product' => 'Produto',
        );

        $entity = $this->getEm()->getRepository('Register\Entity\Profile')->findOneById($this->params()->fromRoute('id',0));
        
        $privileges = $entity->getInformation();

        $request = $this->getRequest();
    
        if($request->isPost()){
            $post = $request->getPost()->toArray();
                         
            $this->savePrivileges($entity,$post['privilege']);
            
            $this->flashmessenger()->addSuccessMessage($this->translate('Perfil atualizado com sucesso!'));
            return $this->redirect()->toRoute('profile/defaults',array('controller'=>$this->controller));
        }

        $modulos = array();
        $label = array();
        if($privileges == null || $privileges == ''){
            if(!empty($tabelas)){
                foreach($tabelas as $chave => $nome){
                    $modulos[$chave] = array(
                        'list'      => 0,
                        'listAll'   => 0,
                        'delete'    => 0,
                        'new'       => 0,
                        'edit'      => 0,
                    );
                    $label[$chave] = $nome;
                }
            }
        }else{
            $privileges = json_decode($privileges,true);
            $recursos = $privileges['recursos'];
            $modulos = $recursos['modulos'];
            $label = $recursos['label'];
            if(!empty($tabelas)){
                foreach($tabelas as $chave => $nome){
                    if(isset($modulos[$chave])){
                        continue;
                    }

                    $modulos[$chave] = array(
                        'list'      => 0,
                        'listAll'   => 0,
                        'delete'    => 0,
                        'new'       => 0,
                        'edit'      => 0,
                    );

                    $label[$chave] =  $nome;
                }

                foreach($modulos as $chave => $permissions){
                    if(!isset($tabelas[$chave])){
                        unset($modulos[$chave]);
                        unset($label[$chave]);
                    }
                }
            }
        }

        $privileges = array(
            'recursos'=> array(
                'modulos' => $modulos,
                'label' => $label
            )
        );

        $privileges = json_encode($privileges);

        $entity->setInformation($privileges);

        $this->em->persist($entity);
        $this->em->flush();

        return new ViewModel(array('entity'=>$entity));
    
    }

    public function savePrivileges($entity,$newDefinitions){
        /**
         * @var Profile $profile
         */
        $profile = $entity;
        $privileges = json_decode($profile->getInformation(),true);
        if(isset($privileges['recursos']['modulos'])) {
            $modulos = $privileges['recursos']['modulos'];
            if (!empty($modulos)) {
                foreach($modulos as $chave => $defitions){
                    $newDefinition = $newDefinitions[$chave];
                    if(!empty($defitions)) {
                        foreach ($defitions as $action => $enable) {
                            $defitions[$action] = (isset($newDefinition[$action]))?$newDefinition[$action]:0;
                        }
                    }
                    $modulos[$chave] = $defitions;
                }
            }
        }

        $privileges['recursos']['modulos'] = $modulos;
        $privileges = json_encode($privileges);

        $profile->setInformation($privileges);
        
        $this->em->persist($profile);
        $this->em->flush();
    }



    public function editAction($request = null)
    {
        $em = $this->getEm();
        /**
         * @var ZF\ContentNegotiation\Request $request
         */
        $request = $this->getRequest();

        if($request->isPost()) {
            /**
             * @var Parameters $data
             */
            $data = $request->getPost();
            $data_arr = $data->toArray();

            if($data_arr['company'] != null){
                $db_company = $em->getRepository('Register\Entity\Person')->findOneById($data['company']);

                if($db_company instanceof Person)
                {
                    $data_arr['company'] = $db_company;
                }
            }

            if($data_arr['type_app'] != null){
                $db_type_app = $em->getRepository('App\Entity\TypeApp')->findOneById($data['type_app']);

                if($db_type_app instanceof TypeApp)
                {
                    $data_arr['type_app'] = $db_type_app;
                }
            }

            if($data_arr['integration'] != null){
                $db_integration = $em->getRepository('App\Entity\Integration')->findOneById($data['integration']);

                if($db_integration instanceof Integration)
                {
                    $data_arr['integration'] = $db_integration;
                }
            }

            $data->fromArray($data_arr);

            $request->setPost($data);
        }

        return parent::editAction($request); // TODO: Change the autogenerated stub
    }

}
?>