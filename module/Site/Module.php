<?php
namespace Site;

use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

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
                'Base\Mail\Transport' => function($sm){
                    $config = $sm->get('Config');

                    $transport = new SmtpTransport;
                    $options = new SmtpOptions($config['mail']);
                    $transport->setOptions($options);

                    return $transport;
                },
                'Site\Service\Site' => function ($sm)
                {
                    $siteService = new Service\Site($sm->get('Doctrine\ORM\EntityManager'),
                        $sm->get('Base\Mail\Transport'),
                        $sm->get('View'));

                    $siteService->setConfigurationMail($sm->get('Config'));

                    return $siteService;
                },
                'Site\Service\Banner' => function ($sm)
                {
                    return new Service\Banner($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Site\Form\Banner' => function ($sm)
                {
                    return new Form\Banner($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Site\Service\Testimony' => function ($sm)
                {
                    return new Service\Testimony($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Site\Form\Testimony' => function ($sm)
                {
                    return new Form\Testimony($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Site\Service\Text' => function ($sm)
                {
                    return new Service\Text($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Site\Form\Text' => function ($sm)
                {
                    return new Form\Text($sm->get('Doctrine\ORM\EntityManager'));
                },
            )
        );
    }

    public function getViewHelperConfig(){
        return array(
            'invokables' => array(
                'getEm' => __NAMESPACE__ . '\View\Helper\GetEm',
                'GetBanner' => __NAMESPACE__ . '\View\Helper\GetBanner',
                'getText' => __NAMESPACE__ . '\View\Helper\GetText',
                'getFlashMessenger' => __NAMESPACE__ . '\View\Helper\GetFlashMessenger',
            )
        );
    }
}
