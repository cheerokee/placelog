<?php

namespace Transaction\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\Collection;

/**
 * Person
 *
 * @ORM\Table(name="send")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Send
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
     * @var string
     *
     * @ORM\Column(name="tracking_code", type="string", length=255, nullable=true)
     */
    private $tracking_code;

    /**
     * @var \Transacation\Entity\ItemOrder
     *
     * @ORM\ManyToOne(targetEntity="Transaction\Entity\ItemOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="item_order", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $item_order;

    /**
     * @var \Register\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shipping", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $shipping;

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
     * @return string
     */
    public function getTrackingCode()
    {
        return $this->tracking_code;
    }

    /**
     * @param string $tracking_code
     */
    public function setTrackingCode($tracking_code)
    {
        $this->tracking_code = $tracking_code;
    }

    /**
     * @return \Transacation\Entity\ItemOrder
     */
    public function getItemOrder()
    {
        return $this->item_order;
    }

    /**
     * @param \Transacation\Entity\ItemOrder $item_order
     */
    public function setItemOrder($item_order)
    {
        $this->item_order = $item_order;
    }

    /**
     * @return \Register\Entity\Person
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param \Register\Entity\Person $shipping
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
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