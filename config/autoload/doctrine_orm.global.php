<?php
//PRIMEIRO VALOR DOCTRINE FAZENDO REFERENCIA AO DOCTRINE CONFIGURADO DENTRO DO MODULO EM MODULE.CONFIG.PHP
return array(
    'doctrine' => array(
        'connection' => array(
            //PODEMOS TER OUTROS TIPOS DE CONEX�O
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                //PARAMETROS B�SICOS
                'params' => array(
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => 'Jonas.160592',
                    'dbname'   => 'placeone',
                    'charset'  => 'utf8',
                )
            )
        )
    ),
);
//FOI CRIADO UMA PASTA DENTRO DE DATA QUE EST� NA RAIZ, COM O NOME DE DOCTRINEORMMODULE
//NESSE LUGAR � ONDE ARMAZENAMOS DADOS EM CACHE.
//FOI CRIADO UMA PASTA CHAMADA DE PROXY DENTRO DE DOCTRINEORMMODULE, COM PERMISS�O DE 777
