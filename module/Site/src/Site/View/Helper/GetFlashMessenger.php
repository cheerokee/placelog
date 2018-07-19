<?php
namespace Site\View\Helper;
use Zend\View\Helper\FlashMessenger;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Helper\AbstractHelper;
class GetFlashMessenger extends AbstractHelper implements ServiceLocatorAwareInterface{
    protected $serviceLocator,$flash;

    /**
     * @return mixed
     */
    public function getFlash()
    {
        return $this->flash;
    }

    /**
     * @param mixed $em
     */
    public function setFlash($flash)
    {
        $this->flash = $flash;
    }

    public function __invoke() {
        $this->setFlash(new FlashMessenger());

        echo  $this->getFlash()->render('error',array ('card-panel','red','lighten-1'));
        echo  $this->getFlash()->render('info',array ('card-panel','orange','lighten-1'));
        echo  $this->getFlash()->render('default',array ('card-panel','grey','lighten-1'));
        echo  $this->getFlash()->render('success',array ('card-panel','green','lighten-1'));
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
