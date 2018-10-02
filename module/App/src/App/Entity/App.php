<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\Collection;

/**
 *
 * @ORM\Table(name="app")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class App
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
     * @var \Register\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     * })
     */
    private $company;

    /**
     * @var \App\Entity\TypeApp
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeApp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_app_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $type_app;

    /**
     * @var \App\Entity\Integration
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Integration")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="integration", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $integration;

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

    /**
     * @return \App\Entity\TypeApp
     */
    public function getTypeApp()
    {
        return $this->type_app;
    }

    /**
     * @param \App\Entity\TypeApp $type_app
     */
    public function setTypeApp($type_app)
    {
        $this->type_app = $type_app;
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
     * @return Integration
     */
    public function getIntegration()
    {
        return $this->integration;
    }

    /**
     * @param Integration $integration
     */
    public function setIntegration($integration)
    {
        $this->integration = $integration;
    }
}