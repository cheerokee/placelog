<?php
return array(
    'mail' => array(
        'name' => 'smtp.gmail.com',
        'host' => 'smtp.gmail.com',
        'connection_class' => 'login',
        'connection_config' => array(
            'username' => 'jonas@otix.com.br',
            'password' => '160592jonas',
            'ssl' => 'tls',
            'port' => 465,
            'from' => 'jonasmweb@hotmail.com',
            'charset' => 'UTF8',
            'driverOptions' => array(
                'charset' => 'UTF8',
            ),
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
            => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
    'zf-content-negotiation' => array(
        'selectors' => array(),
    ),
    'db' => array(
        'adapters' => array(
            'dummy' => array(),
        ),
    ),
);