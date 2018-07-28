<?php
namespace Transaction;

use Zend\Mail\Transport\Smtp as SmtpTransport,
    Zend\Mail\Transport\SmtpOptions;

use Register\Auth\Adapter as AuthAdapter;

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
                'Transaction\Form\Order' => function ($sm){
                    return new Form\Order($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Transaction\Form\Send' => function ($sm){
                    return new Form\Send($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Transaction\Form\ItemOrder' => function ($sm){
                    return new Form\ItemOrder($sm->get('Doctrine\ORM\EntityManager'));
                },
                /**************/
                /** SERVICES **/
                /**************/

                'Transaction\Service\Order' => function ($sm)
                {
                    return new Service\Order($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Transaction\Service\Send' => function ($sm)
                {
                    return new Service\Send($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Transaction\Service\ItemOrder' => function ($sm)
                {
                    return new Service\ItemOrder($sm->get('Doctrine\ORM\EntityManager'));
                },

                /***********/
                /** MAILS **/
                /***********/
//                'Register\Mail\Transport' => function($sm) {
//                    $config = $sm->get('Config');
//
//                    $transport = new SmtpTransport;
//                    $options = new SmtpOptions($config['mail']);
//                    $transport->setOptions($options);
//
//                    return $transport;
//                },

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
