<?php
namespace DataFrete;

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
                __NAMESPACE__ . '\Form\Config' => function ($sm)
                {
                    return new Form\Config($sm->get('Doctrine\ORM\EntityManager'));
                },
                /**************/
                /** SERVICES **/
                /**************/

                __NAMESPACE__ . '\Service\Sincronization' => function ($sm)
                {
                    return new Service\Sincronization($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Service\Config' => function ($sm)
                {
                    return new Service\Config($sm->get('Doctrine\ORM\EntityManager'));
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
