<?php

namespace Register\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;

use Register\Form\Login as LoginForm;
use Register\Entity\Person;

class AuthController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new LoginForm;
        $request = $this->getRequest();
        $error = false;
        
        $this->layout()->setTemplate('layout/layout.phtml');
      
        if($request->isPost()){
            $form->setData($request->getPost());

            if($form->isValid()){
                $data = $request->getPost()->toArray();
               
                if($data['type'] == 'register'){
                    $person = $this->getEm()->getRepository('Register\Entity\Person')->findOneByEmail($data['email']);
                    if(!empty($person)){
                        $this->flashmessenger()->addErrorMessage("O e-mail já está sendo utilizado!");
                        return $this->redirect()->toRoute('person-auth',array('controller'=>'index'));
                    }
                    
                    if($data['password'] != $data['confirmation']){
                        $this->flashmessenger()->addErrorMessage("As senhas não conferem!");
                        return $this->redirect()->toRoute('person-auth',array('controller'=>'index'));
                    }

                    /**
                     * @var \Register\Service\Person $service
                     */
                    $service = $this->getServiceLocator()->get('Register\Service\Person');
                    $entity = $service->insert($data);
                    if($entity instanceof Person){
                        $this->flashmessenger()->addSuccessMessage("Parabéns você cadastrou com sucesso!");
                        return $this->redirect()->toRoute('person-auth',array('controller'=>'index'));
                    }
                }else{                
                    // Criando Storage para gravar sessão da autenticação
                    $sessionStorage = new SessionStorage("Person");
                    
                    $auth = new AuthenticationService();
                    $auth->setStorage($sessionStorage);//Definindo o SessionStorage para a auth
                    
                    $authAdapter = $this->getServiceLocator()->get('Register\Auth\Adapter');
                    $authAdapter->setUsername($data['email']);
                    $authAdapter->setPassword($data['password']);                
                    
                    $result = $authAdapter->authenticate();
                                    
                    if($result->isValid()){   
                        
                        /**
                         * @var Person $person
                         * @var Person $personService
                         */
                        $person = $result->getIdentity();

                        $person = $this->getServiceLocator()->get('Register\Service\Person')->getPerson($person['person']->getId());
                           
                        $sessionStorage->write($person,null);
                       
                        return $this->redirect()->toRoute('admin',array('controller'=>'admin'));
                    }else{
                        $error = true;
                    }
                }
            }
        }
        
        $auth = new AuthenticationService();
        $auth->setStorage(new SessionStorage("Person"));
        $people = $this->getEm()->getRepository('Register\Entity\Person')->findAll();
        
        return new ViewModel(array('form'=>$form,'error'=>$error,'login' => $auth->getIdentity(),'people' => $people));
    }
    
    public function logoutAction()
    {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage("Person"));
        $auth->clearIdentity();

        return $this->redirect()->toRoute('person-auth');
    }
    
    public function lostpasswordAction(){
        $this->layout()->setTemplate('layout/layout.phtml');
    
        $form = new LoginForm;
        $request = $this->getRequest();
        $error = false;
    
        if($request->isPost()){
    
            $form->setData($request->getPost());
    
            if($form->isValid()){
                $data = $request->getPost()->toArray();
    
                $personService = $this->getServiceLocator()->get('Register\Service\Person');
    
                $person = new Person();
                $result = $personService->lostPassword($data);
                if($result instanceof $person){
                    $this->flashmessenger()->addSuccessMessage('Sua senha foi recuperada com sucesso, por favor entre na sua caixa de entrada para obter sua nova senha!');
                    return $this->redirect()->toRoute('person-auth',array('controller'=>'Auth'));
                }else{
                    $this->flashmessenger()->addErrorMessage('Não foi possível recuperar sua senha, e-mail não encontrado!');
                    return $this->redirect()->toRoute('lostpassword');
                }
            }
        }
    
        return new ViewModel(array('form'=>$form,'error'=>$error));
    }

    /**
     *
     * @return EntityManager
     */
    protected function getEm()
    {
        if(null === $this->em)
            $this->em = $this->getServiceLocator ()->get ('Doctrine\ORM\EntityManager');
    
            return $this->em;
    }
}
