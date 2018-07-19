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
            'minha_informacao' => array(
                'titulo'    =>  'Meu Cadastro',
                'active'    => false,
                'icon' => 'fa fa-user text-yellow',
                'rota'  => '/admin/person/edit/'.$this->getAuthService()->getIdentity()->getId(),
                'itens'     =>  array()
            ),
            'lista_exercicio' => array(
                'titulo'    =>  'Lista de Exercícios',
                'active'    => false,
                'icon' => 'fa fa-list text-blue',
                'rota'  => '/list-exercice',
                'itens'     =>  array()
            ),
            'cadastros' => array(
                'titulo'    =>  'Cadastros',
                'active'    => true,
                'icon' => 'fa fa-dashboard',
                'itens'     =>  array(
                    'banner' => array(
                        'titulo' => 'Banners',
                        'rota' => '/admin/banner',
                        'icon' => 'fa fa-image',
                        'authorize' => false,
                    ),
                    'activities' => array(
                        'titulo' => 'Atividades',
                        'rota' => '/admin/activities',
                        'icon' => 'fa fa-file-text',
                        'authorize' => false,
                    ),
                    'exercices' => array(
                        'titulo' => 'Exercícios',
                        'rota' => '/admin/exercice',
                        'icon' => 'fa fa-file-text',
                        'authorize' => false,
                    ),
                    'teacher' => array(
                        'titulo' => 'Profissionais',
                        'rota' => '/admin/person-teacher',
                        'icon' => 'fa fa-user',
                        'authorize' => false,
                    ),
                    'gallery' => array(
                        'titulo' => 'Galeria',
                        'rota' => '/admin/gallery',
                        'icon' => 'fa fa-image',
                        'authorize' => false,
                    ),
                    'texto' => array(
                        'titulo' => 'Textos',
                        'rota' => '/admin/text',
                        'icon' => 'fa fa-file-text',
                        'authorize' => false,
                    ),
                    'testimony' => array(
                        'titulo' => 'Depoimentos',
                        'rota' => '/admin/testimony',
                        'icon' => 'fa fa-comment-o',
                        'authorize' => false,
                    )
                ),
            ),
            'autorizacao' => array(
                'titulo'    =>  'Autorizações',
                'icon' => 'fa fa-lock',
                'active'    => true,
                'itens'     =>  array(
                    'person' => array(
                        'titulo' => 'Usuários',
                        'rota' => '/admin/person',
                        'icon' => 'fa fa-user',
                        'authorize' => false,
                    ),
                    'perfil' => array(
                        'titulo' => 'Perfis',
                        'rota' => '/admin/profile',
                        'icon' => 'fa fa-share-alt-square',
                        'authorize' => false,
                    ),
                )
            ),
            'configuracoes' => array(
                'titulo'    =>  'Configurações',
                'active'    => false,
                'icon' => 'fa fa-cog',
                'itens'     =>  array(
                    'configuration' => array(
                        'titulo' => 'Configuração Geral',
                        'rota' => '/admin/configuration',
                        'icon' => 'fa fa-cog',
                        'authorize' => false,
                    ),
                ),
            ),
            'site' => array(
                'titulo'    =>  'Site',
                'active'    => false,
                'icon' => 'fa fa-desktop text-aqua',
                'rota'  => '/home',
                'itens'     =>  array()
            ),
            'deslogar' => array(
                'titulo'    =>  'Deslogar',
                'active'    => false,
                'icon' => 'fa fa-sign-out text-red',
                'rota'  => '/auth/logout',
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
