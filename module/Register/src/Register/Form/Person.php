<?php

namespace Register\Form;

use Base\Form\FormBase;
//use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class Person  extends FormBase
{

    public function __construct(EntityManager  $objectManager) {
        parent::__construct('person', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setInputFilter(new PersonFilter());
        
        $this->setAttribute('method', 'post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $criteria = Criteria::create();
        $criteria->where($criteria->expr()->neq('name', 'superadmin'));
        $criteria->orderBy(array('id' => 'ASC'));

        $typePerson = new \Zend\Form\Element\Select("typePerson");
        $typePerson->setLabel($this->translate("Tipo de Pessoa: *"))
            ->setValueOptions(array(
                '0' => $this->translate("Física"),
                '1' => $this->translate("Jurídica")
            ))
            ->setAttribute('value','0')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($typePerson);

        $document = new \Zend\Form\Element\Text("document");
        $document->setLabel($this->translate("Documento: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('CPF para pessoa Física ou CNPJ para pessoa Jurídica'));
        $this->add($document);

        $name = new \Zend\Form\Element\Text("name");
        $name->setLabel($this->translate("Nome: *"))
                ->setAttribute('class','form-control')
                ->setAttribute('required','required')
                ->setAttribute('placeholder',$this->translate('Entre com o nome'));
        $this->add($name);

        $friendlyUrl = new \Zend\Form\Element\Hidden("friendlyUrl");
        $this->add($friendlyUrl);

        $email = new \Zend\Form\Element\Text("email");
        $email->setLabel($this->translate("Email: *"))
                ->setAttribute('class','form-control')
                ->setAttribute('required','required')
                ->setAttribute('placeholder',$this->translate('Entre com o Email'));
        $this->add($email);

        $phone = new \Zend\Form\Element\Text("phone");
        $phone->setLabel($this->translate("Telefone: *"))
            ->setAttribute('class','form-control telefone')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Entre com o telefone'));
        $this->add($phone);

        $whatsapp = new \Zend\Form\Element\Text("whatsapp");
        $whatsapp->setLabel("Whatsapp: ")
            ->setAttribute('class','form-control telefone')
            ->setAttribute('placeholder',$this->translate('Entre com o Whatsapp'));
        $this->add($whatsapp);

        $facebook = new \Zend\Form\Element\Text("facebook");
        $facebook->setLabel("Facebook: ")
            ->setAttribute('class','form-control')
            ->setAttribute('placeholder',$this->translate('Entre com o Facebook'));
        $this->add($facebook);

        $instagram = new \Zend\Form\Element\Text("instagram");
        $instagram->setLabel("Instagram: ")
            ->setAttribute('class','form-control')
            ->setAttribute('placeholder',$this->translate('Entre com o Instagram'));
        $this->add($instagram);

        $zipCode = new \Zend\Form\Element\Text("zip_code");
        $zipCode->setLabel($this->translate("CEP: *"))
            ->setAttribute('class','form-control cep')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Entre com o CEP'));
        $this->add($zipCode);

        $street = new \Zend\Form\Element\Text("street");
        $street->setLabel($this->translate("Endereço: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Entre com o Endereço'));
        $this->add($street);

        $number = new \Zend\Form\Element\Text("number");
        $number->setLabel($this->translate("Número: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Entre com o Número'));
        $this->add($number);

        $neighborhood = new \Zend\Form\Element\Text("neighborhood");
        $neighborhood->setLabel($this->translate("Bairro: "))
            ->setAttribute('class','form-control')
            ->setAttribute('placeholder',$this->translate('Entre com o Bairro'));
        $this->add($neighborhood);

        $complement = new \Zend\Form\Element\Text("complement");
        $complement->setLabel($this->translate("Complemento: "))
            ->setAttribute('class','form-control')
            ->setAttribute('placeholder',$this->translate('Entre com o Complemento'));
        $this->add($complement);

        $city = new \Zend\Form\Element\Text("city");
        $city->setLabel($this->translate("Cidade: *"))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required')
            ->setAttribute('placeholder',$this->translate('Entre com a Cidade'));
        $this->add($city);

        $image = new \Zend\Form\Element\File("image");
        $image->setLabel($this->translate('Foto: '))
            ->setAttribute('class','form-control')
            ->setAttribute('placeholder',$this->translate('Altere a foto do perfil'));
        $this->add($image);
       
        $password = new \Zend\Form\Element\Password("password");
        $password->setLabel($this->translate("Password: "))
                ->setAttribute('class','form-control password')
                ->setAttribute('required','required')
                ->setAttribute('id','password-cad')
                ->setAttribute('placeholder',$this->translate('Entre com a senha'));
        $this->add($password);
        
        $confirmation = new \Zend\Form\Element\Password("confirmation");
        $confirmation->setLabel($this->translate("Redigite: "))
                ->setAttribute('class','form-control')
                ->setAttribute('placeholder',$this->translate('Redigite a senha'));
        $this->add($confirmation);

        $active = new \Zend\Form\Element\Hidden('active');
        $active->setAttribute('value','1');
        $this->add($active);

        $specialty = new \Zend\Form\Element\Text("specialty");
        $specialty->setLabel($this->translate("Especialidade: "))
            ->setAttribute('class','form-control')
            ->setAttribute('placeholder',$this->translate('Entre com a especialidade'));
        $this->add($specialty);

        $about = new \Zend\Form\Element\Textarea("about");
        $about->setLabel($this->translate("Descrição Profissional: "))
            ->setAttribute('class','form-control')
            ->setAttribute('placeholder',$this->translate('Digite informações referente ao profissional'));
        $this->add($about);
        
        $this->add(array(
            'name' => 'submit',
            'type'=>'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => $this->translate('Salvar'),
                'class' => 'btn-success'
            )
        ));
    }
}
