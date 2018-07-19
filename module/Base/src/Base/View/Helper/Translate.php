<?php

namespace Base\View\Helper;

use Zend\I18n\Translator\Translator;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Helper\AbstractHelper;


class Translate extends AbstractHelper implements ServiceLocatorAwareInterface{
    protected $serviceLocator,$translate;

    public function __invoke($str) {
       return $str;
    }

    /**
     * @param mixed $em
     */
    public function setTranslate($translate)
    {
        return $translate;
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
