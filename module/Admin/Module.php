<?php
namespace Admin;

use Zend\View\HelperPluginManager;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole;
use Zend\Permissions\Acl\Resource\GenericResource;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;

class Module{

    public function onBootstrap(MvcEvent $e)
    {
        $application    = $e->getApplication();

        /** EVENT MANAGER **/
        $eventManager   = $application->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        /** SERVICE MANAGER **/
        $serviceManager = $application->getServiceManager();
        $serviceManager = $e->getApplication()->getServiceManager();
        $viewHelperManager = $serviceManager->get('viewhelpermanager');

        /** MODULE MANAGER **/
        $moduleManager  = $serviceManager->get('ModuleManager');
        $moduleConfig   = $moduleManager->getModule('Config');

        /** FORM ELEMENT ERRORS **/
        $formElementErrorsViewHelper = $viewHelperManager->get('FormElementErrors');
        $formElementErrorsViewHelper->setMessageOpenFormat('<div class="error"><ul%s><li>');
        $formElementErrorsViewHelper->setMessageCloseString('</li></ul></div>');

        /** FORM ELEMENT FLASH MESSENGER **/
        $formElementFlashMessenger = $viewHelperManager->get('FlashMessenger');
        $formElementFlashMessenger->setMessageOpenFormat('<div%s><p>')
            ->setMessageSeparatorString('</p><p>')
            ->setMessageCloseString('</p></div>');


        $e  ->getApplication()
            ->getEventManager()
            ->getSharedManager()
            ->attach('Zend\Mvc\Controller\AbstractController', 'dispatch', function($e) {
                $controller = $e->getTarget();
                $controllerClass = get_class($controller);
                $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
                $config = $e->getApplication()->getServiceManager()->get('config');

                if (isset($config['module_layouts'][$moduleNamespace])) {
                    $controller->layout($config['module_layouts'][$moduleNamespace]);
                }

                $serviceManager = $e->getApplication()->getServiceManager();
                $flashMessenger = $serviceManager->get('controllerpluginmanager')->get('flashmessenger');

                $doctrineEntityManager = $serviceManager->get('doctrine.entitymanager.orm_default');
                $doctrineEventManager  = $doctrineEntityManager->getEventManager();
                $doctrineEventManager->addEventListener(
                    array(
                        \Doctrine\ORM\Events::preRemove ,
                        \Doctrine\ORM\Events::postRemove ,
                        \Doctrine\ORM\Events::prePersist ,
                        \Doctrine\ORM\Events::postPersist ,
                        \Doctrine\ORM\Events::preUpdate ,
                        \Doctrine\ORM\Events::postUpdate
                    ),
                    new \Base\Listener\DoctrineListener($serviceManager,$flashMessenger)
                );
            },100);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'baseadmin' => 'Base\Navigation\Service\BaseAdminNavigationFactory',
            ),
        );
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

    public function getViewHelperConfig(){
        return array(
            'invokables' => array(
                'getMenu' => __NAMESPACE__ . '\View\Helper\GetMenu',
                'getFlashMessenger' => __NAMESPACE__ . '\View\Helper\GetFlashMessenger',
            ),
            'factories' => array(
            )
        );
    }
}
