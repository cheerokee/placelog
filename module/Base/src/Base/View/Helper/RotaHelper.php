<?php

namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper;
//use Zend\Authentication\AuthenticationService;
//use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class RotaHelper extends AbstractHelper implements ServiceLocatorAwareInterface {
    
    protected $router;
    protected $request;
    protected $serviceLocator;
    protected $title;
    
    public function getRota(){
        $routeMatch = $this->router->match($this->request);
        return $routeMatch->getMatchedRouteName();
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    
	public function __invoke($param=null) {
	    // $serviceLocator = $this->getServiceLocator();
	    // first one gives access to other view helpers
	    $helperPluginManager = $this->getServiceLocator();
	    // the second one gives access to... other things.
	    $serviceManager = $helperPluginManager->getServiceLocator();
	    $this->router = $serviceManager->get('router');
	    $this->request = $serviceManager->get('request');
	    $routeMatch = $this->router->match($this->request);

	    $query = $this->request->getQuery()->toArray();
	    
	    if(!empty($query) && $param == 'query'){
	        return $query;
	    }
	    
	    if(!method_exists($routeMatch, 'getMatchedRouteName'))
	    {
	        return "";
	    }
	    if($param == 'module'){
	        
	        $module = current(explode("/", $routeMatch->getMatchedRouteName()));
	        return $module;
	    } else if(isset($param)){
	        return $routeMatch->getParam($param);
	    } else {
	       return str_replace("paginator","default",$routeMatch->getMatchedRouteName());
	    }
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