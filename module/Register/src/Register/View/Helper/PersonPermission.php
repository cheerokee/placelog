<?php
namespace Register\View\Helper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Helper\AbstractHelper,
    Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;

class PersonPermission extends AbstractHelper implements ServiceLocatorAwareInterface{
    protected $serviceLocator,$em;

    protected $authService;

    public function getAuthService() {

        return $this->authService;
    }

    public function permite($recurso,$item,$privilege) {
        return $this->__invoke($recurso,$item,$privilege);
    }

    public function __invoke($recurso,$item,$privilege,$authorize = null) {

        $item = str_replace(' ','_',strtolower($item));
        $helperPluginManager = $this->getServiceLocator();
        $serviceManager = $helperPluginManager->getServiceLocator();
        $this->setEm($serviceManager->get('Doctrine\ORM\EntityManager'));

        $sessionStorage = new SessionStorage('Person');
        $this->authService = new AuthenticationService;
        $this->authService->setStorage($sessionStorage);

        if ($this->getAuthService()->hasIdentity()) {
            $person =  $this->getAuthService()->getIdentity();
            $personProfiles = $this->getEm()->getRepository('Register\Entity\PersonProfile')->findBy(array('person'=>$person));

            $permitido = false;
            if(!empty($personProfiles)){
                foreach($personProfiles as $personProfile){
                    $information = json_decode($personProfile->getProfile()->getInformation(),true);

                    if($permitido == true)
                        break;

                    //Está como autorização nao permitida
//                    if($authorize === false){
//                        //E também verifica se o privilegio existe, se nao existe é porque nao tem permissao realmente
//                        if(!isset($information['recursos'][$recurso][$item]))
//                            return false;
//                    }

                    $permitido = ($information['recursos'][$recurso][$item][$privilege] == '1' || $personProfile->getPerson()->isIsAdmin())?true:false;
                }
            }

            return $permitido;
        }else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getEm()
    {
        return $this->em;
    }

    /**
     * @param mixed $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::setServiceLocator()
     */
    public function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::getServiceLocator()
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

}
