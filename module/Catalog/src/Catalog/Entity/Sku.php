<?php

namespace Catalog\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\Collection;

/**
 * Person
 *
 * @ORM\Table(name="sku")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Sku
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="friendly_url", type="string", length=255, nullable=true)
     */
    private $friendly_url;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="float", nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="width", type="float", nullable=true)
     */
    private $width;

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="float", nullable=true)
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="float", nullable=true)
     */
    private $length;

    /**
     * @ORM\Column(name="description", type="text", length=65000, nullable=true)
     */
    protected $description;

    /**
     * @var \Catalog\Entity\Product
     *
     * @ORM\ManyToOne(targetEntity="Catalog\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $product;

    public function __construct(array $options = array())
    {
        (new Hydrator\ClassMethods)->hydrate($options, $this);

        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

    }

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
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getFriendlyUrl()
    {
        return $this->friendly_url;
    }

    /**
     * @param string $friendly_url
     */
    public function setFriendlyUrl($friendly_url)
    {
        $this->friendly_url = $friendly_url;
    }

//    /**
//     * @return string
//     */
//    public function getPrice()
//    {
//        return $this->price;
//    }
//
//    public function getPriceStr()
//    {
//        if($this->price != null){
//            return 'R$ ' . number_format($this->price, 2, ',', '.');
//        }else{
//            return 'R$ ' . number_format(0, 2, ',', '.');
//        }
//    }
//
//    /**
//     * @param string $price
//     */
//    public function setPrice($price)
//    {
//        $this->price = $price;
//    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    public function getWeightStr()
    {
        $vl = $this->weight;
        if($vl != null){
            return number_format($vl, 2, ',', '.');
        }else{
            return number_format(0, 2, ',', '.');
        }
    }

    /**
     * @param string $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    public function getWidthStr()
    {
        $vl = $this->width;
        if($vl != null){
            return number_format($vl, 2, ',', '.');
        }else{
            return number_format(0, 2, ',', '.');
        }
    }

    /**
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    public function getHeightStr()
    {
        $vl = $this->height;
        if($vl != null){
            return number_format($vl, 2, ',', '.');
        }else{
            return number_format(0, 2, ',', '.');
        }
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    public function getLengthStr()
    {
        $vl = $this->length;
        if($vl != null){
            return number_format($vl, 2, ',', '.');
        }else{
            return number_format(0, 2, ',', '.');
        }
    }

    /**
     * @param string $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}