<?php
namespace Register\Service;

use Base\Mail\Mail;
use Base\Service\AbstractService;

use Register\Entity\CategoryImage;
use Register\Entity\ReferenceImage;
use Zend\Mail\Transport\Smtp as SmtpTransport;

class Image extends AbstractService{
    protected $em;
    protected $transport;
    protected $view;
    protected $configurationMail;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Register\Entity\Image';
        $this->setEm($em);
    }

    public function insert(array $data)
    {
        $em = $this->getEm();
        
        if(isset($data['person'])){
            $person = $em->getRepository('Register\Entity\Person')->findOneById($data['person']);
            if($person)
            {
                $data['person'] = $person;
            }else{
                $data['person'] = null;
            }
        }

        if(isset($data['reference']) && $data['reference'] != '')
        {
            $reference = $em->getRepository('Register\Entity\ReferenceImage')->findOneByName($data['reference']);
            if(!$reference){
                $reference = new ReferenceImage();
                $reference->setChave($data['reference']);
                $reference->setName($data['reference']);

                $em->persist($reference);
                $em->flush();
            }

            $data['referenceImage'] = $reference;
        }else{
            $data['referenceImage'] = null;
        }

        if(isset($data['category']) && $data['category'] != -1)
        {
            $category = $em->getRepository('Register\Entity\CategoryImage')->findOneById($data['category']);

            $data['categoryImage'] = $category;
        }else{
            $data['categoryImage'] = null;
        }

        if($data['featured']){
            $obj_images = $em->getRepository('Register\Entity\Image')->findAll();
            if(!empty($obj_images))
            {
                foreach($obj_images as $obj_image){
                    $obj_image->setFeatured(0);
                    $em->persist($obj_image);
                    $em->flush();
                }
            }
        }

        $image = parent::insert($data);
        
        /**
         * @var \Register\Entity\Image[] $obj_images
         */
        $obj_images = $em->getRepository('Register\Entity\Image')->findAll();
        $images = array();
        if(!empty($obj_images))
        {
            foreach($obj_images as $obj_image){
                $images[] = $obj_image->getImage();
            }
        }

        $types = array( 'png', 'jpg', 'jpeg', 'gif', 'tmp' );
        $path = 'public/img/images/';
        $dir = new \DirectoryIterator($path);
        foreach ($dir as $fileInfo) {
            $ext = strtolower( $fileInfo->getExtension() );
            if(in_array( $ext, $types ))
            {
                if(!in_array($fileInfo->getFilename(),$images)){
                    unlink($path.$fileInfo->getFilename());
                }

            }
        }

        if($person) {
            $images = $em->getRepository('Register\Entity\Image')->findByPerson($person);
            if(!empty($images))
            {
                foreach ($images as $image) {
                    if(!file_exists('public/img/images/'.$image->getImage())){
                        $em->remove($image);
                        $em->flush();
                    }
                }
            }
        }

        $categories = $em->getRepository('Register\Entity\CategoryImage')->findByPerson($person);
        if(!empty($categories)){
            foreach($categories as $category){
                $images = $em->getRepository('Register\Entity\Image')->findByCategoryImage($category->getId());
                if(empty($images))
                {
                    $em->remove($category);
                    $em->flush();
                }
            }
        }

        return $image;
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

}


























?>