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
                'icon' => 'fa fa-lg fa-fw fa-list',
                'itens'     =>  array(
                    'administrator' => array(
                        'titulo' => 'Administradores',
                        'rota' => '/admin/administrator',
                        'authorize' => false,
                    ),
                    'company' => array(
                        'titulo' => 'Empresas',
                        'rota' => '/admin/company',
                        'authorize' => false,
                    ),
                    'employee' => array(
                        'titulo' => 'Funcionários',
                        'rota' => '/admin/employee',
                        'authorize' => false,
                    ),
                    'customer' => array(
                        'titulo' => 'Clientes',
                        'rota' => '/admin/customer',
                        'authorize' => false,
                    )
                )
            ),
            'logistica' => array(
                'titulo'    =>  'Logistica',
                'active'    => true,
                'icon' => 'fa fa-lg fa-fw fa-truck',
                'itens'     =>  array(
                    'data-fre' => array(
                        'titulo' => 'Painel Data Frete',
                        'rota' => '/admin/data-frete/panel',
                        'authorize' => false,
                    ),
                )
            ),
            'authorize' => array(
                'titulo'    =>  'Autorização',
                'active'    => false,
                'icon' => 'fa fa-lg fa-fw fa-lock',
                'itens'     =>  array(
                    'painel-authorize' => array(
                        'titulo' => 'Painel de Autorização',
                        'rota' => '/admin/panel-authorize',
                        'authorize' => false,
                    ),
                    'roles' => array(
                        'titulo' => 'Perfis',
                        'rota' => '/admin/roles',
                        'authorize' => false,
                    ),
                    'resources' => array(
                        'titulo' => 'Recursos',
                        'rota' => '/admin/resources',
                        'authorize' => false,
                    ),
                    'actions' => array(
                        'titulo' => 'Ações',
                        'rota' => '/admin/actions',
                        'authorize' => false,
                    )
                ),
            ),
            'site-cadastro' => array(
                'titulo'    =>  'Site Cadastros',
                'active'    => true,
                'icon' => 'fa fa-lg fa-fw fa-list',
                'itens'     =>  array(
                    'banner' => array(
                        'titulo' => 'Banner',
                        'rota' => '/admin/banner',
                        'authorize' => false,
                    ),
                    'texto' => array(
                        'titulo' => 'Texto',
                        'rota' => '/admin/text',
                        'authorize' => false,
                    ),
                    'about' => array(
                        'titulo' => 'Sobre a Empresa',
                        'rota' => '/admin/about',
                        'authorize' => false,
                    ),
                    'feature' => array(
                        'titulo' => 'Característica',
                        'rota' => '/admin/feature',
                        'authorize' => false,
                    ),
                    'showcase' => array(
                        'titulo' => 'Software',
                        'rota' => '/admin/showcase',
                        'authorize' => false,
                    ),
                    'subscribed' => array(
                        'titulo' => 'Inscrito',
                        'rota' => '/admin/subscribed',
                        'authorize' => false,
                    ),
                    'gallery' => array(
                        'titulo' => 'Captura de Tela',
                        'rota' => '/admin/gallery',
                        'authorize' => false,
                    ),
                    'video' => array(
                        'titulo' => 'Vídeo',
                        'rota' => '/admin/video',
                        'authorize' => false,
                    ),
                    'testimony' => array(
                        'titulo' => 'Depoimentos',
                        'rota' => '/admin/testimony',
                        'authorize' => false,
                    ),
                    'team' => array(
                        'titulo' => 'Nosso Time',
                        'rota' => '/admin/team',
                        'authorize' => false,
                    ),
                    'statistic' => array(
                        'titulo' => 'Estatística',
                        'rota' => '/admin/statistic',
                        'authorize' => false,
                    ),
                    'price' => array(
                        'titulo' => 'Preço',
                        'rota' => '/admin/price',
                        'authorize' => false,
                    ),
                    'faq' => array(
                        'titulo' => 'Pergunta Frequente',
                        'rota' => '/admin/faq',
                        'authorize' => false,
                    ),
                    'news' => array(
                        'titulo' => 'Últimas Notícias',
                        'rota' => '/admin/news',
                        'authorize' => false,
                    ),
                ),
            ),
            'crm' => array(
                'titulo'    =>  'CRM',
                'active'    => true,
                'icon' => 'fa fa-lg fa-fw fa-sitemap',
                'itens'     =>  array(
                    'pesquisa' => array(
                        'titulo' => 'Pesquisa',
                        'rota' => '/admin/pesquisa',
                        'authorize' => false,
                    ),
                ),
            ),
            'integration' => array(
                'titulo'    =>  'Integrações',
                'active'    => true,
                'icon' => 'fa fa-lg fa-fw fa-share',
                'itens'     =>  array(
                    'app' => array(
                        'titulo' => 'Aplicações',
                        'rota' => '/admin/app',
                        'authorize' => false,
                    ),
                    'type-app' => array(
                        'titulo' => 'Tipo de Aplicações',
                        'rota' => '/admin/type-app',
                        'authorize' => false,
                    ),
                    'integration' => array(
                        'titulo' => 'Integração',
                        'rota' => '/admin/integration',
                        'authorize' => false,
                    )
                ),
            ),
            'configuracoes' => array(
                'titulo'    =>  'Configurações',
                'active'    => false,
                'icon' => 'fa fa-lg fa-fw fa-cogs',
                'itens'     =>  array(
                    'configuration' => array(
                        'titulo' => 'Configuração Geral do Sistema',
                        'rota' => '/admin/configuration',
                        'authorize' => false,
                    ),
                    'layout' => array(
                        'titulo' => 'Configuração de Layout',
                        'rota' => '/admin/layout',
                        'authorize' => false,
                    ),
                ),
            ),
            'site' => array(
                'titulo'    =>  'Site',
                'active'    => false,
                'icon' => 'fa fa-lg fa-fw fa-desktop text-success',
                'rota'  => '/admin/person/edit/'.$this->getAuthService()->getIdentity()->getId(),
                'itens'     =>  array()
            ),
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
