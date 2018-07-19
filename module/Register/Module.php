<?php
namespace Register;

use Zend\Mail\Transport\Smtp as SmtpTransport,
    Zend\Mail\Transport\SmtpOptions,
    Zend\Mvc\MvcEvent,
    Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage,
    Zend\ModuleManager\ModuleManager;

use Register\Auth\Adapter as AuthAdapter;

class Module{
    public function init(ModuleManager $moduleManager){
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();

        $sharedEvents->attach('Zend\Mvc\Controller\AbstractActionController',
            MvcEvent::EVENT_DISPATCH,
            array($this,'validaAuth')
            ,100);
    }


    public function validaAuth($e){
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage("Person"));

        $controller = $e->getTarget();
        #Pega a rota que esta sendo acessada
        $matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();

        if(!$auth->hasIdentity() && ($matchedRoute == "admin" || $matchedRoute == "admin/paginator"))
            return $controller->redirect()->toRoute('person-auth');
    }

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
                'Register\Form\Person' => function ($sm){
                    return new Form\Person($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Register\Form\BankAccount' => function ($sm)
                {
                    return new Form\BankAccount($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Register\Form\Image' => function ($sm)
                {
                    return new Form\Image($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Register\Form\Profile' => function ($sm)
                {
                    return new Form\Profile($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Register\Form\Configuration' => function ($sm)
                {
                    return new Form\Configuration($sm->get('Doctrine\ORM\EntityManager'));
                },

                /**************/
                /** SERVICES **/
                /**************/
                'Register\Service\Person' => function($sm) {
                    $personService = new Service\Person($sm->get('Doctrine\ORM\EntityManager'),
                        $sm->get('Register\Mail\Transport'),
                        $sm->get('View'));

                    $personService->setConfigurationMail($sm->get('Config'));

                    return $personService;
                },
                'Register\Service\BankAccount' => function ($sm)
                {
                    return new Service\BankAccount($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Register\Service\Image' => function ($sm)
                {
                    return new Service\Image($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Register\Service\Profile' => function ($sm)
                {
                    return new Service\Profile($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Register\Service\Configuration' => function ($sm)
                {
                    return new Service\Configuration($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Register\Service\Configuration' => function($sm) {
                    $service = new Service\Configuration(
                        $sm->get('Doctrine\ORM\EntityManager'),
                        $sm->get('Base\Mail\Transport'),
                        $sm->get('View')
                    );

                    $service->setConfigurationMail($sm->get('Config'));

                    return $service;
                },

                /***********/
                /** MAILS **/
                /***********/
                'Register\Mail\Transport' => function($sm) {
                    $config = $sm->get('Config');

                    $transport = new SmtpTransport;
                    $options = new SmtpOptions($config['mail']);
                    $transport->setOptions($options);

                    return $transport;
                },
                'Register\Mail\Transport' => function($sm) {
                    $config = $sm->get('Config');

                    $transport = new SmtpTransport;
                    $options = new SmtpOptions($config['mail']);
                    $transport->setOptions($options);

                    return $transport;
                },

                /*************/
                /** CUSTOMS **/
                /*************/
                'Register\Auth\Adapter' => function($sm){
                    return new AuthAdapter($sm->get('Doctrine\ORM\EntityManager'));
                },
            )
        );
    }

    public function getViewHelperConfig(){
        return array(
            'invokables' => array(
                'getConfiguration'  => __NAMESPACE__ . '\View\Helper\GetConfiguration',
                'PersonIdentity'    => __NAMESPACE__ . '\View\Helper\PersonIdentity',
                'PersonPicture'     => __NAMESPACE__ . '\View\Helper\PersonPicture',
                'PersonPermission'  => __NAMESPACE__ . '\View\Helper\PersonPermission',
            )
        );
    }
}
