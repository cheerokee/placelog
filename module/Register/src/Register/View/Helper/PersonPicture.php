<?php

namespace Register\View\Helper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Helper\AbstractHelper;
use Doctrine\ORM\EntityManager;
use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;

class PersonPicture extends AbstractHelper implements ServiceLocatorAwareInterface{
    protected $serviceLocator,$em;

    public function __invoke($person) {

        if($person){
            $helperPluginManager = $this->getServiceLocator();
            $serviceManager = $helperPluginManager->getServiceLocator();
            $this->setEm($serviceManager->get('Doctrine\ORM\EntityManager'));
            
            return ($person->getImage() && file_exists('public/img/person/'.$person->getImage()))?'/img/person/'.$person->getImage():'/img/person/sem_imagem.jpg';

        }else{
            return '/img/person/sem_imagem.jpg';
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
