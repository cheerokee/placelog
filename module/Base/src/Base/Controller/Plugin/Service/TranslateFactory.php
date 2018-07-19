<?php
namespace Base\Controller\Plugin\Service;

use Zend\ServiceManager\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Base\Controller\Plugin\Translate;

/**
 * TranslateFactory
 *
 */
class TranslateFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Translate($container->get('translator'));
    }

    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container->getServiceLocator(), Translate::class);
    }
}