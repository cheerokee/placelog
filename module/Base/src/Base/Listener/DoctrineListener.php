<?php
namespace Base\Listener;

use Zend\ServiceManager\ServiceManager;
use Doctrine\Common\Persistence\Event\LoadClassMetadataEventArgs;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\Common\Persistence\Event\PreUpdateEventArgs;
use Zend\Mvc\Controller\Plugin\FlashMessenger;

class DoctrineListener
{
    /**
     * @param ServiceManager $sm
     */
    private $sm;
    
    private $showMethod = false;
    
    /**
     * @var FlashMessenger
     */
    private $flashMessenger;
    
    private $request;
    
    public function __construct(ServiceManager $sm, $flashMessenger = null)
    {
        $this->sm = $sm;
        
        $request = $this->sm->get('Request');
        $this->request = $request;
        
        
        $this->flashMessenger = $flashMessenger;
    }
    
    public function printMethod($methodName){
        if($this->showMethod)
            var_dump($methodName);
    }
    
    public function loadService($entity){
        $className = get_class($entity);
        $className = str_replace('DoctrineORMModule\Proxy\__CG__\\', '', $className);
        $serviceName = str_replace("Entity","Service",$className);
        if($this->sm->has($serviceName))
        {
            return $this->sm->get($serviceName);
        }
    }
    
    /**
     * @param LifecycleEventArgs $eventArgs
     * PreInsert
     */
    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $this->printMethod(__METHOD__);
        $entity = $eventArgs->getEntity();
        $service = $this->loadService($entity);
        
        if($service && method_exists($service, 'prePersist')){
            $service->prePersist($eventArgs,$this->request);
            $errors = $service->getErrorsMessages();
            if(!empty($errors))
            {
                $output = '';
                foreach($errors as $error)
                {
                    $this->flashMessenger->addErrorMessage($error);
                }
                throw new \Exception("Não foi possivel alterar o registro\n".implode("\n",$errors));
            }
        }
    }
    
    public function postPersist(LifecycleEventArgs $eventArgs)
    {
        $this->printMethod(__METHOD__);
        $entity = $eventArgs->getEntity();
        $service = $this->loadService($entity);
        if($service && method_exists($service, 'postPersist')){
            $service->postPersist($eventArgs,$this->request);
            $errors = $service->getErrorsMessages();
            if(!empty($errors))
            {
                $output = '';
                foreach($errors as $error)
                {
                    $this->flashMessenger->addErrorMessage($error);
                }
                throw new \Exception("Não foi possivel alterar o registro\n".implode("\n",$errors));
            }
        }
    }
    
    
    
    /**
     * @param unknown $eventArgs
     * ATENÇÃO este método só executa quando realmente existe alterações no registro.
     * Caso nao tenha ele nem passa por aqui
     */
    public function preUpdate(\Doctrine\ORM\Event\PreUpdateEventArgs $eventArgs)
    {
        $this->printMethod(__METHOD__);
        $service = $this->loadService($eventArgs->getEntity());
        if($service && method_exists($service, 'preUpdate')){
            $service->preUpdate($eventArgs,$this->request);
            $errors = $service->getErrorsMessages();
            if(!empty($errors))
            {
                $output = '';
                foreach($errors as $error)
                {
                    $this->flashMessenger->addErrorMessage($error);
                }
                throw new \Exception("Não foi possivel alterar o registro\n".implode("\n",$errors));
            }
        }
    }
    
    public function postUpdate(LifecycleEventArgs $eventArgs)
    {
        $this->printMethod(__METHOD__);
        $service = $this->loadService($eventArgs->getEntity());
        if($service && method_exists($service, 'postUpdate')){
            $service->postUpdate($eventArgs,$this->request);
            $errors = $service->getErrorsMessages();
            if(!empty($errors))
            {
                $output = '';
                foreach($errors as $error)
                {
                    $this->flashMessenger->addErrorMessage($error);
                }
                throw new \Exception("Não foi possivel alterar o registro\n".implode("\n",$errors));
            }
        }
    }
    
    public function preRemove(LifecycleEventArgs $eventArgs){
        $this->printMethod(__METHOD__);
        $service = $this->loadService($eventArgs->getEntity());
        if($service && method_exists($service, 'preRemove')){
            $service->preRemove($eventArgs,$this->request);
            $errors = $service->getErrorsMessages();
            if(!empty($errors))
            {
                $output = '';
                foreach($errors as $error)
                {
                    $this->flashMessenger->addErrorMessage($error);
                }
                throw new \Exception("Não foi possivel alterar o registro\n".implode("\n",$errors));
            }
        }
    }
    
    public function postRemove($eventArgs){
    $this->printMethod(__METHOD__);
        $service = $this->loadService($eventArgs->getEntity());
        if($service && method_exists($service, 'postRemove')){
            $service->postRemove($eventArgs,$this->request);
            $errors = $service->getErrorsMessages();
            if(!empty($errors))
            {
                $output = '';
                foreach($errors as $error)
                {
                    $this->flashMessenger->addErrorMessage($error);
                }
                throw new \Exception("Não foi possivel alterar o registro\n".implode("\n",$errors));
            }
        }
    }
    
    public function preFlush(PreFlushEventArgs $args)
    {
        // 
    }
    
    /**
     * @param OnFlushEventArgs $eventArgs
     * OnFlush é um evento muito poderoso. Ele é chamado dentro do EntityManager # flush () após as alterações em todas as entidades gerenciadas e suas associações terem sido computadas. Isso significa que o evento onFlush tem acesso aos conjuntos de:
     * - Entidades programadas para inserir
     * - Entidades agendadas para atualização
     * - Entidades agendadas para remoção
     * - Coleções agendadas para atualização
     * - Coleções agendadas para remoção
     */
    public function onFlush(OnFlushEventArgs $eventArgs)
    {
        $em = $eventArgs->getEntityManager();
        $uow = $em->getUnitOfWork();
        
        $this->printMethod(__METHOD__);
        
        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            //var_dump($entity);
            //die;
        }
    
        foreach ($uow->getScheduledEntityUpdates() as $entity) {
            
        }
    
        foreach ($uow->getScheduledEntityDeletions() as $entity) {
            
        }
    
        foreach ($uow->getScheduledCollectionDeletions() as $col) {
            
        }
    
        foreach ($uow->getScheduledCollectionUpdates() as $col) {
            
        }
    }
    
    /**
     * @param PostFlushEventArgs $eventArgs
     * O evento postFlush ocorre no final de uma operação de descarga. 
     * Este evento não é um retorno de chamada de ciclo de vida.
     */
    public function postFlush(PostFlushEventArgs $eventArgs)
    {
        $this->printMethod(__METHOD__);
        //die;
    }
    

    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     * O evento loadClassMetadata ocorre depois que os metadados de mapeamento de uma classe foram carregados
     * a partir de uma fonte de mapeamento (annotations / xml / yaml).
     * Este evento não é um retorno de chamada de ciclo de vida.
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        //$this->printMethod(__METHOD__);
        //var_dump($eventArgs);
        //die;
    }
    
    /**
     * @param LifecycleEventArgs $args
     * O evento postLoad ocorre para uma entidade depois que a entidade foi carregada no EntityManager
     * atual do banco de dados ou após a operação de atualização ter sido aplicada a ele.
     */
    public function postLoad(LifecycleEventArgs $eventArgs)
    {
        $this->printMethod(__METHOD__);
        //var_dump($eventArgs->getObject());
        //var_dump($eventArgs->getEntity());
    }
    
    /**
     * @return ServiceManager
     */
    public function getSm()
    {
        return $this->sm;
    }
    
}