<?php
//development.config.php.dist
return [
// Development time modules
    'modules' => [
        'ZendDeveloperTools',
        'ZF\Apigility\Admin',
        'ZF\Apigility\Doctrine\Admin',
        'ZF\Apigility\Doctrine\Server',
    ],
// development time configuration globbing
    'module_listener_options' => [
        'config_glob_paths' => [realpath(__DIR__) . '/autoload/{,*.}{global,local}-development.php'],
        'config_cache_enabled' => false,
        'module_map_cache_enabled' => false,
    ],
];
