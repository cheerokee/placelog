<?php

namespace Site\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Doctrine\ORM\EntityManager;

class GetEm extends AbstractHelper implements ServiceLocatorAwareInterface{
    protected $serviceLocator,$em;

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

    public function __invoke() {
        $helperPluginManager = $this->getServiceLocator();
        // the second one gives access to... other things.
        $serviceManager = $helperPluginManager->getServiceLocator();
        $this->setEm($serviceManager->get('Doctrine\ORM\EntityManager'));

        return $this->em;
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
