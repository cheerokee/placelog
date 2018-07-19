<?php

namespace Site\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Doctrine\ORM\EntityManager;

class GetBanner extends AbstractHelper implements ServiceLocatorAwareInterface{
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

    public function __invoke($chave = null) {
        $helperPluginManager = $this->getServiceLocator();
        // the second one gives access to... other things.
        $serviceManager = $helperPluginManager->getServiceLocator();
        $this->setEm($serviceManager->get('Doctrine\ORM\EntityManager'));

        $vl = $this->em->getRepository('Site\Entity\Banner')->findByActive(1);
        if($vl) {
            return $vl;
        }else{
            return false;
        }
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
