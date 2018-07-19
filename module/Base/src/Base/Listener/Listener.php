<?php
namespace Base\Listener;

use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\OnFlushEventArgs;

class Listener
{
    public function onFlush(OnFlushEventArgs $event)
    {
        //var_dump($event);exit;
    }
    
    public function preUpdate($entity, PreUpdateEventArgs $event)
    {
        //var_dump($event);exit;
    }
}