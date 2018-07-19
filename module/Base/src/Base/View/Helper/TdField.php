<?php 
namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class TdField extends AbstractHelper implements ServiceLocatorAwareInterface {
    protected $serviceLocator;
    
    public function __invoke($valor, $id, $limit=10) {
        $btnCp = "<button class='btn btn-default btn-sm'
        data-clipboard-text='{$valor}'>
        <i class='glyphicon glyphicon-copy' alt='Copy to clipboard'></i>
        </button>";
        
        return "<td id='$id'>".substr($valor,0,$limit)."...{$btnCp}</td>";
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