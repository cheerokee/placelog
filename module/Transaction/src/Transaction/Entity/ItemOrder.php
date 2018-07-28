<?php

namespace Transaction\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\Collection;

/**
 * ItemOrder
 *
 * @ORM\Table(name="item_order")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ItemOrder
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
     * @var \Catalog\Entity\Product
     *
     * @ORM\ManyToOne(targetEntity="Catalog\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $product;

    /**
     * @var \Catalog\Entity\Sku
     *
     * @ORM\ManyToOne(targetEntity="Catalog\Entity\Sku")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sku_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $sku;

    /**
     * @var \Transaction\Entity\Order
     *
     * @ORM\ManyToOne(targetEntity="Transaction\Entity\Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $order;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="string", length=255, nullable=false)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="descount", type="string", length=255, nullable=false)
     */
    private $descount;

    /**
     * @var string
     *
     * @ORM\Column(name="freight", type="string", length=255, nullable=false)
     */
    private $freight;

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
     * @return \Catalog\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param \Catalog\Entity\Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return \Catalog\Entity\Sku
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param \Catalog\Entity\Sku $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDescount()
    {
        return $this->descount;
    }

    /**
     * @param string $descount
     */
    public function setDescount($descount)
    {
        $this->descount = $descount;
    }

    /**
     * @return string
     */
    public function getFreight()
    {
        return $this->freight;
    }

    /**
     * @param string $freight
     */
    public function setFreight($freight)
    {
        $this->freight = $freight;
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
}