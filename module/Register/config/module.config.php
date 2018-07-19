<?php
namespace Register;

return array(
    'router' => array(
        'routes' => array(
            'images' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/image/images/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Image',
                        'action' => 'images'
                    )
                )
            ),
            'gallery' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/gallery',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Image',
                        'action' => 'gallery'
                    )
                )
            ),
            'person' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/person[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]',
                            'constraints' => array(
                                'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'page' => '\d+',
                                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'order' => 'ASC|DESC',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                                'controller' => 'Person',
                                'action' => 'index'
                            )
                        )
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[/:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            )
                        )
                    )
                )
            ),
            'person-teacher' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/person-teacher[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]',
                            'constraints' => array(
                                'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'page' => '\d+',
                                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'order' => 'ASC|DESC',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                                'controller' => 'Person',
                                'action' => 'teacher'
                            )
                        )
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[/:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            )
                        )
                    )
                )
            ),
            'person-profile' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'=>'/admin/person-profile[/:id]',
                    'constraints' => array(
                        'id' => '\d+'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Person',
                        'action' => 'profile'
                    )
                )
            ),
            'bank-account' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/bank-account',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'BankAccount',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Register\Controller',
                                'controller' => 'bank-account'
                            )
                        )
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Register\Controller',
                                'controller' => 'bank-account'
                            )
                        )
                    )
                )
            ),
            'bank-account-edit' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'=>'/admin/bank-account/edit[/:id]',
                    'constraints' => array(
                        'id' => '\d+'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'BankAccount',
                        'action' => 'edit'
                    )
                )
            ),
            'person-register' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/register',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Index',
                        'action' => 'register',
                    )
                )
            ),
            'person-activate' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/register/activate[/:key]',
                    'defaults' => array(
                        'controller' => 'Register\Controller\Index',
                        'action' => 'activate'
                    )
                )
            ),
            'person-auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Auth',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Register\Controller',
                                'controller' => 'auth'
                            )
                        )
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Register\Controller',
                                'controller' => 'auth'
                            )
                        )
                    )
                )
            ),
            'person-logout' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'=>'/auth/logout',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Auth',
                        'action' => 'logout'
                    )
                )
            ),
            'lostpassword' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth/lostpassword',
                    'defaults' => array(
                        '__NAMESPACE__'=>'Register\Controller',
                        'controller' => 'Auth',
                        'action' => 'lostpassword'
                    )
                )
            ),
            'mail-lostPassword' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/mailer/mail-lostPassword',
                    'defaults' => array(
                        'controller' => 'Register\Controller\AuthController',
                        'action' => 'lostpassword'
                    )
                )
            ),
            'permission' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/permission[/:id]',
                    'constraints' => array(
                        'id' => '\d+',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Profile',
                        'action' => 'permissao',
                    )
                )
            ),
            'profile' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/profile',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Profile',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'defaults' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Register\Controller',
                                'controller' => 'profile'
                            )
                        )
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Register\Controller',
                                'controller' => 'profile'
                            )
                        )
                    )
                )
            ),
            'configuration' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'defaults' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/configuration[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]',
                            'constraints' => array(
                                'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'page' => '\d+',
                                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'order' => 'ASC|DESC',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                                'controller' => 'Configuration',
                                'action' => 'index'
                            )
                        )
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[/:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            )
                        )
                    )
                )
            ),
            'image' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Register\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'defaults' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/image[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]',
                            'constraints' => array(
                                'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'page' => '\d+',
                                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'order' => 'ASC|DESC',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                                'controller' => 'Image',
                                'action' => 'index'
                            )
                        )
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[/:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            )
                        )
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Register\Controller\Index' => 'Register\Controller\IndexController',
            'Register\Controller\Person' => 'Register\Controller\PersonController',
            'Register\Controller\Auth' => 'Register\Controller\AuthController',
            'Register\Controller\BankAccount' => 'Register\Controller\BankAccountController',
            'Register\Controller\Profile' => 'Register\Controller\ProfileController',
            'Register\Controller\Configuration' => 'Register\Controller\ConfigurationController',
            'Register\Controller\Image' => 'Register\Controller\ImageController',
        )
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',

        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            //'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            'image-interface' => __DIR__ . '/../view/partials/image-interface.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    )
);