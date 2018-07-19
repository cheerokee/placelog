<?php
namespace Register\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
* @ORM\Entity
* @ORM\HasLifecycleCallbacks
* @ORM\Table(name="state")
*/

class State
{

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var \Register\Entity\Country
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $country;

    /**
     * @ORM\Column(name="uf", type="string", length=10, nullable=false)
     */
    protected $uf;

    public function __construct($options = array())
    {
        (new Hydrator\ClassMethods)->hydrate($options, $this);
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Country $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function __toString()
    {
        return $this->getName();
    }

}
