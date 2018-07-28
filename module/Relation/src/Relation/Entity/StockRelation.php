<?php

namespace Relation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\Collection;

/**
 *
 * @ORM\Table(name="stock_relation")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class StockRelation
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
     * @ORM\Column(name="id_external", type="string", length=255, nullable=false)
     */
    private $id_external;

    /**
     * @var \App\Entity\App
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\App")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="app_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $app;

    /**
     * @var \Catalog\Entity\Stock
     *
     * @ORM\ManyToOne(targetEntity="Catalog\Entity\Stock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stock_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $stock;

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
    public function getIdExternal()
    {
        return $this->id_external;
    }

    /**
     * @param string $id_external
     */
    public function setIdExternal($id_external)
    {
        $this->id_external = $id_external;
    }

    /**
     * @return \App\Entity\App
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param \App\Entity\App $app
     */
    public function setApp($app)
    {
        $this->app = $app;
    }

    /**
     * @return \Catalog\Entity\Stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param \Catalog\Entity\Stock $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
}