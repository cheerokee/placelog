<?php
return array (
  'service_manager' => 
  array (
    'abstract_factories' => 
    array (
      0 => 'Zend\\Db\\Adapter\\AdapterAbstractServiceFactory',
      'DoctrineModule' => 'DoctrineModule\\ServiceFactory\\AbstractDoctrineServiceFactory',
      1 => 'ZF\\Apigility\\Doctrine\\Server\\Resource\\DoctrineResourceFactory',
      2 => 'Zend\\Db\\Adapter\\AdapterAbstractServiceFactory',
      3 => 'ZF\\Apigility\\DbConnectedResourceAbstractFactory',
      4 => 'ZF\\Apigility\\TableGatewayAbstractFactory',
      5 => 'Zend\\Cache\\Service\\StorageCacheAbstractServiceFactory',
      6 => 'Zend\\Log\\LoggerAbstractServiceFactory',
    ),
    'factories' => 
    array (
      'Zend\\Db\\Adapter\\AdapterInterface' => 'Zend\\Db\\Adapter\\AdapterServiceFactory',
      'FilterManager' => 'Zend\\Filter\\FilterPluginManagerFactory',
      'Zend\\InputFilter\\InputFilterPluginManager' => 'Zend\\InputFilter\\InputFilterPluginManagerFactory',
      'Zend\\Paginator\\AdapterPluginManager' => 'Zend\\Paginator\\AdapterPluginManagerFactory',
      'Zend\\Paginator\\ScrollingStylePluginManager' => 'Zend\\Paginator\\ScrollingStylePluginManagerFactory',
      'Zend\\Validator\\ValidatorPluginManager' => 'Zend\\Validator\\ValidatorPluginManagerFactory',
      'ZF\\Apigility\\Documentation\\ApiFactory' => 'ZF\\Apigility\\Documentation\\Factory\\ApiFactoryFactory',
      'ZF\\Configuration\\ConfigResource' => 'ZF\\Configuration\\Factory\\ConfigResourceFactory',
      'ZF\\Configuration\\ConfigResourceFactory' => 'ZF\\Configuration\\Factory\\ResourceFactoryFactory',
      'ZF\\Configuration\\ConfigWriter' => 'ZF\\Configuration\\Factory\\ConfigWriterFactory',
      'ZF\\Configuration\\ModuleUtils' => 'ZF\\Configuration\\Factory\\ModuleUtilsFactory',
      'doctrine.cli' => 'DoctrineModule\\Service\\CliFactory',
      'Doctrine\\ORM\\EntityManager' => 'DoctrineORMModule\\Service\\EntityManagerAliasCompatFactory',
      'ZfApigilityDoctrineQueryProviderManager' => 'ZF\\Apigility\\Doctrine\\Server\\Query\\Provider\\Service\\QueryProviderManagerFactory',
      'ZfApigilityDoctrineQueryCreateFilterManager' => 'ZF\\Apigility\\Doctrine\\Server\\Query\\CreateFilter\\Service\\QueryCreateFilterManagerFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\Service\\ORMFilterManager' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\Service\\ORMFilterManagerFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\Service\\ODMFilterManager' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\Service\\ODMFilterManagerFactory',
      'ZF\\Doctrine\\QueryBuilder\\OrderBy\\Service\\ORMOrderByManager' => 'ZF\\Doctrine\\QueryBuilder\\OrderBy\\Service\\ORMOrderByManagerFactory',
      'ZF\\Doctrine\\QueryBuilder\\OrderBy\\Service\\ODMOrderByManager' => 'ZF\\Doctrine\\QueryBuilder\\OrderBy\\Service\\ODMOrderByManagerFactory',
      'translator' => 'Zend\\Mvc\\Service\\TranslatorServiceFactory',
      'ZF\\Apigility\\MvcAuth\\UnauthenticatedListener' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Apigility\\MvcAuth\\UnauthorizedListener' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'AssetManager\\Service\\AssetManager' => 'AssetManager\\Service\\AssetManagerServiceFactory',
      'AssetManager\\Service\\AssetFilterManager' => 'AssetManager\\Service\\AssetFilterManagerServiceFactory',
      'AssetManager\\Service\\AssetCacheManager' => 'AssetManager\\Service\\AssetCacheManagerServiceFactory',
      'AssetManager\\Resolver\\AggregateResolver' => 'AssetManager\\Service\\AggregateResolverServiceFactory',
      'AssetManager\\Resolver\\MapResolver' => 'AssetManager\\Service\\MapResolverServiceFactory',
      'AssetManager\\Resolver\\PathStackResolver' => 'AssetManager\\Service\\PathStackResolverServiceFactory',
      'AssetManager\\Resolver\\PrioritizedPathsResolver' => 'AssetManager\\Service\\PrioritizedPathsResolverServiceFactory',
      'AssetManager\\Resolver\\CollectionResolver' => 'AssetManager\\Service\\CollectionResolverServiceFactory',
      'AssetManager\\Resolver\\ConcatResolver' => 'AssetManager\\Service\\ConcatResolverServiceFactory',
      'AssetManager\\Resolver\\AliasPathStackResolver' => 'AssetManager\\Service\\AliasPathStackResolverServiceFactory',
      'ZF\\ApiProblem\\Listener\\ApiProblemListener' => 'ZF\\ApiProblem\\Factory\\ApiProblemListenerFactory',
      'ZF\\ApiProblem\\Listener\\RenderErrorListener' => 'ZF\\ApiProblem\\Factory\\RenderErrorListenerFactory',
      'ZF\\ApiProblem\\Listener\\SendApiProblemResponseListener' => 'ZF\\ApiProblem\\Factory\\SendApiProblemResponseListenerFactory',
      'ZF\\ApiProblem\\View\\ApiProblemRenderer' => 'ZF\\ApiProblem\\Factory\\ApiProblemRendererFactory',
      'ZF\\ApiProblem\\View\\ApiProblemStrategy' => 'ZF\\ApiProblem\\Factory\\ApiProblemStrategyFactory',
      'ZF\\MvcAuth\\Authentication' => 'ZF\\MvcAuth\\Factory\\AuthenticationServiceFactory',
      'ZF\\MvcAuth\\ApacheResolver' => 'ZF\\MvcAuth\\Factory\\ApacheResolverFactory',
      'ZF\\MvcAuth\\FileResolver' => 'ZF\\MvcAuth\\Factory\\FileResolverFactory',
      'ZF\\MvcAuth\\Authentication\\DefaultAuthenticationListener' => 'ZF\\MvcAuth\\Factory\\DefaultAuthenticationListenerFactory',
      'ZF\\MvcAuth\\Authentication\\AuthHttpAdapter' => 'ZF\\MvcAuth\\Factory\\DefaultAuthHttpAdapterFactory',
      'ZF\\MvcAuth\\Authorization\\AclAuthorization' => 'ZF\\MvcAuth\\Factory\\AclAuthorizationFactory',
      'ZF\\MvcAuth\\Authorization\\DefaultAuthorizationListener' => 'ZF\\MvcAuth\\Factory\\DefaultAuthorizationListenerFactory',
      'ZF\\MvcAuth\\Authorization\\DefaultResourceResolverListener' => 'ZF\\MvcAuth\\Factory\\DefaultResourceResolverListenerFactory',
      'ZF\\OAuth2\\Service\\OAuth2Server' => 'ZF\\MvcAuth\\Factory\\NamedOAuth2ServerFactory',
      'Zend\\Authentication\\Storage\\NonPersistent' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\MvcAuth\\Authentication\\DefaultAuthenticationPostListener' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\MvcAuth\\Authorization\\DefaultAuthorizationPostListener' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\OAuth2\\Adapter\\PdoAdapter' => 'ZF\\OAuth2\\Factory\\PdoAdapterFactory',
      'ZF\\OAuth2\\Adapter\\IbmDb2Adapter' => 'ZF\\OAuth2\\Factory\\IbmDb2AdapterFactory',
      'ZF\\OAuth2\\Adapter\\MongoAdapter' => 'ZF\\OAuth2\\Factory\\MongoAdapterFactory',
      'ZF\\OAuth2\\Provider\\UserId\\AuthenticationService' => 'ZF\\OAuth2\\Provider\\UserId\\AuthenticationServiceFactory',
      'ZF\\Hal\\Extractor\\LinkExtractor' => 'ZF\\Hal\\Factory\\LinkExtractorFactory',
      'ZF\\Hal\\Extractor\\LinkCollectionExtractor' => 'ZF\\Hal\\Factory\\LinkCollectionExtractorFactory',
      'ZF\\Hal\\HalConfig' => 'ZF\\Hal\\Factory\\HalConfigFactory',
      'ZF\\Hal\\JsonRenderer' => 'ZF\\Hal\\Factory\\HalJsonRendererFactory',
      'ZF\\Hal\\JsonStrategy' => 'ZF\\Hal\\Factory\\HalJsonStrategyFactory',
      'ZF\\Hal\\Link\\LinkUrlBuilder' => 'ZF\\Hal\\Factory\\LinkUrlBuilderFactory',
      'ZF\\Hal\\MetadataMap' => 'ZF\\Hal\\Factory\\MetadataMapFactory',
      'ZF\\Hal\\RendererOptions' => 'ZF\\Hal\\Factory\\RendererOptionsFactory',
      'ZF\\ContentNegotiation\\ContentTypeListener' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Request' => 'ZF\\ContentNegotiation\\Factory\\RequestFactory',
      'ZF\\ContentNegotiation\\AcceptListener' => 'ZF\\ContentNegotiation\\Factory\\AcceptListenerFactory',
      'ZF\\ContentNegotiation\\AcceptFilterListener' => 'ZF\\ContentNegotiation\\Factory\\AcceptFilterListenerFactory',
      'ZF\\ContentNegotiation\\ContentTypeFilterListener' => 'ZF\\ContentNegotiation\\Factory\\ContentTypeFilterListenerFactory',
      'ZF\\ContentNegotiation\\ContentNegotiationOptions' => 'ZF\\ContentNegotiation\\Factory\\ContentNegotiationOptionsFactory',
      'ZF\\ContentNegotiation\\HttpMethodOverrideListener' => 'ZF\\ContentNegotiation\\Factory\\HttpMethodOverrideListenerFactory',
      'ZF\\ContentValidation\\ContentValidationListener' => 'ZF\\ContentValidation\\ContentValidationListenerFactory',
      'ZF\\Rest\\OptionsListener' => 'ZF\\Rest\\Factory\\OptionsListenerFactory',
      'ZF\\Rpc\\OptionsListener' => 'ZF\\Rpc\\Factory\\OptionsListenerFactory',
      'ZF\\Versioning\\AcceptListener' => 'ZF\\Versioning\\Factory\\AcceptListenerFactory',
      'ZF\\Versioning\\ContentTypeListener' => 'ZF\\Versioning\\Factory\\ContentTypeListenerFactory',
      'ZF\\Versioning\\VersionListener' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Zend\\Db\\Adapter\\Adapter' => 'Zend\\Db\\Adapter\\AdapterServiceFactory',
    ),
    'aliases' => 
    array (
      'Zend\\Db\\Adapter\\Adapter' => 'Zend\\Db\\Adapter\\AdapterInterface',
      'InputFilterManager' => 'Zend\\InputFilter\\InputFilterPluginManager',
      'ValidatorManager' => 'Zend\\Validator\\ValidatorPluginManager',
      'ZfDoctrineQueryBuilderFilterManagerOrm' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\Service\\ORMFilterManager',
      'ZfDoctrineQueryBuilderFilterManagerOdm' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\Service\\ODMFilterManager',
      'ZfDoctrineQueryBuilderOrderByManagerOrm' => 'ZF\\Doctrine\\QueryBuilder\\OrderBy\\Service\\ORMOrderByManager',
      'ZfDoctrineQueryBuilderOrderByManagerOdm' => 'ZF\\Doctrine\\QueryBuilder\\OrderBy\\Service\\ODMOrderByManager',
      'mime_resolver' => 'AssetManager\\Service\\MimeResolver',
      'AssetManager\\Service\\AggregateResolver' => 'AssetManager\\Resolver\\AggregateResolver',
      'ZF\\ApiProblem\\ApiProblemListener' => 'ZF\\ApiProblem\\Listener\\ApiProblemListener',
      'ZF\\ApiProblem\\RenderErrorListener' => 'ZF\\ApiProblem\\Listener\\RenderErrorListener',
      'ZF\\ApiProblem\\ApiProblemRenderer' => 'ZF\\ApiProblem\\View\\ApiProblemRenderer',
      'ZF\\ApiProblem\\ApiProblemStrategy' => 'ZF\\ApiProblem\\View\\ApiProblemStrategy',
      'authentication' => 'ZF\\MvcAuth\\Authentication',
      'authorization' => 'ZF\\MvcAuth\\Authorization\\AuthorizationInterface',
      'ZF\\MvcAuth\\Authorization\\AuthorizationInterface' => 'ZF\\MvcAuth\\Authorization\\AclAuthorization',
      'ZF\\OAuth2\\Provider\\UserId' => 'ZF\\OAuth2\\Provider\\UserId\\AuthenticationService',
    ),
    'invokables' => 
    array (
      'DoctrineModule\\Authentication\\Storage\\Session' => 'Zend\\Authentication\\Storage\\Session',
      'doctrine.dbal_cmd.runsql' => '\\Doctrine\\DBAL\\Tools\\Console\\Command\\RunSqlCommand',
      'doctrine.dbal_cmd.import' => '\\Doctrine\\DBAL\\Tools\\Console\\Command\\ImportCommand',
      'doctrine.orm_cmd.clear_cache_metadata' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ClearCache\\MetadataCommand',
      'doctrine.orm_cmd.clear_cache_result' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ClearCache\\ResultCommand',
      'doctrine.orm_cmd.clear_cache_query' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ClearCache\\QueryCommand',
      'doctrine.orm_cmd.schema_tool_create' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\SchemaTool\\CreateCommand',
      'doctrine.orm_cmd.schema_tool_update' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\SchemaTool\\UpdateCommand',
      'doctrine.orm_cmd.schema_tool_drop' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\SchemaTool\\DropCommand',
      'doctrine.orm_cmd.convert_d1_schema' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ConvertDoctrine1SchemaCommand',
      'doctrine.orm_cmd.generate_entities' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\GenerateEntitiesCommand',
      'doctrine.orm_cmd.generate_proxies' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\GenerateProxiesCommand',
      'doctrine.orm_cmd.convert_mapping' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ConvertMappingCommand',
      'doctrine.orm_cmd.run_dql' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\RunDqlCommand',
      'doctrine.orm_cmd.validate_schema' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ValidateSchemaCommand',
      'doctrine.orm_cmd.info' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\InfoCommand',
      'doctrine.orm_cmd.ensure_production_settings' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\EnsureProductionSettingsCommand',
      'doctrine.orm_cmd.generate_repositories' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\GenerateRepositoriesCommand',
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\DateTimeField' => 'Phpro\\DoctrineHydrationModule\\Hydrator\\ODM\\MongoDB\\Strategy\\DateTimeField',
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\DefaultRelation' => 'Phpro\\DoctrineHydrationModule\\Hydrator\\ODM\\MongoDB\\Strategy\\DefaultRelation',
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\EmbeddedCollection' => 'Phpro\\DoctrineHydrationModule\\Hydrator\\ODM\\MongoDB\\Strategy\\EmbeddedCollection',
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\EmbeddedField' => 'Phpro\\DoctrineHydrationModule\\Hydrator\\ODM\\MongoDB\\Strategy\\EmbeddedField',
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\ReferencedCollection' => 'Phpro\\DoctrineHydrationModule\\Hydrator\\ODM\\MongoDB\\Strategy\\ReferencedCollection',
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\ReferencedField' => 'Phpro\\DoctrineHydrationModule\\Hydrator\\ODM\\MongoDB\\Strategy\\ReferencedField',
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\EmbeddedReferenceCollection' => 'Phpro\\DoctrineHydrationModule\\Hydrator\\ODM\\MongoDB\\Strategy\\EmbeddedReferenceCollection',
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\EmbeddedReferenceField' => 'Phpro\\DoctrineHydrationModule\\Hydrator\\ODM\\MongoDB\\Strategy\\EmbeddedReferenceField',
      'AssetManager\\Service\\MimeResolver' => 'AssetManager\\Service\\MimeResolver',
      'ZF\\Rest\\RestParametersListener' => 'ZF\\Rest\\Listener\\RestParametersListener',
    ),
    'shared' => 
    array (
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\DateTimeField' => false,
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\DefaultRelation' => false,
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\EmbeddedCollection' => false,
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\EmbeddedField' => false,
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\ReferencedCollection' => false,
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\ReferencedField' => false,
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\EmbeddedReferenceCollection' => false,
      'DoctrineHydrationModule\\Strategy\\ODM\\MongoDB\\EmbeddedReferenceField' => false,
    ),
    'delegators' => 
    array (
      'ZF\\MvcAuth\\Authentication\\DefaultAuthenticationListener' => 
      array (
        0 => 'ZF\\MvcAuth\\Factory\\AuthenticationAdapterDelegatorFactory',
      ),
    ),
  ),
  'router' => 
  array (
    'routes' => 
    array (
      'zf-apigility' => 
      array (
        'child_routes' => 
        array (
          'documentation' => 
          array (
            'type' => 'segment',
            'options' => 
            array (
              'route' => '/documentation[/:api[-v:version][/:service]]',
              'constraints' => 
              array (
                'api' => '[a-zA-Z][a-zA-Z0-9_.%]+',
              ),
              'defaults' => 
              array (
                'controller' => 'ZF\\Apigility\\Documentation\\Controller',
                'action' => 'show',
              ),
            ),
          ),
        ),
        'type' => 'literal',
        'options' => 
        array (
          'route' => '/apigility',
        ),
        'may_terminate' => false,
      ),
      'doctrine_orm_module_yuml' => 
      array (
        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/ocra_service_manager_yuml',
          'defaults' => 
          array (
            'controller' => 'DoctrineORMModule\\Yuml\\YumlController',
            'action' => 'index',
          ),
        ),
      ),
      'home' => 
      array (
        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\Index',
            'action' => 'index',
          ),
        ),
      ),
      'application' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/application',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Application\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'default' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/:action]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
              ),
              'defaults' => 
              array (
              ),
            ),
          ),
        ),
      ),
      'oauth' => 
      array (
        'type' => 'literal',
        'options' => 
        array (
          'route' => '/oauth',
          'defaults' => 
          array (
            'controller' => 'ZF\\OAuth2\\Controller\\Auth',
            'action' => 'token',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'revoke' => 
          array (
            'type' => 'literal',
            'options' => 
            array (
              'route' => '/revoke',
              'defaults' => 
              array (
                'action' => 'revoke',
              ),
            ),
          ),
          'authorize' => 
          array (
            'type' => 'literal',
            'options' => 
            array (
              'route' => '/authorize',
              'defaults' => 
              array (
                'action' => 'authorize',
              ),
            ),
          ),
          'resource' => 
          array (
            'type' => 'literal',
            'options' => 
            array (
              'route' => '/resource',
              'defaults' => 
              array (
                'action' => 'resource',
              ),
            ),
          ),
          'code' => 
          array (
            'type' => 'literal',
            'options' => 
            array (
              'route' => '/receivecode',
              'defaults' => 
              array (
                'action' => 'receiveCode',
              ),
            ),
          ),
        ),
      ),
      'base' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/base',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Base\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'default' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '(?!\\bpage\\b)(?!\\border_by\\b)[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '\\d+',
                'page' => '\\d+',
                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'order' => 'ASC|DESC',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Base\\Controller',
                'controller' => 'Index',
                'action' => 'index',
              ),
            ),
          ),
        ),
      ),
      'images' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/admin/image/images/',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Image',
            'action' => 'images',
          ),
        ),
      ),
      'gallery' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/admin/gallery',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Image',
            'action' => 'gallery',
          ),
        ),
      ),
      'person' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/admin',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'default' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/person[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]',
              'constraints' => 
              array (
                'action' => '(?!\\bpage\\b)(?!\\border_by\\b)[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '\\d+',
                'page' => '\\d+',
                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'order' => 'ASC|DESC',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'Person',
                'action' => 'index',
              ),
            ),
          ),
          'paginator' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[/:controller[/page/:page]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'page' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
              ),
            ),
          ),
        ),
      ),
      'person-teacher' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/admin',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'default' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/person-teacher[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]',
              'constraints' => 
              array (
                'action' => '(?!\\bpage\\b)(?!\\border_by\\b)[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '\\d+',
                'page' => '\\d+',
                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'order' => 'ASC|DESC',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'Person',
                'action' => 'teacher',
              ),
            ),
          ),
          'paginator' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[/:controller[/page/:page]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'page' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
              ),
            ),
          ),
        ),
      ),
      'person-profile' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '/admin/person-profile[/:id]',
          'constraints' => 
          array (
            'id' => '\\d+',
          ),
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Person',
            'action' => 'profile',
          ),
        ),
      ),
      'bank-account' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/admin/bank-account',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'BankAccount',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'default' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/:action[/:id]]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'bank-account',
              ),
            ),
          ),
          'paginator' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/page/:page]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'page' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'bank-account',
              ),
            ),
          ),
        ),
      ),
      'bank-account-edit' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '/admin/bank-account/edit[/:id]',
          'constraints' => 
          array (
            'id' => '\\d+',
          ),
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'BankAccount',
            'action' => 'edit',
          ),
        ),
      ),
      'person-register' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/register',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Index',
            'action' => 'register',
          ),
        ),
      ),
      'person-activate' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '/register/activate[/:key]',
          'defaults' => 
          array (
            'controller' => 'Register\\Controller\\Index',
            'action' => 'activate',
          ),
        ),
      ),
      'person-auth' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/auth',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Auth',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'default' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/:action[/:id]]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'auth',
              ),
            ),
          ),
          'paginator' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/page/:page]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'page' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'auth',
              ),
            ),
          ),
        ),
      ),
      'person-logout' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/auth/logout',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Auth',
            'action' => 'logout',
          ),
        ),
      ),
      'lostpassword' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/auth/lostpassword',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Auth',
            'action' => 'lostpassword',
          ),
        ),
      ),
      'mail-lostPassword' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '/mailer/mail-lostPassword',
          'defaults' => 
          array (
            'controller' => 'Register\\Controller\\AuthController',
            'action' => 'lostpassword',
          ),
        ),
      ),
      'permission' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '/permission[/:id]',
          'constraints' => 
          array (
            'id' => '\\d+',
          ),
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Profile',
            'action' => 'permissao',
          ),
        ),
      ),
      'profile' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/admin/profile',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Profile',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'defaults' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/:action[/:id]]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'profile',
              ),
            ),
          ),
          'paginator' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/page/:page]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'page' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'profile',
              ),
            ),
          ),
        ),
      ),
      'configuration' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/admin',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'defaults' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/configuration[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]',
              'constraints' => 
              array (
                'action' => '(?!\\bpage\\b)(?!\\border_by\\b)[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '\\d+',
                'page' => '\\d+',
                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'order' => 'ASC|DESC',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'Configuration',
                'action' => 'index',
              ),
            ),
          ),
          'paginator' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[/:controller[/page/:page]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'page' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
              ),
            ),
          ),
        ),
      ),
      'image' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/admin',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Register\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'defaults' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/image[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]',
              'constraints' => 
              array (
                'action' => '(?!\\bpage\\b)(?!\\border_by\\b)[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '\\d+',
                'page' => '\\d+',
                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'order' => 'ASC|DESC',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => 'Image',
                'action' => 'index',
              ),
            ),
          ),
          'paginator' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[/:controller[/page/:page]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'page' => '\\d+',
              ),
              'defaults' => 
              array (
                '__NAMESPACE__' => 'Register\\Controller',
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
              ),
            ),
          ),
        ),
      ),
      'api.rest.doctrine.city' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/api/city[/:city_id]',
          'defaults' => 
          array (
            'controller' => 'api\\V1\\Rest\\City\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'api.rest.doctrine.event-address' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/api/event-address[/:event_address_id]',
          'defaults' => 
          array (
            'controller' => 'api\\V1\\Rest\\EventAddress\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'api.rest.doctrine.state' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/api/state[/:state_id]',
          'defaults' => 
          array (
            'controller' => 'api\\V1\\Rest\\State\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'api.rest.doctrine.event-addresses' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/api/event-addresses[/:event_addresses_id]',
          'defaults' => 
          array (
            'controller' => 'api\\V1\\Rest\\EventAddresses\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'api.rest.doctrine.event' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/api/event[/:event_id]',
          'defaults' => 
          array (
            'controller' => 'api\\V1\\Rest\\Event\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'api.rest.doctrine.category-image' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/api/category-image[/:category_image_id]',
          'defaults' => 
          array (
            'controller' => 'api\\V1\\Rest\\CategoryImage\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'api.rest.doctrine.image' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/api/image[/:image_id]',
          'defaults' => 
          array (
            'controller' => 'api\\V1\\Rest\\Image\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'admin' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/admin',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Admin\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
      ),
    ),
  ),
  'controllers' => 
  array (
    'factories' => 
    array (
      'ZF\\Apigility\\Documentation\\Controller' => 'ZF\\Apigility\\Documentation\\ControllerFactory',
      'DoctrineModule\\Controller\\Cli' => 'DoctrineModule\\Service\\CliControllerFactory',
      'AssetManager\\Controller\\Console' => 'AssetManager\\Controller\\ConsoleControllerFactory',
      'ZF\\OAuth2\\Controller\\Auth' => 'ZF\\OAuth2\\Factory\\AuthControllerFactory',
      'ZF\\DevelopmentMode\\DevelopmentModeController' => 'ZF\\DevelopmentMode\\DevelopmentModeControllerFactory',
    ),
    'invokables' => 
    array (
      'Application\\Controller\\Index' => 'Application\\Controller\\IndexController',
      'Register\\Controller\\Index' => 'Register\\Controller\\IndexController',
      'Register\\Controller\\Person' => 'Register\\Controller\\PersonController',
      'Register\\Controller\\Auth' => 'Register\\Controller\\AuthController',
      'Register\\Controller\\BankAccount' => 'Register\\Controller\\BankAccountController',
      'Register\\Controller\\Profile' => 'Register\\Controller\\ProfileController',
      'Register\\Controller\\Configuration' => 'Register\\Controller\\ConfigurationController',
      'Register\\Controller\\Image' => 'Register\\Controller\\ImageController',
      'Admin\\Controller\\Index' => 'Admin\\Controller\\IndexController',
    ),
    'abstract_factories' => 
    array (
      0 => 'ZF\\Rest\\Factory\\RestControllerFactory',
      1 => 'ZF\\Rpc\\Factory\\RpcControllerFactory',
    ),
  ),
  'zf-content-negotiation' => 
  array (
    'controllers' => 
    array (
      'ZF\\Apigility\\Documentation\\Controller' => 'Documentation',
      'ZF\\OAuth2\\Controller\\Auth' => 
      array (
        'ZF\\ContentNegotiation\\JsonModel' => 
        array (
          0 => 'application/json',
          1 => 'application/*+json',
        ),
        'Zend\\View\\Model\\ViewModel' => 
        array (
          0 => 'text/html',
          1 => 'application/xhtml+xml',
        ),
      ),
      'api\\V1\\Rest\\City\\Controller' => 'HalJson',
      'api\\V1\\Rest\\EventAddress\\Controller' => 'HalJson',
      'api\\V1\\Rest\\State\\Controller' => 'HalJson',
      'api\\V1\\Rest\\EventAddresses\\Controller' => 'HalJson',
      'api\\V1\\Rest\\Event\\Controller' => 'HalJson',
      'api\\V1\\Rest\\CategoryImage\\Controller' => 'HalJson',
      'api\\V1\\Rest\\Image\\Controller' => 'HalJson',
    ),
    'accept_whitelist' => 
    array (
      'ZF\\Apigility\\Documentation\\Controller' => 
      array (
        0 => 'application/vnd.swagger+json',
        1 => 'application/json',
      ),
      'api\\V1\\Rest\\City\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
      'api\\V1\\Rest\\EventAddress\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
      'api\\V1\\Rest\\State\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
      'api\\V1\\Rest\\EventAddresses\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
      'api\\V1\\Rest\\Event\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
      'api\\V1\\Rest\\CategoryImage\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
      'api\\V1\\Rest\\Image\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
    ),
    'selectors' => 
    array (
      'Documentation' => 
      array (
        'Zend\\View\\Model\\ViewModel' => 
        array (
          0 => 'text/html',
          1 => 'application/xhtml+xml',
        ),
        'ZF\\Apigility\\Documentation\\JsonModel' => 
        array (
          0 => 'application/json',
        ),
      ),
      'HalJson' => 
      array (
        'ZF\\Hal\\View\\HalJsonModel' => 
        array (
          0 => 'application/json',
          1 => 'application/*+json',
        ),
      ),
      'Json' => 
      array (
        'ZF\\ContentNegotiation\\JsonModel' => 
        array (
          0 => 'application/json',
          1 => 'application/*+json',
        ),
      ),
    ),
    'content_type_whitelist' => 
    array (
      'api\\V1\\Rest\\City\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/json',
      ),
      'api\\V1\\Rest\\EventAddress\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/json',
      ),
      'api\\V1\\Rest\\State\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/json',
      ),
      'api\\V1\\Rest\\EventAddresses\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/json',
      ),
      'api\\V1\\Rest\\Event\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/json',
      ),
      'api\\V1\\Rest\\CategoryImage\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/json',
      ),
      'api\\V1\\Rest\\Image\\Controller' => 
      array (
        0 => 'application/vnd.api.v1+json',
        1 => 'application/json',
      ),
    ),
    'x_http_method_override_enabled' => false,
    'http_override_methods' => 
    array (
    ),
  ),
  'view_helpers' => 
  array (
    'aliases' => 
    array (
      'agacceptheaders' => 'ZF\\Apigility\\Documentation\\View\\AgAcceptHeaders',
      'agAcceptHeaders' => 'ZF\\Apigility\\Documentation\\View\\AgAcceptHeaders',
      'agcontenttypeheaders' => 'ZF\\Apigility\\Documentation\\View\\AgContentTypeHeaders',
      'agContentTypeHeaders' => 'ZF\\Apigility\\Documentation\\View\\AgContentTypeHeaders',
      'agservicepath' => 'ZF\\Apigility\\Documentation\\View\\AgServicePath',
      'agServicePath' => 'ZF\\Apigility\\Documentation\\View\\AgServicePath',
      'agstatuscodes' => 'ZF\\Apigility\\Documentation\\View\\AgStatusCodes',
      'agStatusCodes' => 'ZF\\Apigility\\Documentation\\View\\AgStatusCodes',
      'agtransformdescription' => 'ZF\\Apigility\\Documentation\\View\\AgTransformDescription',
      'agTransformDescription' => 'ZF\\Apigility\\Documentation\\View\\AgTransformDescription',
    ),
    'factories' => 
    array (
      'ZF\\Apigility\\Documentation\\View\\AgAcceptHeaders' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Apigility\\Documentation\\View\\AgContentTypeHeaders' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Apigility\\Documentation\\View\\AgServicePath' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Apigility\\Documentation\\View\\AgStatusCodes' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Apigility\\Documentation\\View\\AgTransformDescription' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'asset' => 'AssetManager\\Service\\AssetViewHelperFactory',
      'Hal' => 'ZF\\Hal\\Factory\\HalViewHelperFactory',
    ),
    'invokables' => 
    array (
      'mostraoptions' => 'Base\\View\\Helper\\MostraOptions',
      'formpesquisa' => 'Base\\View\\Helper\\FormPesquisa',
      'formRow' => 'Base\\Form\\View\\Helper\\TwbBundleFormRow',
      'formAngular' => 'Base\\Form\\View\\Helper\\AngularBundleFormElement',
      'formMultiCheckbox' => 'Base\\Form\\View\\Helper\\TwbBundleFormMultiCheckbox',
      'templatedFormCollection' => 'Base\\View\\Helper\\TemplatedFormCollection',
      'templatedCollection' => 'Base\\View\\Helper\\TemplatedCollection',
      'TdField' => 'Base\\View\\Helper\\TdField',
      'migratesUpdate' => 'Base\\View\\Helper\\MigratesUpdate',
      'rota' => 'Base\\View\\Helper\\RotaHelper',
      'headListagem' => 'Base\\View\\Helper\\Listagem\\HeadListagem',
      'bodyListagem' => 'Base\\View\\Helper\\Listagem\\BodyListagem',
      'globalVars' => 'Base\\View\\Helper\\GlobalVars',
      'formatCPF' => 'Base\\View\\Helper\\FormatCPF',
      'formatCNPJ' => 'Base\\View\\Helper\\FormatCNPJ',
      'formatCpfCnpj' => 'Base\\View\\Helper\\FormatCpfCnpj',
      'formatCEP' => 'Base\\View\\Helper\\FormatCEP',
      'getFile' => 'Base\\View\\Helper\\GetFile',
      'getAdminFlashMessenger' => 'Base\\View\\Helper\\GetAdminFlashMessenger',
      'getFriendlyUrl' => 'Base\\View\\Helper\\GetFriendlyUrl',
    ),
  ),
  'view_manager' => 
  array (
    'template_path_stack' => 
    array (
      0 => '/var/www/html/boaforma/vendor/zfcampus/zf-apigility-documentation/config/../view',
      'zf-apigility-doctrine' => '/var/www/html/boaforma/vendor/zfcampus/zf-apigility-doctrine/config/../view',
      1 => '/var/www/html/boaforma/module/Application/config/../view',
      2 => '/var/www/html/boaforma/vendor/zfcampus/zf-oauth2/config/../view',
      3 => '/var/www/html/boaforma/module/Base/config/../view',
      4 => '/var/www/html/boaforma/module/Register/config/../view',
      5 => '/var/www/html/boaforma/module/Admin/config/../view',
    ),
    'template_map' => 
    array (
      'zend-developer-tools/toolbar/doctrine-orm-queries' => '/var/www/html/boaforma/vendor/doctrine/doctrine-orm-module/config/../view/zend-developer-tools/toolbar/doctrine-orm-queries.phtml',
      'zend-developer-tools/toolbar/doctrine-orm-mappings' => '/var/www/html/boaforma/vendor/doctrine/doctrine-orm-module/config/../view/zend-developer-tools/toolbar/doctrine-orm-mappings.phtml',
      'layout/layout' => '/var/www/html/boaforma/module/Admin/config/../view/layout/admin.phtml',
      'application/index/index' => '/var/www/html/boaforma/module/Application/config/../view/application/index/index.phtml',
      'error/404' => '/var/www/html/boaforma/module/Admin/config/../view/error/404.phtml',
      'error/index' => '/var/www/html/boaforma/module/Admin/config/../view/error/index.phtml',
      'oauth/authorize' => '/var/www/html/boaforma/vendor/zfcampus/zf-oauth2/config/../view/zf/auth/authorize.phtml',
      'oauth/receive-code' => '/var/www/html/boaforma/vendor/zfcampus/zf-oauth2/config/../view/zf/auth/receive-code.phtml',
      'image-interface' => '/var/www/html/boaforma/module/Register/config/../view/partials/image-interface.phtml',
    ),
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'strategies' => 
    array (
      0 => 'ViewJsonStrategy',
      1 => 'ViewJsonStrategy',
    ),
  ),
  'zf-configuration' => 
  array (
    'config_file' => 'config/autoload/development.php',
  ),
  'doctrine' => 
  array (
    'cache' => 
    array (
      'apc' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\ApcCache',
        'namespace' => 'DoctrineModule',
      ),
      'apcu' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\ApcuCache',
        'namespace' => 'DoctrineModule',
      ),
      'array' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\ArrayCache',
        'namespace' => 'DoctrineModule',
      ),
      'filesystem' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
        'directory' => 'data/DoctrineModule/cache',
        'namespace' => 'DoctrineModule',
      ),
      'memcache' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
        'instance' => 'my_memcache_alias',
        'namespace' => 'DoctrineModule',
      ),
      'memcached' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
        'instance' => 'my_memcached_alias',
        'namespace' => 'DoctrineModule',
      ),
      'predis' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\PredisCache',
        'instance' => 'my_predis_alias',
        'namespace' => 'DoctrineModule',
      ),
      'redis' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\RedisCache',
        'instance' => 'my_redis_alias',
        'namespace' => 'DoctrineModule',
      ),
      'wincache' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
        'namespace' => 'DoctrineModule',
      ),
      'xcache' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\XcacheCache',
        'namespace' => 'DoctrineModule',
      ),
      'zenddata' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
        'namespace' => 'DoctrineModule',
      ),
    ),
    'authentication' => 
    array (
      'odm_default' => 
      array (
      ),
      'orm_default' => 
      array (
        'objectManager' => 'doctrine.entitymanager.orm_default',
      ),
    ),
    'authenticationadapter' => 
    array (
      'odm_default' => true,
      'orm_default' => true,
    ),
    'authenticationstorage' => 
    array (
      'odm_default' => true,
      'orm_default' => true,
    ),
    'authenticationservice' => 
    array (
      'odm_default' => true,
      'orm_default' => true,
    ),
    'connection' => 
    array (
      'orm_default' => 
      array (
        'configuration' => 'orm_default',
        'eventmanager' => 'orm_default',
        'params' => 
        array (
          'host' => 'localhost',
          'port' => '3306',
          'user' => 'root',
          'password' => 'Jonas.160592',
          'dbname' => 'boaforma',
          'charset' => 'utf8',
        ),
        'driverClass' => 'Doctrine\\DBAL\\Driver\\PDOMySql\\Driver',
      ),
    ),
    'configuration' => 
    array (
      'orm_default' => 
      array (
        'metadata_cache' => 'array',
        'query_cache' => 'array',
        'result_cache' => 'array',
        'hydration_cache' => 'array',
        'driver' => 'orm_default',
        'generate_proxies' => true,
        'proxy_dir' => 'data/DoctrineORMModule/Proxy',
        'proxy_namespace' => 'DoctrineORMModule\\Proxy',
        'filters' => 
        array (
        ),
        'datetime_functions' => 
        array (
        ),
        'string_functions' => 
        array (
        ),
        'numeric_functions' => 
        array (
        ),
        'second_level_cache' => 
        array (
        ),
      ),
    ),
    'driver' => 
    array (
      'orm_default' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
        'drivers' => 
        array (
          'Register\\Entity' => 'Register_driver',
          'Admin\\Entity' => 'Admin_driver',
        ),
      ),
      'Register_driver' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
        'cache' => 'array',
        'paths' => 
        array (
          0 => '/var/www/html/boaforma/module/Register/config/../src/Register/Entity',
        ),
      ),
      'Admin_driver' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
        'cache' => 'array',
        'paths' => 
        array (
          0 => '/var/www/html/boaforma/module/Admin/config/../src/Admin/Entity',
        ),
      ),
    ),
    'entitymanager' => 
    array (
      'orm_default' => 
      array (
        'connection' => 'orm_default',
        'configuration' => 'orm_default',
      ),
    ),
    'eventmanager' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'sql_logger_collector' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'mapping_collector' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'formannotationbuilder' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'entity_resolver' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'migrations_configuration' => 
    array (
      'orm_default' => 
      array (
        'directory' => 'data/DoctrineORMModule/Migrations',
        'name' => 'Doctrine Database Migrations',
        'namespace' => 'DoctrineORMModule\\Migrations',
        'table' => 'migrations',
        'column' => 'version',
      ),
    ),
    'migrations_cmd' => 
    array (
      'generate' => 
      array (
      ),
      'execute' => 
      array (
      ),
      'migrate' => 
      array (
      ),
      'status' => 
      array (
      ),
      'version' => 
      array (
      ),
      'diff' => 
      array (
      ),
      'latest' => 
      array (
      ),
    ),
  ),
  'doctrine_factories' => 
  array (
    'cache' => 'DoctrineModule\\Service\\CacheFactory',
    'eventmanager' => 'DoctrineModule\\Service\\EventManagerFactory',
    'driver' => 'DoctrineModule\\Service\\DriverFactory',
    'authenticationadapter' => 'DoctrineModule\\Service\\Authentication\\AdapterFactory',
    'authenticationstorage' => 'DoctrineModule\\Service\\Authentication\\StorageFactory',
    'authenticationservice' => 'DoctrineModule\\Service\\Authentication\\AuthenticationServiceFactory',
    'connection' => 'DoctrineORMModule\\Service\\DBALConnectionFactory',
    'configuration' => 'DoctrineORMModule\\Service\\ConfigurationFactory',
    'entitymanager' => 'DoctrineORMModule\\Service\\EntityManagerFactory',
    'entity_resolver' => 'DoctrineORMModule\\Service\\EntityResolverFactory',
    'sql_logger_collector' => 'DoctrineORMModule\\Service\\SQLLoggerCollectorFactory',
    'mapping_collector' => 'DoctrineORMModule\\Service\\MappingCollectorFactory',
    'formannotationbuilder' => 'DoctrineORMModule\\Service\\FormAnnotationBuilderFactory',
    'migrations_configuration' => 'DoctrineORMModule\\Service\\MigrationsConfigurationFactory',
    'migrations_cmd' => 'DoctrineORMModule\\Service\\MigrationsCommandFactory',
  ),
  'route_manager' => 
  array (
    'factories' => 
    array (
      'symfony_cli' => 'DoctrineModule\\Service\\SymfonyCliRouteFactory',
    ),
  ),
  'console' => 
  array (
    'router' => 
    array (
      'routes' => 
      array (
        'doctrine_cli' => 
        array (
          'type' => 'symfony_cli',
        ),
        'AssetManager-warmup' => 
        array (
          'options' => 
          array (
            'route' => 'assetmanager warmup [--purge] [--verbose|-v]',
            'defaults' => 
            array (
              'controller' => 'AssetManager\\Controller\\Console',
              'action' => 'warmup',
            ),
          ),
        ),
        'development-disable' => 
        array (
          'options' => 
          array (
            'route' => 'development disable',
            'defaults' => 
            array (
              'controller' => 'ZF\\DevelopmentMode\\DevelopmentModeController',
              'action' => 'disable',
            ),
          ),
        ),
        'development-enable' => 
        array (
          'options' => 
          array (
            'route' => 'development enable',
            'defaults' => 
            array (
              'controller' => 'ZF\\DevelopmentMode\\DevelopmentModeController',
              'action' => 'enable',
            ),
          ),
        ),
      ),
    ),
  ),
  'form_elements' => 
  array (
    'aliases' => 
    array (
      'objectselect' => 'DoctrineModule\\Form\\Element\\ObjectSelect',
      'objectradio' => 'DoctrineModule\\Form\\Element\\ObjectRadio',
      'objectmulticheckbox' => 'DoctrineModule\\Form\\Element\\ObjectMultiCheckbox',
    ),
    'factories' => 
    array (
      'DoctrineModule\\Form\\Element\\ObjectSelect' => 'DoctrineORMModule\\Service\\ObjectSelectFactory',
      'DoctrineModule\\Form\\Element\\ObjectRadio' => 'DoctrineORMModule\\Service\\ObjectRadioFactory',
      'DoctrineModule\\Form\\Element\\ObjectMultiCheckbox' => 'DoctrineORMModule\\Service\\ObjectMultiCheckboxFactory',
    ),
  ),
  'hydrators' => 
  array (
    'factories' => 
    array (
      'DoctrineModule\\Stdlib\\Hydrator\\DoctrineObject' => 'DoctrineORMModule\\Service\\DoctrineObjectHydratorFactory',
    ),
    'abstract_factories' => 
    array (
      0 => 'Phpro\\DoctrineHydrationModule\\Service\\DoctrineHydratorFactory',
    ),
  ),
  'zenddevelopertools' => 
  array (
    'profiler' => 
    array (
      'collectors' => 
      array (
        'doctrine.sql_logger_collector.orm_default' => 'doctrine.sql_logger_collector.orm_default',
        'doctrine.mapping_collector.orm_default' => 'doctrine.mapping_collector.orm_default',
      ),
    ),
    'toolbar' => 
    array (
      'entries' => 
      array (
        'doctrine.sql_logger_collector.orm_default' => 'zend-developer-tools/toolbar/doctrine-orm-queries',
        'doctrine.mapping_collector.orm_default' => 'zend-developer-tools/toolbar/doctrine-orm-mappings',
      ),
    ),
  ),
  'zf-apigility-doctrine-query-provider' => 
  array (
    'aliases' => 
    array (
      'default_odm' => 'ZF\\Doctrine\\QueryBuilder\\Query\\Provider\\DefaultOdm',
      'default_orm' => 'ZF\\Doctrine\\QueryBuilder\\Query\\Provider\\DefaultOrm',
    ),
    'factories' => 
    array (
      'ZF\\Apigility\\Doctrine\\Server\\Query\\Provider\\DefaultOdm' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Apigility\\Doctrine\\Server\\Query\\Provider\\DefaultOrm' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Query\\Provider\\DefaultOrm' => 'ZF\\Doctrine\\QueryBuilder\\Query\\Provider\\DefaultOrmFactory',
      'ZF\\Doctrine\\QueryBuilder\\Query\\Provider\\DefaultOdm' => 'ZF\\Doctrine\\QueryBuilder\\Query\\Provider\\DefaultOdmFactory',
    ),
  ),
  'zf-apigility-doctrine-query-create-filter' => 
  array (
    'aliases' => 
    array (
      'default' => 'ZF\\Apigility\\Doctrine\\Server\\Query\\CreateFilter\\DefaultCreateFilter',
    ),
    'factories' => 
    array (
      'ZF\\Apigility\\Doctrine\\Server\\Query\\CreateFilter\\DefaultCreateFilter' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
  'validators' => 
  array (
    'factories' => 
    array (
      'ZF\\Apigility\\Doctrine\\Server\\Validator\\NoObjectExists' => 'ZF\\Apigility\\Doctrine\\Server\\Validator\\NoObjectExistsFactory',
      'ZF\\Apigility\\Doctrine\\Server\\Validator\\ObjectExists' => 'ZF\\Apigility\\Doctrine\\Server\\Validator\\ObjectExistsFactory',
      'Zend\\Validator\\File\\UploadFile' => 'ZF\\ContentNegotiation\\Factory\\UploadFileValidatorFactory',
      'zendvalidatorfileuploadfile' => 'ZF\\ContentNegotiation\\Factory\\UploadFileValidatorFactory',
      'ZF\\ContentValidation\\Validator\\DbRecordExists' => 'ZF\\ContentValidation\\Validator\\Db\\RecordExistsFactory',
      'ZF\\ContentValidation\\Validator\\DbNoRecordExists' => 'ZF\\ContentValidation\\Validator\\Db\\NoRecordExistsFactory',
    ),
  ),
  'translator' => 
  array (
    'locale' => 'en_US',
    'translation_file_patterns' => 
    array (
      0 => 
      array (
        'type' => 'gettext',
        'base_dir' => '/var/www/html/boaforma/module/Application/config/../language',
        'pattern' => '%s.mo',
      ),
    ),
  ),
  'asset_manager' => 
  array (
    'resolver_configs' => 
    array (
      'paths' => 
      array (
        0 => '/var/www/html/boaforma/vendor/zfcampus/zf-apigility/config/../asset',
      ),
    ),
    'clear_output_buffer' => true,
    'resolvers' => 
    array (
      'AssetManager\\Resolver\\MapResolver' => 3000,
      'AssetManager\\Resolver\\ConcatResolver' => 2500,
      'AssetManager\\Resolver\\CollectionResolver' => 2000,
      'AssetManager\\Resolver\\PrioritizedPathsResolver' => 1500,
      'AssetManager\\Resolver\\AliasPathStackResolver' => 1000,
      'AssetManager\\Resolver\\PathStackResolver' => 500,
    ),
    'view_helper' => 
    array (
      'append_timestamp' => true,
      'query_string' => '_',
      'cache' => NULL,
    ),
  ),
  'zf-apigility' => 
  array (
    'db-connected' => 
    array (
    ),
    'doctrine-connected' => 
    array (
      'api\\V1\\Rest\\City\\CityResource' => 
      array (
        'object_manager' => 'doctrine.entitymanager.orm_default',
        'hydrator' => 'api\\V1\\Rest\\City\\CityHydrator',
      ),
      'api\\V1\\Rest\\EventAddress\\EventAddressResource' => 
      array (
        'object_manager' => 'doctrine.entitymanager.orm_default',
        'hydrator' => 'api\\V1\\Rest\\EventAddress\\EventAddressHydrator',
      ),
      'api\\V1\\Rest\\State\\StateResource' => 
      array (
        'object_manager' => 'doctrine.entitymanager.orm_default',
        'hydrator' => 'api\\V1\\Rest\\State\\StateHydrator',
      ),
      'api\\V1\\Rest\\EventAddresses\\EventAddressesResource' => 
      array (
        'object_manager' => 'doctrine.entitymanager.orm_default',
        'hydrator' => 'api\\V1\\Rest\\EventAddresses\\EventAddressesHydrator',
      ),
      'api\\V1\\Rest\\Event\\EventResource' => 
      array (
        'object_manager' => 'doctrine.entitymanager.orm_default',
        'hydrator' => 'api\\V1\\Rest\\Event\\EventHydrator',
      ),
      'api\\V1\\Rest\\CategoryImage\\CategoryImageResource' => 
      array (
        'object_manager' => 'doctrine.entitymanager.orm_default',
        'hydrator' => 'api\\V1\\Rest\\CategoryImage\\CategoryImageHydrator',
      ),
      'api\\V1\\Rest\\Image\\ImageResource' => 
      array (
        'object_manager' => 'doctrine.entitymanager.orm_default',
        'hydrator' => 'api\\V1\\Rest\\Image\\ImageHydrator',
      ),
    ),
  ),
  'zf-api-problem' => 
  array (
  ),
  'controller_plugins' => 
  array (
    'aliases' => 
    array (
      'getidentity' => 'ZF\\MvcAuth\\Identity\\IdentityPlugin',
      'getIdentity' => 'ZF\\MvcAuth\\Identity\\IdentityPlugin',
      'routeParam' => 'ZF\\ContentNegotiation\\ControllerPlugin\\RouteParam',
      'queryParam' => 'ZF\\ContentNegotiation\\ControllerPlugin\\QueryParam',
      'bodyParam' => 'ZF\\ContentNegotiation\\ControllerPlugin\\BodyParam',
      'routeParams' => 'ZF\\ContentNegotiation\\ControllerPlugin\\RouteParams',
      'queryParams' => 'ZF\\ContentNegotiation\\ControllerPlugin\\QueryParams',
      'bodyParams' => 'ZF\\ContentNegotiation\\ControllerPlugin\\BodyParams',
      'getinputfilter' => 'ZF\\ContentValidation\\InputFilter\\InputFilterPlugin',
      'getInputfilter' => 'ZF\\ContentValidation\\InputFilter\\InputFilterPlugin',
      'getInputFilter' => 'ZF\\ContentValidation\\InputFilter\\InputFilterPlugin',
      'translate' => 'translatePlugin',
    ),
    'factories' => 
    array (
      'ZF\\MvcAuth\\Identity\\IdentityPlugin' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Hal' => 'ZF\\Hal\\Factory\\HalControllerPluginFactory',
      'ZF\\ContentNegotiation\\ControllerPlugin\\RouteParam' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\ContentNegotiation\\ControllerPlugin\\QueryParam' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\ContentNegotiation\\ControllerPlugin\\BodyParam' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\ContentNegotiation\\ControllerPlugin\\RouteParams' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\ContentNegotiation\\ControllerPlugin\\QueryParams' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\ContentNegotiation\\ControllerPlugin\\BodyParams' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\ContentValidation\\InputFilter\\InputFilterPlugin' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'translatePlugin' => 'Base\\Controller\\Plugin\\Service\\TranslateFactory',
    ),
  ),
  'zf-mvc-auth' => 
  array (
    'authentication' => 
    array (
    ),
    'authorization' => 
    array (
      'deny_by_default' => false,
    ),
  ),
  'zf-oauth2' => 
  array (
    'grant_types' => 
    array (
      'client_credentials' => true,
      'authorization_code' => true,
      'password' => true,
      'refresh_token' => true,
      'jwt' => true,
    ),
    'api_problem_error_response' => true,
  ),
  'zf-hal' => 
  array (
    'renderer' => 
    array (
    ),
    'metadata_map' => 
    array (
      'Register\\Entity\\City' => 
      array (
        'route_identifier_name' => 'city_id',
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.city',
        'hydrator' => 'api\\V1\\Rest\\City\\CityHydrator',
      ),
      'api\\V1\\Rest\\City\\CityCollection' => 
      array (
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.city',
        'is_collection' => true,
      ),
      'Event\\Entity\\EventAddress' => 
      array (
        'route_identifier_name' => 'event_address_id',
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.event-address',
        'hydrator' => 'api\\V1\\Rest\\EventAddress\\EventAddressHydrator',
      ),
      'api\\V1\\Rest\\EventAddress\\EventAddressCollection' => 
      array (
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.event-address',
        'is_collection' => true,
      ),
      'Register\\Entity\\State' => 
      array (
        'route_identifier_name' => 'state_id',
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.state',
        'hydrator' => 'api\\V1\\Rest\\State\\StateHydrator',
      ),
      'api\\V1\\Rest\\State\\StateCollection' => 
      array (
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.state',
        'is_collection' => true,
      ),
      'Event\\Entity\\EventAddresses' => 
      array (
        'route_identifier_name' => 'event_addresses_id',
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.event-addresses',
        'hydrator' => 'api\\V1\\Rest\\EventAddresses\\EventAddressesHydrator',
      ),
      'api\\V1\\Rest\\EventAddresses\\EventAddressesCollection' => 
      array (
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.event-addresses',
        'is_collection' => true,
      ),
      'Event\\Entity\\Event' => 
      array (
        'route_identifier_name' => 'event_id',
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.event',
        'hydrator' => 'api\\V1\\Rest\\Event\\EventHydrator',
      ),
      'api\\V1\\Rest\\Event\\EventCollection' => 
      array (
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.event',
        'is_collection' => true,
      ),
      'Register\\Entity\\CategoryImage' => 
      array (
        'route_identifier_name' => 'category_image_id',
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.category-image',
        'hydrator' => 'api\\V1\\Rest\\CategoryImage\\CategoryImageHydrator',
      ),
      'api\\V1\\Rest\\CategoryImage\\CategoryImageCollection' => 
      array (
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.category-image',
        'is_collection' => true,
      ),
      'Register\\Entity\\Image' => 
      array (
        'route_identifier_name' => 'image_id',
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.image',
        'hydrator' => 'api\\V1\\Rest\\Image\\ImageHydrator',
      ),
      'api\\V1\\Rest\\Image\\ImageCollection' => 
      array (
        'entity_identifier_name' => 'id',
        'route_name' => 'api.rest.doctrine.image',
        'is_collection' => true,
      ),
    ),
    'options' => 
    array (
      'use_proxy' => false,
    ),
  ),
  'filters' => 
  array (
    'factories' => 
    array (
      'Zend\\Filter\\File\\RenameUpload' => 'ZF\\ContentNegotiation\\Factory\\RenameUploadFilterFactory',
      'zendfilterfilerenameupload' => 'ZF\\ContentNegotiation\\Factory\\RenameUploadFilterFactory',
    ),
  ),
  'input_filter_specs' => 
  array (
    'api\\V1\\Rest\\City\\Validator' => 
    array (
      0 => 
      array (
        'name' => 'updatedAt',
        'required' => true,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      1 => 
      array (
        'name' => 'createdAt',
        'required' => true,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      2 => 
      array (
        'name' => 'name',
        'required' => true,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 255,
            ),
          ),
        ),
      ),
      3 => 
      array (
        'name' => 'code',
        'required' => true,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 255,
            ),
          ),
        ),
      ),
    ),
    'api\\V1\\Rest\\EventAddress\\Validator' => 
    array (
      0 => 
      array (
        'name' => 'street',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 225,
            ),
          ),
        ),
      ),
      1 => 
      array (
        'name' => 'number',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 225,
            ),
          ),
        ),
      ),
      2 => 
      array (
        'name' => 'zipCode',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 225,
            ),
          ),
        ),
      ),
      3 => 
      array (
        'name' => 'neighborhood',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 225,
            ),
          ),
        ),
      ),
    ),
    'api\\V1\\Rest\\State\\Validator' => 
    array (
      0 => 
      array (
        'name' => 'updatedAt',
        'required' => true,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      1 => 
      array (
        'name' => 'createdAt',
        'required' => true,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      2 => 
      array (
        'name' => 'name',
        'required' => true,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 255,
            ),
          ),
        ),
      ),
      3 => 
      array (
        'name' => 'uf',
        'required' => true,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 10,
            ),
          ),
        ),
      ),
    ),
    'api\\V1\\Rest\\EventAddresses\\Validator' => 
    array (
      0 => 
      array (
        'name' => 'startAt',
        'required' => true,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      1 => 
      array (
        'name' => 'finishAt',
        'required' => true,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      2 => 
      array (
        'name' => 'active',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      3 => 
      array (
        'name' => 'observation',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
    ),
    'api\\V1\\Rest\\Event\\Validator' => 
    array (
      0 => 
      array (
        'name' => 'updatedAt',
        'required' => true,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      1 => 
      array (
        'name' => 'createdAt',
        'required' => true,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      2 => 
      array (
        'name' => 'active',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      3 => 
      array (
        'name' => 'title',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 255,
            ),
          ),
        ),
      ),
      4 => 
      array (
        'name' => 'description',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
    ),
    'api\\V1\\Rest\\CategoryImage\\Validator' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 225,
            ),
          ),
        ),
      ),
      1 => 
      array (
        'name' => 'chave',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 225,
            ),
          ),
        ),
      ),
    ),
    'api\\V1\\Rest\\Image\\Validator' => 
    array (
      0 => 
      array (
        'name' => 'title',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      1 => 
      array (
        'name' => 'image',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => 225,
            ),
          ),
        ),
      ),
    ),
  ),
  'input_filters' => 
  array (
    'abstract_factories' => 
    array (
      0 => 'Zend\\InputFilter\\InputFilterAbstractServiceFactory',
    ),
  ),
  'zf-content-validation' => 
  array (
    'methods_without_bodies' => 
    array (
    ),
    'api\\V1\\Rest\\City\\Controller' => 
    array (
      'input_filter' => 'api\\V1\\Rest\\City\\Validator',
    ),
    'api\\V1\\Rest\\EventAddress\\Controller' => 
    array (
      'input_filter' => 'api\\V1\\Rest\\EventAddress\\Validator',
    ),
    'api\\V1\\Rest\\State\\Controller' => 
    array (
      'input_filter' => 'api\\V1\\Rest\\State\\Validator',
    ),
    'api\\V1\\Rest\\EventAddresses\\Controller' => 
    array (
      'input_filter' => 'api\\V1\\Rest\\EventAddresses\\Validator',
    ),
    'api\\V1\\Rest\\Event\\Controller' => 
    array (
      'input_filter' => 'api\\V1\\Rest\\Event\\Validator',
    ),
    'api\\V1\\Rest\\CategoryImage\\Controller' => 
    array (
      'input_filter' => 'api\\V1\\Rest\\CategoryImage\\Validator',
    ),
    'api\\V1\\Rest\\Image\\Controller' => 
    array (
      'input_filter' => 'api\\V1\\Rest\\Image\\Validator',
    ),
  ),
  'zf-rest' => 
  array (
    'api\\V1\\Rest\\City\\Controller' => 
    array (
      'listener' => 'api\\V1\\Rest\\City\\CityResource',
      'route_name' => 'api.rest.doctrine.city',
      'route_identifier_name' => 'city_id',
      'entity_identifier_name' => 'id',
      'collection_name' => 'city',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
      ),
      'page_size' => '2000',
      'page_size_param' => NULL,
      'entity_class' => 'Register\\Entity\\City',
      'collection_class' => 'api\\V1\\Rest\\City\\CityCollection',
      'service_name' => 'City',
    ),
    'api\\V1\\Rest\\EventAddress\\Controller' => 
    array (
      'listener' => 'api\\V1\\Rest\\EventAddress\\EventAddressResource',
      'route_name' => 'api.rest.doctrine.event-address',
      'route_identifier_name' => 'event_address_id',
      'entity_identifier_name' => 'id',
      'collection_name' => 'event_address',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
      ),
      'page_size' => 25,
      'page_size_param' => NULL,
      'entity_class' => 'Event\\Entity\\EventAddress',
      'collection_class' => 'api\\V1\\Rest\\EventAddress\\EventAddressCollection',
      'service_name' => 'EventAddress',
    ),
    'api\\V1\\Rest\\State\\Controller' => 
    array (
      'listener' => 'api\\V1\\Rest\\State\\StateResource',
      'route_name' => 'api.rest.doctrine.state',
      'route_identifier_name' => 'state_id',
      'entity_identifier_name' => 'id',
      'collection_name' => 'state',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
      ),
      'page_size' => 25,
      'page_size_param' => NULL,
      'entity_class' => 'Register\\Entity\\State',
      'collection_class' => 'api\\V1\\Rest\\State\\StateCollection',
      'service_name' => 'State',
    ),
    'api\\V1\\Rest\\EventAddresses\\Controller' => 
    array (
      'listener' => 'api\\V1\\Rest\\EventAddresses\\EventAddressesResource',
      'route_name' => 'api.rest.doctrine.event-addresses',
      'route_identifier_name' => 'event_addresses_id',
      'entity_identifier_name' => 'id',
      'collection_name' => 'event_addresses',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'DELETE',
        3 => 'PUT',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
      ),
      'page_size' => '1000',
      'page_size_param' => NULL,
      'entity_class' => 'Event\\Entity\\EventAddresses',
      'collection_class' => 'api\\V1\\Rest\\EventAddresses\\EventAddressesCollection',
      'service_name' => 'EventAddresses',
    ),
    'api\\V1\\Rest\\Event\\Controller' => 
    array (
      'listener' => 'api\\V1\\Rest\\Event\\EventResource',
      'route_name' => 'api.rest.doctrine.event',
      'route_identifier_name' => 'event_id',
      'entity_identifier_name' => 'id',
      'collection_name' => 'event',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
      ),
      'page_size' => 25,
      'page_size_param' => NULL,
      'entity_class' => 'Event\\Entity\\Event',
      'collection_class' => 'api\\V1\\Rest\\Event\\EventCollection',
      'service_name' => 'Event',
    ),
    'api\\V1\\Rest\\CategoryImage\\Controller' => 
    array (
      'listener' => 'api\\V1\\Rest\\CategoryImage\\CategoryImageResource',
      'route_name' => 'api.rest.doctrine.category-image',
      'route_identifier_name' => 'category_image_id',
      'entity_identifier_name' => 'id',
      'collection_name' => 'category_image',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
      ),
      'page_size' => 25,
      'page_size_param' => NULL,
      'entity_class' => 'Register\\Entity\\CategoryImage',
      'collection_class' => 'api\\V1\\Rest\\CategoryImage\\CategoryImageCollection',
      'service_name' => 'CategoryImage',
    ),
    'api\\V1\\Rest\\Image\\Controller' => 
    array (
      'listener' => 'api\\V1\\Rest\\Image\\ImageResource',
      'route_name' => 'api.rest.doctrine.image',
      'route_identifier_name' => 'image_id',
      'entity_identifier_name' => 'id',
      'collection_name' => 'image',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
      ),
      'page_size' => 25,
      'page_size_param' => NULL,
      'entity_class' => 'Register\\Entity\\Image',
      'collection_class' => 'api\\V1\\Rest\\Image\\ImageCollection',
      'service_name' => 'Image',
    ),
  ),
  'zf-rpc' => 
  array (
  ),
  'zf-versioning' => 
  array (
    'content-type' => 
    array (
    ),
    'default_version' => 1,
    'uri' => 
    array (
      0 => 'api.rest.doctrine.city',
      1 => 'api.rest.doctrine.event-address',
      2 => 'api.rest.doctrine.state',
      3 => 'api.rest.doctrine.event-addresses',
      4 => 'api.rest.doctrine.event',
      5 => 'api.rest.doctrine.category-image',
      6 => 'api.rest.doctrine.image',
    ),
  ),
  'base' => 
  array (
    'list_view' => 
    array (
      'actions' => 
      array (
        'enable' => true,
        'defaults' => 
        array (
          'edit' => 
          array (
            'action' => 'edit',
            'enable' => true,
            'label' => 'Editar',
            'class' => 'btn btn-success',
            'icon' => 'glyphicon glyphicon-edit',
          ),
          'delete' => 
          array (
            'action' => 'delete',
            'enable' => true,
            'label' => 'Remover',
            'class' => 'btn btn-danger',
            'icon' => 'glyphicon glyphicon-trash',
          ),
          'view' => 
          array (
            'action' => 'view',
            'enable' => true,
            'label' => 'Visualizar',
            'class' => 'btn btn-primary',
            'icon' => 'glyphicon glyphicon-eye-open',
          ),
        ),
      ),
    ),
  ),
  'asset_bundle' => 
  array (
    'assets' => 
    array (
      'less' => 
      array (
        0 => '@zfRootPath/vendor/twitter/bootstrap/less/bootstrap.less',
      ),
    ),
  ),
  'doctrine-hydrator' => 
  array (
    'api\\V1\\Rest\\City\\CityHydrator' => 
    array (
      'entity_class' => 'Register\\Entity\\City',
      'object_manager' => 'doctrine.entitymanager.orm_default',
      'by_value' => true,
      'strategies' => 
      array (
      ),
      'use_generated_hydrator' => true,
    ),
    'api\\V1\\Rest\\EventAddress\\EventAddressHydrator' => 
    array (
      'entity_class' => 'Event\\Entity\\EventAddress',
      'object_manager' => 'doctrine.entitymanager.orm_default',
      'by_value' => true,
      'strategies' => 
      array (
      ),
      'use_generated_hydrator' => true,
    ),
    'api\\V1\\Rest\\State\\StateHydrator' => 
    array (
      'entity_class' => 'Register\\Entity\\State',
      'object_manager' => 'doctrine.entitymanager.orm_default',
      'by_value' => true,
      'strategies' => 
      array (
      ),
      'use_generated_hydrator' => true,
    ),
    'api\\V1\\Rest\\EventAddresses\\EventAddressesHydrator' => 
    array (
      'entity_class' => 'Event\\Entity\\EventAddresses',
      'object_manager' => 'doctrine.entitymanager.orm_default',
      'by_value' => true,
      'strategies' => 
      array (
      ),
      'use_generated_hydrator' => true,
    ),
    'api\\V1\\Rest\\Event\\EventHydrator' => 
    array (
      'entity_class' => 'Event\\Entity\\Event',
      'object_manager' => 'doctrine.entitymanager.orm_default',
      'by_value' => true,
      'strategies' => 
      array (
      ),
      'use_generated_hydrator' => true,
    ),
    'api\\V1\\Rest\\CategoryImage\\CategoryImageHydrator' => 
    array (
      'entity_class' => 'Register\\Entity\\CategoryImage',
      'object_manager' => 'doctrine.entitymanager.orm_default',
      'by_value' => true,
      'strategies' => 
      array (
      ),
      'use_generated_hydrator' => true,
    ),
    'api\\V1\\Rest\\Image\\ImageHydrator' => 
    array (
      'entity_class' => 'Register\\Entity\\Image',
      'object_manager' => 'doctrine.entitymanager.orm_default',
      'by_value' => true,
      'strategies' => 
      array (
      ),
      'use_generated_hydrator' => true,
    ),
  ),
  'mail' => 
  array (
    'name' => 'smtp.gmail.com',
    'host' => 'smtp.gmail.com',
    'connection_class' => 'login',
    'connection_config' => 
    array (
      'username' => 'jonas@otix.com.br',
      'password' => '160592jonas',
      'ssl' => 'tls',
      'port' => 465,
      'from' => 'jonasmweb@hotmail.com',
      'charset' => 'UTF8',
      'driverOptions' => 
      array (
        'charset' => 'UTF8',
      ),
    ),
  ),
  'db' => 
  array (
    'adapters' => 
    array (
      'dummy' => 
      array (
      ),
    ),
  ),
  'zf-doctrine-querybuilder-options' => 
  array (
    'filter_key' => 'filter',
    'order_by_key' => 'order-by',
  ),
  'zf-doctrine-querybuilder-orderby-orm' => 
  array (
    'aliases' => 
    array (
      'field' => 'ZF\\Doctrine\\QueryBuilder\\OrderBy\\ORM\\Field',
    ),
    'factories' => 
    array (
      'ZF\\Doctrine\\QueryBuilder\\OrderBy\\ORM\\Field' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
  'zf-doctrine-querybuilder-orderby-odm' => 
  array (
    'aliases' => 
    array (
      'field' => 'ZF\\Doctrine\\QueryBuilder\\OrderBy\\ODM\\Field',
    ),
    'factories' => 
    array (
      'ZF\\Doctrine\\QueryBuilder\\OrderBy\\ODM\\Field' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
  'zf-doctrine-querybuilder-filter-orm' => 
  array (
    'aliases' => 
    array (
      'eq' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\Equals',
      'neq' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\NotEquals',
      'lt' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\LessThan',
      'lte' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\LessThanOrEquals',
      'gt' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\GreaterThan',
      'gte' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\GreaterThanOrEquals',
      'isnull' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\IsNull',
      'isnotnull' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\IsNotNull',
      'in' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\In',
      'notin' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\NotIn',
      'between' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\Between',
      'like' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\Like',
      'notlike' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\NotLike',
      'ismemberof' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\IsMemberOf',
      'orx' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\OrX',
      'andx' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\AndX',
    ),
    'factories' => 
    array (
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\Equals' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\NotEquals' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\LessThan' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\LessThanOrEquals' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\GreaterThan' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\GreaterThanOrEquals' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\IsNull' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\IsNotNull' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\In' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\NotIn' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\Between' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\Like' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\NotLike' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\IsMemberOf' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\OrX' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\AndX' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\InnerJoin' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ORM\\LeftJoin' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
  'zf-doctrine-querybuilder-filter-odm' => 
  array (
    'aliases' => 
    array (
      'eq' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\Equals',
      'neq' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\NotEquals',
      'lt' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\LessThan',
      'lte' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\LessThanOrEquals',
      'gt' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\GreaterThan',
      'gte' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\GreaterThanOrEquals',
      'isnull' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\IsNull',
      'isnotnull' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\IsNotNull',
      'in' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\In',
      'notin' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\NotIn',
      'between' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\Between',
      'like' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\Like',
      'regex' => 'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\Regex',
    ),
    'factories' => 
    array (
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\Equals' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\NotEquals' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\LessThan' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\LessThanOrEquals' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\GreaterThan' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\GreaterThanOrEquals' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\IsNull' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\IsNotNull' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\In' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\NotIn' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\Between' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\Like' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'ZF\\Doctrine\\QueryBuilder\\Filter\\ODM\\Regex' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
);