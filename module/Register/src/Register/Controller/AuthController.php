<?php

namespace Register\Controller;

use Base\Controller\BaseFunctions;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;

use Register\Form\Login as LoginForm;
use Register\Entity\Person;

class AuthController extends AbstractActionController
{
    protected $functions;

    public function indexAction()
    {
        $form = new LoginForm;
        $request = $this->getRequest();
        $error = false;
        
        $this->layout()->setTemplate('layout/admin_auth.phtml');
      
        if($request->isPost()){
            $form->setData($request->getPost());

            if($form->isValid()){
                $data = $request->getPost()->toArray();

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

                    if(isset($data['redirect']) && $data['redirect'] != '')
                    {
                        $_SESSION['login_success'] = true;
                        header('Location: '.$data['redirect']);
                        die;
                    }

                    return $this->redirect()->toRoute('admin',array('controller'=>'admin'));
                }else{
                    $error = true;
                    $_SESSION['login_success'] = false;
                    header('Location: '.$data['redirect']);
                    die;
                }
            }
        }
        
        $auth = new AuthenticationService();
        $auth->setStorage(new SessionStorage("Person"));
        $people = $this->getEm()->getRepository('Register\Entity\Person')->findAll();
        
        return new ViewModel(array(
            'form'=>$form,
            'error'=>$error,
            'login' => $auth->getIdentity(),
            'people' => $people
        ));
    }

    public function registerAction()
    {
        $this->functions = new BaseFunctions();
        $request = $this->getRequest();
        $error = false;

        $this->layout()->setTemplate('layout/admin_auth.phtml');

        if($request->isPost()){
            $data = $request->getPost()->toArray();

            $person = $this->getEm()->getRepository('Register\Entity\Person')->findOneByEmail($data['email']);
            if(!empty($person)){
                $this->flashmessenger()->addErrorMessage("O e-mail já está sendo utilizado!");

                if(isset($data['pesquisa'])){
                    return $this->redirect()->toRoute('pesquisa-site/default',array(
                        'id'=>$data['pesquisa']
                    ));
                }

                return $this->redirect()->toRoute('person-auth',array('controller'=>'index'));
            }

            if($data['password'] != $data['confirmation']){
                $this->flashmessenger()->addErrorMessage("As senhas não conferem!");

                if(isset($data['pesquisa'])){
                    return $this->redirect()->toRoute('pesquisa-site/default',array(
                        'id'=>$data['pesquisa']
                    ));
                }

                return $this->redirect()->toRoute('person-auth',array('controller'=>'index'));
            }

            /**
             * @var \Register\Service\Person $service
             */
            $service    =   $this->getServiceLocator()->get('Register\Service\Person');
            $form       =   $this->getServiceLocator()->get('Register\Form\Person');

            foreach ($form as $element) {
                if ($element->getName() == 'name') {
                    $data['friendlyUrl'] = $this->functions->strToFriendlyUrl($data['name']);
                }
            }

            if(isset($data['pesquisa'])){
                $data['password'] = '123mudar';
            }

            $entity = $service->insert($data);
            if($entity instanceof Person){
                $msg = 'Parabéns você se cadastrou com sucesso, acesse sua caixa de entrada e ative sua conta! Caso não tenha recebido o e-mail de ativação entre em contato com o administrador.';
                if(isset($data['pesquisa'])){
                    $this->flashmessenger()->addSuccessMessage($msg);
                    $_SESSION['SUCCESS'] = $msg;
                    return $this->redirect()->toRoute('pesquisa-site/default',array(
                        'id'=>$data['pesquisa'],
                        'activation-key' => $entity->getActivationKey()
                    ));
                }else{
                    $this->flashmessenger()->addSuccessMessage($msg);
                    return $this->redirect()->toRoute('person-auth',array('controller'=>'index'));
                }
            }else{
                if(isset($data['pesquisa'])){
                    return $this->redirect()->toRoute('pesquisa-site/default',array(
                        'id'=>$data['pesquisa']
                    ));
                }
            }
        }

        $auth = new AuthenticationService();
        $auth->setStorage(new SessionStorage("Person"));
        $people = $this->getEm()->getRepository('Register\Entity\Person')->findAll();

        return new ViewModel(array('error'=>$error,'login' => $auth->getIdentity(),'people' => $people));
    }
    
    public function logoutAction()
    {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage("Person"));
        $auth->clearIdentity();

        return $this->redirect()->toRoute('person-auth');
    }
    
    public function lostpasswordAction(){
        $this->layout()->setTemplate('layout/admin_auth.phtml');
    
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
