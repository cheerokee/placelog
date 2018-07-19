<?php
namespace Base\View\Helper\Listagem;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\Stdlib\Hydrator\NamingStrategy\UnderscoreNamingStrategy;
use Zend\Filter\Word\UnderscoreToCamelCase;

class BodyListagem extends AbstractHelper implements ServiceLocatorAwareInterface 
{
    protected $serviceLocator;
    
    public function __invoke($listView=null,$entity) {
        
        $helperPluginManager = $this->getServiceLocator();
        $namingStrategy = new UnderscoreNamingStrategy();
        $underscoreToCamelCase = new UnderscoreToCamelCase();
        
        $txt = "";
        foreach($listView['fields'] as $k => $cfg)
        {
            if($cfg['list'] == true){
                $value = '';
                $naming = $namingStrategy->hydrate($k);
                $camelCase = $underscoreToCamelCase->filter($k);
                $method = "get$camelCase";
                
                if(method_exists($entity, $method)){
                    if($entity->$method() instanceof \DateTime){
                        $value = ($entity->$method())?$entity->$method()->format('Y-m-d H:i:s'):"";
                    } else {
                        $value = $entity->$method();
                    }
                }
                
                $txt .= "<td>$value</td>";
            }
        }
        if($listView['actions']['enable'] == true){
            $txt .= "<td></td>";
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