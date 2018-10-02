<?php

namespace Register\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Register\Entity\ImageRepository")
 */
class Image
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", length=65535, nullable=true)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=225, nullable=true)
     */
    public $image;

    /**
     * @var string
     *
     * @ORM\Column(name="reference_id", type="string", length=225, nullable=true)
     */
    public $reference_id;

    /**
     * @var \Register\Entity\ReferenceImage
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\ReferenceImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reference_image", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     * })
     */
    private $referenceImage;

    /**
     * @var \Register\Entity\CategoryImage
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\CategoryImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_image", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     * })
     */
    private $categoryImage;

    /**
     * @var \Register\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     * })
     */
    private $person;

    /**
     * @ORM\Column(name="featured",type="boolean",nullable=true)
     */
    protected $featured;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return ReferenceImage
     */
    public function getReferenceImage()
    {
        return $this->referenceImage;
    }

    /**
     * @param ReferenceImage $referenceImage
     */
    public function setReferenceImage($referenceImage)
    {
        $this->referenceImage = $referenceImage;
    }

    /**
     * @return CategoryImage
     */
    public function getCategoryImage()
    {
        return $this->categoryImage;
    }

    /**
     * @param CategoryImage $categoryImage
     */
    public function setCategoryImage($categoryImage)
    {
        $this->categoryImage = $categoryImage;
    }

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return mixed
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * @param mixed $featured
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;
    }

    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->reference_id;
    }

    /**
     * @param string $reference_id
     */
    public function setReferenceId($reference_id)
    {
        $this->reference_id = $reference_id;
    }

}

