<?php
namespace Register\Service;

use Base\Mail\Mail;
use Base\Service\AbstractService;

use Zend\Mail\Transport\Smtp as SmtpTransport;

class Configuration extends AbstractService{

    protected $transport;
    protected $view;
    protected $configurationMail;

    public function __construct(\Doctrine\ORM\EntityManager $em,SmtpTransport $transport, $view) {
        parent::__construct($em);
        $this->entity = 'Register\Entity\Configuration';
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

    public function sendMail(array $dataEmail,$subject, $template){
        $email = $this->getConfigurationMail()['mail']['connection_config']['from'];
        $mail = new Mail($this->transport, $this->view,$template);
        $mail   ->setTo($email)
                ->setData($dataEmail)
                ->prepare();
        $result = $mail->enviar($dataEmail,$this,$subject);

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


























?>