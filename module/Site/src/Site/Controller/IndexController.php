<?php
namespace Site\Controller;

use Zend\Http\Client;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{
    protected $em;
    
    public function __construct(){    
    }
    
    public function indexAction(){
        $this->layout()->setTemplate('layout/layout.phtml');
        $em = $this->getEm();
        return new ViewModel(array('em'=>$em));
    }

    public function redirectSiteAction(){
        header('Location: http://placesolucoes.com.br/solucoes/smartenvios/');
        die;
        return new ViewModel();
    }

    public function categoryAction(){
        $this->layout()->setTemplate('layout/layout.phtml');
        $em = $this->getEm();
        return new ViewModel(array('em'=>$em));
    }

    protected function getEm(){
        if(null === $this->em){
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    
            return $this->em;
        }
    }

    public function contactAction(){
        $this->layout()->setTemplate('layout/layout.phtml');
        $request = $this->getRequest();

        if($request->isPost()){
            $data = $request->getPost()->toArray();

            /** reCaptcha! Google **/
            $drequest['response'] = $data['g-recaptcha-response'];
            $drequest['secret'] = '6LdZUGEUAAAAADTC8MeXjK5SXTKsqkcWmBWCDyOf';

            $response = $this->postService($drequest);
            if($response->success) {
                $service = $this->getServiceLocator()->get('Site\Service\Site');
                $result = $service->contact($data);
            }else{
                $result = false;
            }

//            $service = $this->getServiceLocator()->get('Site\Service\Site');
//            $result = $service->contact($data);

            if($result){
                $this->flashmessenger()->addSuccessMessage('Contato enviado com sucesso, em breve iremos entrar em contato com você!');
            }else{
                $this->flashmessenger()->addErrorMessage('Desculpe, houve algum erro no envio de contato, por favor tente entrar em contato via telefone ou tente novamente!');
            }

            return $this->redirect()->toRoute('home-contact');
        }

        return new ViewModel(array());
    }

    public function postService($data){

        $request = new Request();
        $request->setMethod(Request::METHOD_POST);
        $request->setUri('https://www.google.com/recaptcha/api/siteverify?secret='.$data['secret'].'&response='.$data['response']);
        $request->getHeaders()->addHeaderLine('Content-Type:  application/json');

        $config = array(
            "adapter" => 'Zend\Http\Client\Adapter\Curl',
            "sslverifypeer" => false
        );

        $client = new Client();
        $client->setRequest($request);
        $client->setOptions($config);
        $client->send();
        $response = $client->getResponse()->getBody();

        return json_decode($response);
    }

    public function notHavePermissionAction(){
        $this->layout()->setTemplate('layout/layout.phtml');
        return new ViewModel(array());
    }

    /**
     * Build a JSON POST object
     */
    protected function sanitizeForSerialization($data)
    {
        if (is_scalar($data) || null === $data) {
            $sanitized = $data;
        } else if ($data instanceof \DateTime) {
            $sanitized = $data->format(\DateTime::ISO8601);
            $sanitized = substr($sanitized, 0, -5).'.000-02:00';
            // var_dump($sanitized);
        } else if (is_array($data)) {
            foreach ($data as $property => $value) {
                $data[$property] = $this->sanitizeForSerialization($value);
            }
            $sanitized = $data;
        } else if (is_object($data)) {
            $values = array();
            foreach (array_keys($data::$swaggerTypes) as $property) {
                if ($data->$property !== null) {
                    $values[$data::$attributeMap[$property]] = $this->sanitizeForSerialization($data->$property);
                }
            }
            $sanitized = $values;

            //$sanitized = json_decode(json_encode($data),true);

        } else {
            $sanitized = (string)$data;
        }


        return $sanitized;
    }

    public function activitiesAction(){
        $this->layout()->setTemplate('layout/layout.phtml');
        return new ViewModel(array('em' => $this->getEm()));
    }

    public function activityAction(){
        $em = $this->getEm();
        $this->layout()->setTemplate('layout/layout.phtml');

        $repository = $em->getRepository('Activities\Entity\Activities');
        $entity = $repository->find($this->params()->fromRoute('id',0));

        return new ViewModel(array('em' => $em,'activity' => $entity));
    }

    public function galleryAction(){
        $this->layout()->setTemplate('layout/layout.phtml');
        return new ViewModel(array('em' => $this->getEm()));
    }

    public function teacherAction(){
        $this->layout()->setTemplate('layout/layout.phtml');
        return new ViewModel(array('em' => $this->getEm()));
    }

    public function personPageAction(){
        $em = $this->getEm();
        $this->layout()->setTemplate('layout/layout.phtml');
        $friendly_url = $this->params()->fromRoute('friendly-url',0);
        $db_person = $em->getRepository('Register\Entity\Person')->findOneByFriendlyUrl($friendly_url);

        return new ViewModel(array('em' => $em,'person' => $db_person));
    }

    public function listExerciceAction(){
        $em = $this->getEm();
        $this->layout()->setTemplate('layout/layout.phtml');

        return new ViewModel(array(
            'em' => $em
        ));
    }
}
