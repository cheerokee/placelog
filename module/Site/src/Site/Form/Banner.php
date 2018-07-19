<?php
namespace Site\Form;
use Base\Form\FormBase;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;

class Banner extends FormBase{
    public function __construct(EntityManager  $objectManager) {
        parent::__construct('banner', $objectManager);
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new BannerFilter());

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $title = new \Zend\Form\Element\Text("title");
        $title->setLabel($this->translate("Título: "))
            ->setAttribute('type','text')
            ->setAttribute('class','form-control');
        $this->add($title);

        $subtitle = new \Zend\Form\Element\Text("subtitle");
        $subtitle->setLabel($this->translate("Subtítulo: "))
            ->setAttribute('type','text')
            ->setAttribute('class','form-control');
        $this->add($subtitle);

        $text = new \Zend\Form\Element\Textarea("text");
        $text->setLabel($this->translate("Texto: "))
            ->setAttribute('class','form-control');
        $this->add($text);

        $active = new \Zend\Form\Element\Select("active");
        $active->setLabel($this->translate("Ativo: "))
            ->setValueOptions(array(
                '0' => $this->translate('inativo'),
                '1' => $this->translate('ativo')
            ))
            ->setAttribute('value','1')
            ->setAttribute('class','form-control');
        $this->add($active);

        $color = new \Zend\Form\Element\Color('color');
        $color->setLabel($this->translate("Cor da Fonte"))
            ->setAttribute('class','form-control');
        $this->add($color);

        $link = new \Zend\Form\Element\Text("link");
        $link->setLabel($this->translate("Link: "))
            ->setAttribute('type','text')
            ->setAttribute('placeholder','Ex. http://www.algumacoisa.com.br...')
            ->setAttribute('class','form-control');
        $this->add($link);

        $title_button = new \Zend\Form\Element\Text("title_button");
        $title_button->setLabel($this->translate("Título Botão: "))
            ->setAttribute('type','text')
            ->setAttribute('placeholder','Ex. Acessar, ir, Clique Aqui...')
            ->setAttribute('class','form-control');
        $this->add($title_button);

        $image = new \Zend\Form\Element\File("image");
        $image->setLabel($this->translate("Imagem: "))
            ->setAttribute('class','form-control cropImage')
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
