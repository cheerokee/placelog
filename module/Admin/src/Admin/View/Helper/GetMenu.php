<?php

namespace Admin\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Doctrine\ORM\EntityManager;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

class GetMenu extends AbstractHelper implements ServiceLocatorAwareInterface{
    protected $serviceLocator,$em;

    protected $authService;

    public function getAuthService() {

        return $this->authService;
    }


    /**
     * @return mixed
     */
    public function getEm()
    {
        return $this->em;
    }

    /**
     * @param mixed $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    public function __invoke() {
        $sessionStorage = new SessionStorage('Person');
        $this->authService = new AuthenticationService;
        $this->authService->setStorage($sessionStorage);
        return array(
            'cadastro' => array(
                'titulo'    =>  'Cadastros',
                'active'    => true,
                'icon' => 'pe-7s-news-paper',
                'itens'     =>  array(
                    'administrator' => array(
                        'titulo' => 'Administrador',
                        'rota' => '/admin/administrator',
                        'icon' => 'pe-7s-user',
                        'authorize' => false,
                    ),
                    'company' => array(
                        'titulo' => 'Empresas',
                        'rota' => '/admin/company',
                        'icon' => 'pe-7s-home',
                        'authorize' => false,
                    ),
                    'employee' => array(
                        'titulo' => 'Funcionários',
                        'rota' => '/admin/employee',
                        'icon' => 'pe-7s-id',
                        'authorize' => false,
                    ),
                    'customer' => array(
                        'titulo' => 'Clientes',
                        'rota' => '/admin/customer',
                        'icon' => 'pe-7s-users',
                        'authorize' => false,
                    )
                )
            ),
            'catalog' => array(
                'titulo'    =>  'Catálogo',
                'active'    => true,
                'icon' => 'pe-7s-albums',
                'itens'     =>  array(
                    'product' => array(
                        'titulo' => 'Produto',
                        'rota' => '/admin/product',
                        'icon' => 'pe-7s-box1',
                        'authorize' => false,
                    )
                )
            ),
            'integration' => array(
                'titulo'    =>  'Integrações',
                'active'    => true,
                'icon' => 'pe-7s-share',
                'itens'     =>  array(
                    'app' => array(
                        'titulo' => 'Aplicações',
                        'rota' => '/admin/app',
                        'icon' => 'pe-7s-keypad',
                        'authorize' => false,
                    ),
                    'type-app' => array(
                        'titulo' => 'Tipo de Aplicações',
                        'rota' => '/admin/type-app',
                        'icon' => 'pe-7s-airplay',
                        'authorize' => false,
                    ),
                    'integration' => array(
                        'titulo' => 'Integração',
                        'rota' => '/admin/integration',
                        'icon' => 'pe-7s-share',
                        'authorize' => false,
                    )
                ),
            ),
            'site-cadastro' => array(
                'titulo'    =>  'Site Cadastros',
                'active'    => true,
                'icon' => 'pe-7s-monitor',
                'itens'     =>  array(
                    'banner' => array(
                        'titulo' => 'Banners',
                        'rota' => '/admin/banner',
                        'icon' => 'pe-7s-photo',
                        'authorize' => false,
                    ),
                    'texto' => array(
                        'titulo' => 'Textos',
                        'rota' => '/admin/text',
                        'icon' => 'pe-7s-news-paper',
                        'authorize' => false,
                    ),
                    'testimony' => array(
                        'titulo' => 'Depoimentos',
                        'rota' => '/admin/testimony',
                        'icon' => 'pe-7s-comment',
                        'authorize' => false,
                    )
                ),
            ),
            'configuracoes' => array(
                'titulo'    =>  'Configurações',
                'active'    => false,
                'icon' => 'pe-7s-settings',
                'itens'     =>  array(
                    'configuration' => array(
                        'titulo' => 'Configuração Geral',
                        'rota' => '/admin/configuration',
                        'icon' => 'pe-7s-settings',
                        'authorize' => false,
                    ),
                    'perfil' => array(
                        'titulo' => 'Perfis',
                        'rota' => '/admin/profile',
                        'icon' => 'pe-7s-id',
                        'authorize' => false,
                    ),
                ),
            )
        );
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
