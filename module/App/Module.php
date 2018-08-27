<?php
namespace App;

class Module{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
       
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                /***********/
                /** FORMS **/
                /***********/
                'App\Form\App' => function ($sm){
                    return new Form\App($sm->get('Doctrine\ORM\EntityManager'));
                },
                'App\Form\TypeApp' => function ($sm){
                    return new Form\TypeApp($sm->get('Doctrine\ORM\EntityManager'));
                },
                'App\Form\Integration' => function ($sm){
                    return new Form\Integration($sm->get('Doctrine\ORM\EntityManager'));
                },
                /**************/
                /** SERVICES **/
                /**************/

                'App\Service\App' => function ($sm)
                {
                    return new Service\App($sm->get('Doctrine\ORM\EntityManager'));
                },
                'App\Service\TypeApp' => function ($sm)
                {
                    return new Service\TypeApp($sm->get('Doctrine\ORM\EntityManager'));
                },
                'App\Service\Integration' => function ($sm)
                {
                    return new Service\Integration($sm->get('Doctrine\ORM\EntityManager'));
                }
            )
        );
    }

    public function getViewHelperConfig(){
        return array(
            'invokables' => array(
            )
        );
    }
}
