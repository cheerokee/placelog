<?php
namespace Base\Controller;

use Zend\I18n\Validator\DateTime;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;
use Doctrine\ORM\EntityManager;

use Zend\Stdlib\Hydrator;

abstract class CrudController extends AbstractActionController{
    protected $em,$service,$entity,$form,$route,$controller;
    
    public function __construct(){}
    
    public function indexAction($list = null) {

        if($list === null){
            $list = $this->getEm()->getRepository($this->entity)->findAll();
        }
    
        $page = $this->params()->fromRoute('page');
        
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(10);

        $form = $this->getForm();
        
        $view = new ViewModel(
            array(
                'data'=>$paginator,
                'form'=>$form,
                'page'=>$page,
                'controller' => $this->controller,
                '_listView' => $this->_listView,
                'route' => $this->route,
            )
        );
                
        if($this->_listView){
            $view->setTemplate('base/crud/index');
        }

        return $view;
    }
    
    /**
     * CrudController::getForm()
     * Obtendo a instância do form através do ServiceManager
     * Ou Intancia de forma normal o formulário, caso o mesmo
     * não tenha dependências
     *
     * @return \Zend\Form\Form
     */
    public function getForm()
    {
        $form = null;
        if ($this->getServiceLocator()->has($this->form))
            $form = $this->getServiceLocator()->get($this->form);
            else
                $form = new $this->form();
    
                if($this->validator){
                    $form->setInputFilter(new $this->validator($this->getEm()));
                }
    
                $form->add(array(
                    'name' => 'post-fieldset',
                    'type' => 'Base\Form\Fieldset\SubmitCancel',
                    'attributes' => array('class' => 'form-inline col-sm-offset-2'),
                    'options' => array('column-size' => 'sm-10 col-sm-offset-2')
                ));
    
                return $form;
    }

    public function newAction($request = null,$form = null){

        $em = $this->getEm();
        $cities = $em->getRepository('Register\Entity\City')->findAll();
        $states = $em->getRepository('Register\Entity\State')->findAll();

        if(!isset($form)){
            $form = $this->getServiceLocator()->get($this->form);
        }

        if($request == null)$request = $this->getRequest();

        if($request->isPost()){
            $form->setData($request->getPost());

            if($form->isValid()){
                
                $data = $request->getPost()->toArray();

                $form = $this->getServiceLocator()->get($this->form);
                foreach ($form as $element) {
                    $type = $element->getAttributes()['type'];
                    if($type == 'date') {
                        $data[$element->getName()] = new \DateTime($data[$element->getName()]);
                    }

                    if($element->getAttributes()['name'] == 'name')
                    {
                        if(isset($data['friendlyUrl']))
                        {
                            $data['friendlyUrl'] = $this->strToFriendlyUrl($element->getValue());
                        }
                    }
                }

                $service = $this->getServiceLocator()->get($this->service);

                $novo = $service->insert($data);

                if($novo){
                    if($request->getPost()->toArray()['success_message'] != null){
                        $this->flashMessenger()->addSuccessMessage($request->getPost()->toArray()['success_message']);
                    }else{
                        $this->flashMessenger()->addSuccessMessage("Registro criado com sucesso!");
                    }
                }else{
                    if($request->getPost()->toArray()['error_message'] != null){
                        $this->flashMessenger()->addErrorMessage($request->getPost()->toArray()['error_message']);
                    }else{
                        $this->flashMessenger()->addSuccessMessage("Registro criado com sucesso!");
                    }
                }
            }else{
                $this->flashMessenger()->addErrorMessage("Houve um erro na criação do registro!");
            }

            return $this->redirect()->toRoute($this->route,array('controller' => $this->controller,'cidades' => $cities,'estados' => $states));
        }
        
        $view = new ViewModel(array(
            'form' => $form,
            'controller' => $this->controller,
            'title'=> $this->title,
            'route' => $this->route,
            'cities' => $cities,
            'states' => $states,
            'em' => $this->getEm()
        ));

        $view->setTemplate('base/crud/new.phtml');
        
        return $view;
    }
    
    public function editAction($request = null,$form = null){
        $em = $this->getEm();
        $cities = $em->getRepository('Register\Entity\City')->findAll();
        $states = $em->getRepository('Register\Entity\State')->findAll();

        if(!isset($form)){
            $form = $this->getServiceLocator()->get($this->form);
        }
        
        if($request == null){
            $request = $this->getRequest();
        }

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id',0));

        $all_methods = get_class_methods($entity);
        if(!empty($all_methods)){
            foreach($all_methods as $method){
                if(strpos($method,'get') !== false) {
                    if($entity->$method() instanceof \DateTime){
                        $setmethod = 'set'.str_replace('get','',$method);
                        $entity->$setmethod($entity->$method()->format('Y-m-d'));
                    }
                }
            }
        }

        if($this->params()->fromRoute('id',0))
            $form->setData((new Hydrator\ClassMethods())->extract($entity));

        if($request->isPost()){
            
            $form->setData($request->getPost());

            if($form->isValid())
            {
                $data = $request->getPost()->toArray();
                $form = $this->getServiceLocator()->get($this->form);
                foreach ($form as $element) {
                    $type = $element->getAttributes()['type'];
                    if($type == 'date') {
                        $data[$element->getName()] = new \DateTime($data[$element->getName()]);
                    }

                    if($element->getAttributes()['name'] == 'name')
                    {
                        if(isset($data['friendlyUrl']))
                        {
                            $data['friendlyUrl'] = $this->strToFriendlyUrl($element->getValue());
                        }
                    }
                }

                $service = $this->getServiceLocator()->get($this->service);
                
                $alterado = $service->update($data);
                
                $this->flashMessenger()->addSuccessMessage("Registro alterado com sucesso!");

                return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller,'page'=>2));
            }
        }
         
        $view = new ViewModel(array(
            'form' => $form,
            'controller' => $this->controller,
            'title'=> $this->title,
            'route' => $this->route,
            'id' => $this->params()->fromRoute('id',0),
            'entity' => $entity,
            'em' => $this->getEm(),
            'cities' => $cities,
            'states' => $states
        ));
        
        $view->setTemplate('base/crud/edit.phtml');
        
        return $view;
    }
    
    public function deleteAction()
    {
        $service = $this->getServiceLocator()->get($this->service);

        if($service->delete($this->params()->fromRoute('id',0)))
                return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller,'action' => 'index'));
    }

    /**
     * retorna um entity manager
     *
     * @return Ambigous <object, multitype:, \Doctrine\ORM\EntityManager>
     */
    public function getEm($entityName = null)
    {
        if (null === $this->em){
            if($this->emName)
                $this->em = $this->getServiceLocator()->get($this->emName);
                else
                    $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
    
        if($entityName !== null)
            return $this->em->getRepository($entityName);
    
            return $this->em;
    }

    public function getLogin(){
        $session = (array) $_SESSION['User'];
        /**
         * @var User $user
         */
        foreach($session as $v){
            if(isset($v['storage']))
                $login = $v['storage'];
        }

        return $login;
    }
    
    /**
     * Retorna o serviço crud da entidade insert,update,delete
     * @param String $serviceName - Novo serviço
     * @return \Base\Service\AbstractService
     */
    public function getService($serviceName=null)
    {
        $service = $this->getServiceLocator()->get(($serviceName)?$serviceName:$this->service);
        return $service;
    }
    
    

    public function setEm(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function paginator($list,$pageNumber,$count = 10)
    {
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($pageNumber);
        $paginator->setDefaultItemCountPerPage($count);
    
        return $paginator;
    }

    public function translate($str){
        return $str;
    }

    function strToFriendlyUrl($str){
        $str = mb_strtolower(utf8_decode($str));
        $i=1;
        $str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
        $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
        while($i>0) $str = str_replace('--','-',$str,$i);
        if (substr($str, -1) == '-') $str = substr($str, 0, -1);
        return $str;
    }
}
