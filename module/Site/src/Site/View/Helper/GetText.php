<?php

namespace Site\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class GetText extends AbstractHelper implements ServiceLocatorAwareInterface{
    protected $serviceLocator,$em;

    public function getEm()
    {
        return $this->em;
    }

    public function setEm($em)
    {
        $this->em = $em;
    }

    public function __invoke($chave = null) {

        $helperPluginManager = $this->getServiceLocator();
        $serviceManager = $helperPluginManager->getServiceLocator();
        $this->setEm($serviceManager->get('Doctrine\ORM\EntityManager'));

        if($chave != null){
            $vl = $this->em->getRepository('Site\Entity\Text')->findOneByKey($chave);
            if($vl) {
                return $vl;
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