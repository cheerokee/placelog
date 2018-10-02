<?php

namespace Register\Service;

use Acl\Entity\Role;
use Base\Service\AbstractService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Register\Entity\PersonRole;
use Zend\Stdlib\Hydrator;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Base\Mail\Mail;

class Person extends AbstractService
{

    protected $transport;
    protected $view;
    protected $configurationMail;
    
    public function __construct(EntityManager $em, SmtpTransport $transport, $view) 
    {
        parent::__construct($em);
        
        $this->entity = 'Register\Entity\Person';
        $this->transport = $transport;
        $this->view = $view;
    }
    
    /**
     * @return the $configurationMail
     */
    public function getConfigurationMail()
    {
        return $this->configurationMail;
    }
    
    /**
     * @param field_type $configurationMail
     */
    public function setConfigurationMail($configurationMail)
    {
        $this->configurationMail = $configurationMail;
    }
    
    public function insert(array $data) {
        $entity = parent::insert($data);

        if(isset($data['role']))
        {
            $db_role = $this->em->getRepository('Acl\Entity\Role')->findOneById($data['role']);

            /**
             * @var PersonRole $db_person_profile
             */
            $db_person_role = $this->em->getRepository( 'Register\Entity\PersonRole')->findOneBy(array(
                'role'   => $db_role,
                'person'    => $entity
            ));

            if(!$db_person_role){
                $db_person_role = new PersonRole();

                $db_person_role->setPerson($entity);
                $db_person_role->setRole($db_role);

                $this->em->persist($db_person_role);
                $this->em->flush();
            }
        }

        $this->insertFile($entity,'image','public/img/person/');
        $dataEmail = array('name'=>$data['name'],'activationKey'=>$entity->getActivationKey());

        if($entity)
        {
            $personRole = $this->em->getRepository('Register\Entity\PersonRole')->findOneByPerson($entity);
            if(!$personRole){
                /**
                 * @var PersonRole $personRole
                 * @var Role $role
                 */

                $role = $this->em->getRepository('Acl\Entity\Role')->findOneByName('Cliente');
                if(!$role){
                    $role = new Role();
                    $role->setName('Cliente');
                    $this->em->persist($role);
                    $this->em->flush();
                }

                $personRole = new PersonRole();
                $personRole->setPerson($entity);
                $personRole->setRole($role);

                $this->em->persist($personRole);
                $this->em->flush();
            }

            if(empty($data['adminForm'])){
                $dataEmail = array(
                    'name'      =>  $data['name'],
                    'email'     =>  $data['email'],
                    'id'        =>  $entity->getId(),
                    'activeKey' =>  $entity->getActivationKey()
                );
                            
                $subject = 'Cadastro efetuado no sistema';
                $return = $this->sendMail($entity,$dataEmail,$subject,'add-person');
            }
            
            if(isset($return) || $data['adminForm']){
                return $entity;
            }else{
                return false;
            }            
        }
    }
    
    public function activate($key)
    {
        $repo = $this->em->getRepository('Register\Entity\Person');
        
        $person = $repo->findOneByActivationKey($key);
        
        if($person && !$person->getActive())
        {
            $person->setActive(true);
            
            $this->em->persist($person);
            $this->em->flush();
            
            return $person;
        }
    }
    
    public function update(array $data)
    {
        $entity = $this->em->getReference($this->entity, $data['id']);

        if(empty($data['password']))
            unset($data['password']);

        (new Hydrator\ClassMethods())->hydrate($data, $entity);
        if($entity->getActive() != null && $entity->getActive() != '') {
            $entity->setActive(1);
        }
        
        $this->em->persist($entity);
        $this->em->flush();

        $this->insertFile($entity,'image','public/img/person/');
        return $entity;
    }
        
    public function lostPassword(array $data){
    
        $person = $this->em->getRepository('Register\Entity\Person')->findOneByEmail($data['email']);
        if(empty($person))
            return false;
            $novaSenha = $this->geraSenha();
            $person->setPassword($novaSenha);
    
            $this->em->persist($person);
            $this->em->flush();

            $dataEmail = array(
                'email' => $person->getEmail(),
                'name' => $person->getName(),
                'senha' => $novaSenha,
        );
    
        if($person){
            /**
             *@var Mail $mailInformations
             */
            $subject = 'Recuperacao de senha';
            $return = $this->sendMail($person,$dataEmail,$subject,'mail-lostPassword');

            if($return){
                return $person;
            }else{
                return false;
            }
        }    
    }
    
    public function contact(array $data){
        $confMail = $this->getConfigurationMail()['mail'];
         
        $dataEmail = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message'],
        );
    
        /**
         *@var Mail $mailInformations
         */
        $mail = new Mail($this->transport, $this->view,'contact');
    
        $subject = 'Envio de contato atraves do site';
       
        $return = $this->sendMailSelf($dataEmail,$subject,'contact');
        return $return;    
    }
    
    public function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
    {
        // Caracteres de cada tipo
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        // Variáveis internas
        $retorno = '';
        $caracteres = '';
        // Agrupamos todos os caracteres que poderão ser utilizados
        $caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;
        // Calculamos o total de caracteres possíveis
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            // Criamos um número aleatório de 1 até $len para pegar um dos caracteres
            $rand = mt_rand(1, $len);
            // Concatenamos um dos caracteres na variável $retorno
            $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
    }
    
    public function getPerson($id){
        return $this->em->getRepository('Register\Entity\Person')->findOneById($id);
    }
    
    /**
     *
     * @return EntityManager
     */
    public function getEm(){
        if(null === $this->em){
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    
            return $this->em;
        }
    }

    public function sendMail($entity, array $dataEmail,$subject, $template){        
        $mail = new Mail($this->transport, $this->view,$template);
        $mail   ->setTo($dataEmail['email'])
        ->setData($dataEmail)
        ->prepare();
        $result = $mail->send($entity,$this,$subject);
    
        return $result;
    }
    
    public function sendMailSelf(array $dataEmail,$subject, $template){
        $mail = new Mail($this->transport, $this->view,$template);
        $mail   ->setTo($dataEmail['email'])
        ->setData($dataEmail)
        ->prepare();
    
        $result = $mail->selfSend($dataEmail,$this,$subject);
    
        return $result;
    }

}
