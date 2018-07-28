<?php
namespace Relation;

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
                __NAMESPACE__ . '\Form\ProductRelation' => function ($sm){
                    return new Form\ProductRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Form\SkuRelation' => function ($sm){
                    return new Form\SkuRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Form\OrderRelation' => function ($sm){
                    return new Form\OrderRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Form\PaymentMethodRelation' => function ($sm){
                    return new Form\PaymentMethodRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Form\StockRelation' => function ($sm){
                    return new Form\StockRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Form\UserRelation' => function ($sm){
                    return new Form\UserRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Form\AddressRelation' => function ($sm){
                    return new Form\AddressRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Form\ItemOrderRelation' => function ($sm){
                    return new Form\ItemOrderRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                /**************/
                /** SERVICES **/
                /**************/

                __NAMESPACE__ . '\Service\ProductRelation' => function ($sm)
                {
                    return new Service\ProductRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Service\SkuRelation' => function ($sm)
                {
                    return new Service\SkuRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Service\OrderRelation' => function ($sm)
                {
                    return new Service\OrderRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Service\PaymentMethodRelation' => function ($sm)
                {
                    return new Service\PaymentMethodRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Service\StockRelation' => function ($sm)
                {
                    return new Service\StockRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Service\UserRelation' => function ($sm)
                {
                    return new Service\UserRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Service\AddressRelation' => function ($sm)
                {
                    return new Service\AddressRelation($sm->get('Doctrine\ORM\EntityManager'));
                },
                __NAMESPACE__ . '\Service\ItemOrderRelation' => function ($sm)
                {
                    return new Service\ItemOrderRelation($sm->get('Doctrine\ORM\EntityManager'));
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
