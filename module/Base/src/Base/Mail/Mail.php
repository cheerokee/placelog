<?php
namespace Base\Mail;

use Base\Mail\PHPMailer;

use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Message;

use Zend\View\Model\ViewModel;

use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;

class Mail 
{

    protected $transport;
    protected $view;
    protected $body;
    protected $message;
    protected $subject;
    protected $to;
    protected $data;
    protected $page;
    
    public function __construct(SmtpTransport $transport, $view, $page) 
    {
        $this->transport = $transport;
        $this->view = $view;
        $this->page = $page;
        
    }
    
    /**
     * @return the $data
     */
    public function getData()
    {
        return $this->data;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }
    
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }
    
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    
    public function renderView($page, array $data){
        $model = new ViewModel;
        $model->setTemplate("mailer/{$page}.phtml");
        $model->setOption('has_parent',true);
        $model->setVariables($data);
        
        return $this->view->render($model);
    }
    
    public function prepare(){        
        $html = new MimePart($this->renderView($this->page, $this->data));
        $html->type = "text/html";

        $body = new MimeMessage();
        $body->setParts(array($html));
        $this->body = $body;

        //Vizualizar o HTML
//        if(!empty($body->getParts())){
//            foreach($body->getParts()as $part)
//            {
//                echo $part->getContent();
//            }
//        }
//        die;

        $config = $this->transport->getOptions()->toArray();
        $to = ($this->to)?$this->to:$config['connection_config']['from'];
        $this->setTo($to);
        $this->message = new Message;
        $this->message->addFrom($config['connection_config']['from'],"Mais Escola de Neg&oacute;cios")      
                ->addTo($this->to)
                ->setSubject($this->subject)
                ->setBody($this->body);

        return $this;
    }
    
    /**
     * @return the $body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param \Zend\Mime\Message $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    public function send($entity,$service,$subject = null){
        //$this->transport->send($this->message);
        
        date_default_timezone_set('America/Sao_Paulo');
        $ip = getenv("REMOTE_ADDR");
        
        $bodyMail = $this->getBody()->getPartContent(0);
        
        $configuracoes = $service->getConfigurationMail()['mail'];
        
        $Email = new PHPMailer();
        $Email->SetLanguage("br");
        $Email->IsMail();
        $Email->IsHTML(true);
        
        $Email->From = $entity->getEmail();
        $Email->FromName = utf8_decode($entity->getName());
        //$Email->AddAddress($configuracoes['connection_config']['from']);

        if($subject!=null){
            $Email->Subject = $subject;
        }else{
            $Email->Subject = "E-mail sem assunto";
        }

        $Email->AddBcc($entity->getEmail());
        
        $Email->MsgHTML(utf8_decode($bodyMail));
        $Email->AltBody = "Para conseguir essa e-mail corretamente, use um visualizador de e-mail com suporte a HTML";
        $Email->WordWrap = 50;
        
        $Email->IsSMTP();
        $Email->SMTPAuth = true;
        $Email->SMTPSecure = "ssl";
        $Email->Host = $configuracoes['host'];
        $Email->Port = $configuracoes['connection_config']['port'];
        
        $Email->Username = $configuracoes['connection_config']['username']; // Gmail login
        $Email->Password = $configuracoes['connection_config']['password']; // Gmail senha
        
        if(!$Email->Send()) {
            return false;
        } else {
            return true;
        }
    }
    
    public function selfSend(array $data,$service,$subject = null){
        //$this->transport->send($this->message);
        /**
         * @var PHPMailer $Email
         */
        date_default_timezone_set('America/Sao_Paulo');
        $ip = getenv("REMOTE_ADDR");
    
        $bodyMail = $this->getBody()->getPartContent(0);
    
        $configuracoes = $service->getConfigurationMail()['mail'];
        $emailAdm =$service->getConfigurationMail()['mail']['connection_config']['from'];       
    
        $Email = new PHPMailer();
        $Email->IsMail();
        $Email->IsHTML(true);
        $Email->IsSMTP();          
        $Email->SMTPAuth = true;
        
        $Email->SMTPSecure = "ssl";
        $Email->Host = $configuracoes['host'];
        $Email->Port = $configuracoes['connection_config']['port'];       
        $Email->Username = $configuracoes['connection_config']['username']; // Gmail login
        $Email->Password = $configuracoes['connection_config']['password']; // Gmail senha
        
        if($subject == null || $subject == ''){
            $Email->Subject = "E-mail sem assunto";
        }else $Email->Subject = $subject;
        
        $Email->SetLanguage("br");
                
        #E-mail de quem está enviando
        $Email->From = $data['email'];
        $Email->ReplyTo = $data['email'];
              
        #Nome de quem está enviando
        $Email->FromName = utf8_decode($data['nome']);
        
        #Pra onde o e-mail vai
        $Email->AddAddress($emailAdm);
        #Cópia
        #$Email->AddBcc($data['email']);
        
        #Corpo do E-mail
        $Email->MsgHTML(utf8_decode($bodyMail));
        $Email->AltBody = "Para conseguir essa e-mail corretamente, use um visualizador de e-mail com suporte a HTML";
        $Email->WordWrap = 50;
        
        if(!$Email->Send()) {
             
            return false;
        } else {
    
            return true;
        }
    }

    public function enviar($data,$service,$subject = null){
        //$this->transport->send($this->message);

        date_default_timezone_set('America/Sao_Paulo');
        $ip = getenv("REMOTE_ADDR");

        $bodyMail = $this->getBody()->getPartContent(0);

        $configuracoes = $service->getConfigurationMail()['mail'];

        $Email = new PHPMailer();
        $Email->SetLanguage("br");
        $Email->IsMail();
        $Email->IsHTML(true);

        $Email->From = $data['email'];
        if(isset($data['nome'])){
            $Email->FromName = utf8_decode($data['nome']);
        }else{
            $Email->FromName = $data['email'];
        }

        if($subject!=null){
            $Email->Subject = $subject;
        }else{
            $Email->Subject = "E-mail sem assunto";
        }

        if(is_array($data['email']) && !empty($data['email'])){
            $emails = $data['email'];
            foreach ($emails as $email){
                $Email->AddBcc($email);
            }
        }else {
            $Email->AddBcc($data['email']);
        }
        
        $Email->MsgHTML(utf8_decode($bodyMail));
        $Email->AltBody = "Para conseguir essa e-mail corretamente, use um visualizador de e-mail com suporte a HTML";
        $Email->WordWrap = 50;

        $Email->IsSMTP();
        $Email->SMTPAuth = true;
        $Email->SMTPSecure = "ssl";
        $Email->Host = $configuracoes['host'];
        $Email->Port = $configuracoes['connection_config']['port'];

        $Email->Username = $configuracoes['connection_config']['username']; // Gmail login
        $Email->Password = $configuracoes['connection_config']['password']; // Gmail senha

        if(!$Email->Send()) {
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * @return the $message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param \Zend\Mail\Message $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
   
    
}