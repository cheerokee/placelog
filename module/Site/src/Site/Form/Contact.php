<?php
namespace Site\Form;
use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class Contact extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('contact', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $name = new \Zend\Form\Element\Text("name");
        $name->setLabel($this->translate("Nome: *"))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($name);

        $phone = new \Zend\Form\Element\Text("phone");
        $phone->setLabel($this->translate("Telefone: *"))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($phone);

        $email = new \Zend\Form\Element\Email("email");
        $email->setLabel($this->translate("E-mail: *"))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($email);

        $message = new \Zend\Form\Element\Textarea("message");
        $message->setLabel($this->translate("Mensagem: "))
            ->setAttribute('type','text')
            ->setAttribute('class','form-control');
        $this->add($message);

        $answered = new \Zend\Form\Element\Select("answered");
        $answered->setLabel($this->translate("Respondido: "))
            ->setValueOptions(array(
                '0' => $this->translate('Não'),
                '1' => $this->translate('Sim')
            ))
            ->setAttribute('value','0')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($answered);

        $this->add(array(
            'name' => 'submit',
            'type'=>'Zend\Form\Element\Submit',
            'attributes' => array(
            'value'=> $this->translate('Salvar'),
            'class' => 'btn-success'
            )
        ));
    }
}
