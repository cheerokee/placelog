<?php
namespace Financial;

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
                'Financial\Form\Payment' => function ($sm){
                    return new Form\Payment($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Financial\Form\Invoice' => function ($sm){
                    return new Form\Invoice($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Financial\Form\PaymentMethod' => function ($sm){
                    return new Form\PaymentMethod($sm->get('Doctrine\ORM\EntityManager'));
                },
                /**************/
                /** SERVICES **/
                /**************/

                'Financial\Service\Payment' => function ($sm)
                {
                    return new Service\Payment($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Financial\Service\Invoice' => function ($sm)
                {
                    return new Service\Invoice($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Financial\Service\PaymentMethod' => function ($sm)
                {
                    return new Service\PaymentMethod($sm->get('Doctrine\ORM\EntityManager'));
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
