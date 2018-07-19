<?php

namespace Register\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Doctrine\ORM\EntityManager;

class GetConfiguration extends AbstractHelper implements ServiceLocatorAwareInterface{
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

        if($chave != null){

            $vl = $this->em->getRepository('Register\Entity\Configuration')->findOneByChave($chave);
            if($vl) {
                return $vl->getValue();
            }else{
                return false;
            }
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

?>