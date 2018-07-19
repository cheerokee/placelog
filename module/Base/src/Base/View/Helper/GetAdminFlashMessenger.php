<?php
namespace Base\View\Helper;
use Zend\View\Helper\FlashMessenger;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Helper\AbstractHelper;
class GetAdminFlashMessenger extends AbstractHelper implements ServiceLocatorAwareInterface{
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

        $types = array(
            'error'=>'alert-danger',
            'info'=>'alert-info',
            'default'=>'alert-warning',
            'success'=>'alert-success'
        );

        foreach($types as $k => $type){
            echo $this->getFlash()->render($k, array(
                'alert',
                'alert-dismissible',
                $type
            ));
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
