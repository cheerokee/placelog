<?php

namespace Transaction\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\Collection;

/**
 * Person
 *
 * @ORM\Table(name="order")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Order
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
     * @var \Register\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $person;

    /**
     * @var \Register\Entity\Address
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $address;

    /**
     * @var \Register\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $company;


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
     * @return \Register\Entity\Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param \Register\Entity\Person $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return \Register\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param \Register\Entity\Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \Register\Entity\Person
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \Register\Entity\Person $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }


}