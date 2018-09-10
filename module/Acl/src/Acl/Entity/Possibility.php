<?php
namespace Acl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="possibilities")
 */

class Possibility
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var \Acl\Entity\Action
     *
     * @ORM\ManyToOne(targetEntity="Acl\Entity\Action", fetch="LAZY")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="action_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $action;

    /**
     * @var \Acl\Entity\Resource
     *
     * @ORM\ManyToOne(targetEntity="Acl\Entity\Resource", fetch="LAZY")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="resource_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $resource;

    /**
     * @ORM\Column(type="datetime",name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime",name="updated_at")
     */
    protected $updatedAt;

    public function __construct($options = array())
    {
        //(new Hydrator\ClassMethods)->hydrate($options,this);
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
    }

    public function __toString()
    {
        return $this->resource.' >>> '.$this->action;
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
     * @return Action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param Action $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return Resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param Resource $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}