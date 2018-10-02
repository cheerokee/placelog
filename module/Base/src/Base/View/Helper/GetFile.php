<?php

namespace Base\View\Helper;

use User\Entity\User;
use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class GetFile extends AbstractHelper implements ServiceLocatorAwareInterface{
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

    public function __invoke($controller,$campo,$id_entity = null) {
        if($id_entity == null){
            return false;
        }
        $helperPluginManager = $this->getServiceLocator();
        // the second one gives access to... other things.
        $serviceManager = $helperPluginManager->getServiceLocator();
        $this->setEm($serviceManager->get('Doctrine\ORM\EntityManager'));

        switch($controller){
            case 'person':
                $file = $this->getEm()->getRepository('Register\Entity\Person')->findOneById($id_entity)->getImage();
                $file = 'img/person/'.$file;
                break;
            case 'banner':
                $file = $this->getEm()->getRepository('Site\Entity\Banner')->findOneById($id_entity)->getImage();
                $file = 'img/banner/'.$file;
                break;
            case 'testimony':
                $file = $this->getEm()->getRepository('Site\Entity\Testimony')->findOneById($id_entity)->getImage();
                $file = 'img/'.$controller.'/'.$file;
                break;
            default:
                $file = $this->getEm()->getRepository('Site\Entity\\'.$controller)->findOneById($id_entity)->getImage();
                $file = 'img/'.$controller.'/'.$file;
        }

        if (file_exists('public/' . $file)) {
            return '/' . $file;
        } else {
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