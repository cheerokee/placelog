<?php

namespace Register\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Register\Form\Person as FormPerson;

class IndexController extends AbstractActionController
{
    public function registerAction() 
    {
        $form = new FormPerson;
        $request = $this->getRequest();
        
        if($request->isPost())
        {
            $form->setData($request->getPost());
            if($form->isValid())
            {
                $service = $this->getServiceLocator()->get('Register\Service\Person');
                if($service->insert($request->getPost()->toArray())) 
                {
                    $fm = $this->flashMessenger()
                            ->setNamespace('Person')
                            ->addMessage("Usuário cadastrado com sucesso");
                }
                
                return $this->redirect()->toRoute('person-register');
            }
        }
        
        $messages = $this->flashMessenger()
                ->setNamespace('Person')
                ->getMessages();
        
        return new ViewModel(array('form'=>$form,'messages'=>$messages));
    }
    
    public function activateAction()
    {
        $activationKey = $this->params()->fromRoute('key');
        
        $personService = $this->getServiceLocator()->get('Register\Service\Person');
        $result = $personService->activate($activationKey);
        
        if($result){
            $this->flashmessenger()->addSuccessMessage("Você foi ativado com sucesso!");
            return $this->redirect()->toRoute('person-auth',array('controller'=>'index'));
        }else{
            $this->flashmessenger()->addErrorMessage("Houve um erro na ativação do usuário");
            return $this->redirect()->toRoute('person-auth',array('controller'=>'index'));
        }
    }

    public function getLogin()
    {
        $session = (array)$_SESSION['Admin'];

        foreach ($session as $v) {
            if (isset($v['storage']))
                $login = $v['storage'];
        }
        return $login;
    }
}
