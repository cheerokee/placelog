<?php
namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Doctrine\DBAL\Migrations\Migration;
use Doctrine\DBAL\Migrations\Configuration\Configuration;
use Doctrine\DBAL\Migrations\Tools\Console\Helper\MigrationStatusInfosHelper;

class MigratesUpdate extends AbstractHelper implements ServiceLocatorAwareInterface 
{
    protected $serviceLocator;
    protected static $dir = 'data/DoctrineORMModule/Migrations';
    protected static $namespace = 'DoctrineORMModule\Migrations';
    protected static $name = 'Migrações';
    protected static $table_name = 'migrations';
    
    public function __invoke() {
        $helperPluginManager = $this->getServiceLocator();
        $serviceManager = $helperPluginManager->getServiceLocator();
        $redirect = $serviceManager->get('ControllerPluginManager')->get('redirect');
        $urlPlugin = $this->getView()->plugin('url');
        $em = $serviceManager->get('Doctrine\ORM\EntityManager');
        
        $url = $urlPlugin('base/default',array(
		    'controller' => 'migrate',
		    'action' => 'migrate'
		));
        
        
        $conn = $em->getConnection();
        $configuration = new Configuration($conn);
        $configuration->setMigrationsNamespace(self::$namespace);
        $configuration->setMigrationsDirectory(self::$dir);
        $configuration->registerMigrationsFromDirectory(self::$dir);
        $configuration->setName(self::$name);
        $configuration->setMigrationsTableName(self::$table_name);
        $versions = $configuration->getMigrations();
        $executed = $configuration->getNumberOfExecutedMigrations();
        $avaible = $configuration->getNumberOfAvailableMigrations();
        
        foreach ($versions as $version) {
            $migration = $version->getMigration();
            //var_dump($migration->getDescription());
            //var_dump(get_class_methods($migration));
        }
        $diff = $avaible - $executed;
        
        if($diff > 0){
            return "<a href='{$url}'><i class='glyphicon glyphicon-exclamation-sign'></i> ".
            "Atualizações pendentes ($diff)</a>";
        } else {
            return '';
        }
    }
    
    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::setServiceLocator()
     */
    public function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::getServiceLocator()
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}