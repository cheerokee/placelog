<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{
    protected $em;
    
    public function __construct(){
    }
    
    public function indexAction(){
        
        return new ViewModel(array());
    } 
    
    /**
     *
     * @return EntityManager
     */
    protected function getEm(){
        if(null === $this->em){
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            return $this->em;
        }
    }

}
