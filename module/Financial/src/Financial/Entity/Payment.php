<?php

namespace Financial\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\Collection;

/**
 * Person
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Payment
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
     * @var \DateTime
     *
     * @ORM\Column(name="maturity", type="datetime", nullable=false)
     */
    private $maturity;

    /**
     * @var \Financial\Entity\PaymentMethod
     *
     * @ORM\ManyToOne(targetEntity="Financial\Entity\PaymentMethod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="payment_method_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $payment_method;

    /**
     * @var \Transaction\Entity\Order
     *
     * @ORM\ManyToOne(targetEntity="Transaction\Entity\Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $order;

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
     * @return \DateTime
     */
    public function getMaturity()
    {
        return $this->maturity;
    }

    /**
     * @param \DateTime $maturity
     */
    public function setMaturity($maturity)
    {
        $this->maturity = $maturity;
    }

    /**
     * @return PaymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * @param PaymentMethod $payment_method
     */
    public function setPaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;
    }

    /**
     * @return \Transaction\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param \Transaction\Entity\Order $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
}