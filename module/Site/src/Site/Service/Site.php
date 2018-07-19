<?php

namespace Site\Service;
use \Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Base\Mail\Mail;

class Site extends AbstractService
{
    public $em;
    protected $transport;
    protected $view;
    protected $configurationMail;


    public function __construct(EntityManager $em, SmtpTransport $tranport, $view){

        $this->transport = $tranport;
        $this->view = $view;
    }

    public function contact(array $data){

        $dataEmail = array(
            'nome' => $data['fname'].' '.$data['lname'],
            'assunto' => $data['assunto'],
            'email' => $data['email'],
            'telefone' => $data['phone'],
            'mensagem' => $data['message']
        );

        /**
         *@var Mail $mailInformations
         */
        $mail = new Mail($this->transport, $this->view,'contact');

        $subject = 'Envio de contato atraves do site';

        $return = $this->sendMailSelf($dataEmail,$subject,'contact');

        return $return;

    }

    public function sendMailSelf(array $dataEmail,$subject, $template){
        $mail = new Mail($this->transport, $this->view,$template);

        $mail->setData($dataEmail)->prepare();
        $result = $mail->selfSend($dataEmail,$this,$subject);

        return $result;
    }

    public function sendMail($entity,array $data, array $dataEmail,$subject, $template){
        $mail = new Mail($this->transport, $this->view,$template);
        $mail   ->setTo($data['email'])
            ->setData($dataEmail)
            ->prepare();
        $result = $mail->send($entity,$this,$subject);

        return $result;
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


    

}