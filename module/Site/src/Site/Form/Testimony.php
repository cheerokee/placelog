<?php
namespace Site\Form;
use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class Testimony extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('testimony', $objectManager);
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

        $testimony = new \Zend\Form\Element\Textarea("testimony");
        $testimony->setLabel($this->translate("Depoimento: "))
            ->setAttribute('type','textarea')
            ->setAttribute('class','form-control');
        $this->add($testimony);

        $occupation = new \Zend\Form\Element\Text("occupation");
        $occupation->setLabel($this->translate("Ocupação: "))
            ->setAttribute('type','text')
            ->setAttribute('class','form-control');
        $this->add($occupation);

        $image = new \Zend\Form\Element\File("image");
        $image->setLabel($this->translate("Imagem: "))
            ->setAttribute('class','form-control')
            ->setAttribute('required','required');
        $this->add($image);

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
