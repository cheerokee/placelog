<?php
namespace Base\View\Helper\Listagem;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class HeadListagem extends AbstractHelper implements ServiceLocatorAwareInterface 
{
    protected $serviceLocator;
    
    public function __invoke($listView=null) {
        
        $helperPluginManager = $this->getServiceLocator();
        //$view = $helperPluginManager->get('view');
        
        
        $txt = "";
        foreach($listView['fields'] as $k => $cfg)
        {
            if($cfg['list'] == true){
                $txt .= "<th>{$cfg['label']}</th>";
            }
        }
        if($listView['actions']['enable'] == true){
            $txt .= "<th>Ação</th>";
        }
        
        return $txt;
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