<?php
namespace DataFrete\Form;
use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class Config extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('config', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $this->add(array(
            'name' => 'company',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'Register\Entity\Person',
                'property' => 'name',
                'display_empty_item' => false,
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('id' => 'ASC'),
                    )
                ),
                'label' => $this->translate('Empresa'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'app',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'disable_inarray_validator' => true,
                'object_manager' => $objectManager,
                'target_class' => 'App\Entity\App',
                'property' => 'name',
                'display_empty_item' => false,
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('id' => 'ASC'),
                    )
                ),
                'label' => $this->translate('Aplicação'),
                'column-size' => 'sm-4',
                'label_attributes' => array('class' => 'col-sm-2 input-sm')
            ),
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required'
            )
        ));

        $field = new \Zend\Form\Element\Text("id_external");
        $field->setLabel($this->translate("Filial Cod.: "))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($field);

        $field = new \Zend\Form\Element\Text("login");
        $field->setLabel($this->translate("Usuário: "))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setValue('placelog_dev')
            ->setAttribute('class','form-control');
        $this->add($field);

        $field = new \Zend\Form\Element\Text("password");
        $field->setLabel($this->translate("Senha: "))
            ->setAttribute('type','text')
            ->setAttribute('required','required')
            ->setValue('p14c310g2018')
            ->setAttribute('class','form-control');
        $this->add($field);

        $field = new \Zend\Form\Element\Text("token");
        $field->setLabel($this->translate("Token: "))
            ->setValue('PLAC310G18')
            ->setAttribute('class','form-control');
        $this->add($field);

        $field = new \Zend\Form\Element\Text("end_point");
        $field->setLabel($this->translate("End Point: "))
            ->setAttribute('placeholder','http://www.datafrete.com.br/demonstracao/busca-frete-web-service?wsdl')
            ->setValue('http://www.datafrete.com.br/demonstracao/busca-frete-web-service?wsdl')
            ->setAttribute('class','form-control');
        $this->add($field);

        $typePerson = new \Zend\Form\Element\Select("active");
        $typePerson->setLabel($this->translate("Ativo: *"))
            ->setValueOptions(array(
                '0' => $this->translate("Não"),
                '1' => $this->translate("Sim")
            ))
            ->setAttribute('value','1')
            ->setAttribute('required','required')
            ->setValue('1')
            ->setAttribute('class','form-control');
        $this->add($typePerson);

        $field = new \Zend\Form\Element\Select("environment");
        $field->setLabel($this->translate("Ambiente: *"))
            ->setValueOptions(array(
                '0' => $this->translate("Homologação"),
                '1' => $this->translate("Produção")
            ))
            ->setValue('1')
            ->setAttribute('required','required')
            ->setAttribute('class','form-control');
        $this->add($field);

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
