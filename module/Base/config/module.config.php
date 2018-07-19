<?php
namespace Base;

return array(
    'base' => array(
        'list_view' => array(
            'actions' => array(
                'enable' =>true,
                'defaults' => array(
                    'edit' => array(
                        'action' => 'edit',
                        'enable' => true,
                        'label' => 'Editar',
                        'class' => 'btn btn-success',
                        'icon' => 'glyphicon glyphicon-edit',
                    ),
                    'delete' => array(
                        'action' => 'delete',
                        'enable' => true,
                        'label' => 'Remover',
                        'class' => 'btn btn-danger',
                        'icon' => 'glyphicon glyphicon-trash',
                    ),
                    'view' => array(
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
    'asset_bundle' => array(
        'assets' => array(
            'less' => array('@zfRootPath/vendor/twitter/bootstrap/less/bootstrap.less')
        )
    ),
     'view_helpers' => array(
         'invokables' => array(
             'mostraoptions' => 'Base\View\Helper\MostraOptions',
             'formpesquisa' => 'Base\View\Helper\FormPesquisa',
             'formRow' => 'Base\Form\View\Helper\TwbBundleFormRow',
             'formAngular' => 'Base\Form\View\Helper\AngularBundleFormElement',
             'formMultiCheckbox' => 'Base\Form\View\Helper\TwbBundleFormMultiCheckbox',
             'templatedFormCollection' => \Base\View\Helper\TemplatedFormCollection::class,
             'templatedCollection' => \Base\View\Helper\TemplatedCollection::class,
             'TdField' => \Base\View\Helper\TdField::class,
             'migratesUpdate' => \Base\View\Helper\MigratesUpdate::class,
             'rota' => 'Base\View\Helper\RotaHelper',
             'headListagem' => 'Base\View\Helper\Listagem\HeadListagem',
             'bodyListagem' => 'Base\View\Helper\Listagem\BodyListagem',
             'globalVars' => 'Base\View\Helper\GlobalVars',
             'formatCPF' => 'Base\View\Helper\FormatCPF',
             'formatCNPJ' => 'Base\View\Helper\FormatCNPJ',
             'formatCpfCnpj' => 'Base\View\Helper\FormatCpfCnpj',
             'formatCEP' => 'Base\View\Helper\FormatCEP',
             'getFile' => 'Base\View\Helper\GetFile',
             'getAdminFlashMessenger' => __NAMESPACE__ . '\View\Helper\GetAdminFlashMessenger',
             'getFriendlyUrl' => __NAMESPACE__ . '\View\Helper\GetFriendlyUrl',
         ),
     ),
    'router' => array(
        'routes' => array(            
            'base' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/base',
                    'defaults' => array(
                        '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id]][/page/:page][/order_by/:order_by][/:order]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                                'page' => '\d+',
                                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'order' => 'ASC|DESC',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                                'controller' => 'Index',
                                'action' => 'index'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controller_plugins' => [
        'factories' => [
            'translatePlugin' => 'Base\Controller\Plugin\Service\TranslateFactory',
        ],
        'aliases' =>[
            'translate' => 'translatePlugin'
        ]

    ],
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            //'submenu' => __DIR__ . '/../view/partials/submenu.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        ),
    ),
    'doctrine' => array(
    ),
);