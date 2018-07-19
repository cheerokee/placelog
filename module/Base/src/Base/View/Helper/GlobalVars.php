<?php
namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper;
//use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
//use Zend\Session\Storage\SessionStorage;
//use Zend\Authentication\AuthenticationService;

class GlobalVars extends AbstractHelper implements ServiceLocatorAwareInterface
{
    protected $serviceLocator;
    protected $authService;
    
    public function getAuthService() {
        return $this->authService;
    }
    
    public function __invoke($namespace = null)
    {
        $serviceLocator = $this->getServiceLocator()->getServiceLocator();
        $config = $serviceLocator->get('applicationconfig');
        $cfg = $serviceLocator->get('config');
        //$domain = $serviceLocator->get('domainglobal');
        $nameClient = $cfg['client']['name'];
        $Unresolved = null;
        
        $em = $serviceLocator->get('Doctrine\ORM\EntityManager');
        if(class_exists('Integration\Entity\Flow')){
            $repo = $em->getRepository('Integration\Entity\Flow');
            $UnresolvedArray = $repo->findFlowUnresolved();
            $UnresolvedCount = $repo->findFlowUnresolvedCount();
            $Unresolved = new \stdClass();
            $Unresolved->data = $UnresolvedArray;
            $Unresolved->count = $UnresolvedCount;
        }

//         $sessionStorage = new SessionStorage($namespace);
//         $authService = new AuthenticationService;
//         $authService->setStorage($sessionStorage);
    
        $dateTime = new \DateTime($config['version']['build_date']);
        $date = new \stdClass();
        $date->thisYear = $dateTime->format('Y');
    
        //$dateTime->setTimestamp($config['version']['build_date']);
    
        $version = new \stdClass();
        $version->major = $config['version']['major'];
        $version->minor = $config['version']['minor'];
        $version->buildDate = $dateTime->format('d/m/Y H:i');
    
//         $user = new \stdClass();
//         $user->hasIdentity = $authService->hasIdentity();
//         $user->username = $authService->getStorage()->read('username');
        $arrayOptions = array(
            'version' => $version,
            'date' => $date,
            'unresolved' => $Unresolved,
            'client' => $nameClient,
            //'user' => $user,
        );
        
        if($namespace)
            return $arrayOptions[$namespace];
        
        return $arrayOptions;
    }
    
    /* (non-PHPdoc)
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::setServiceLocator()
     */
    public function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        // TODO Auto-generated method stub
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

	/* (non-PHPdoc)
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::getServiceLocator()
     */
    public function getServiceLocator()
    {
        // TODO Auto-generated method stub
        return $this->serviceLocator;
    }

}
