<?php
namespace Catalog;

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
                'Catalog\Form\Product' => function ($sm){
                    return new Form\Product($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Catalog\Form\Sku' => function ($sm){
                    return new Form\Sku($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Catalog\Form\Stock' => function ($sm){
                    return new Form\Stock($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Catalog\Form\Price' => function ($sm){
                    return new Form\Price($sm->get('Doctrine\ORM\EntityManager'));
                },
                /**************/
                /** SERVICES **/
                /**************/

                'Catalog\Service\Product' => function ($sm)
                {
                    return new Service\Product($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Catalog\Service\Sku' => function ($sm)
                {
                    return new Service\Sku($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Transaction\Service\Stock' => function ($sm)
                {
                    return new Service\Stock($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Transaction\Service\Price' => function ($sm)
                {
                    return new Service\Price($sm->get('Doctrine\ORM\EntityManager'));
                },
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
