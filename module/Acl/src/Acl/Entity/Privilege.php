<?php
namespace Acl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="privileges")
 * @ORM\ENtity(repositoryClass="Acl\Entity\PrivilegeRepository")
 */

class Privilege
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Acl\Entity\Role")
     * @ORM\JoinColumn(name="role_id",referencedColumnName="id")
     */
    protected $role;

    /**
     * @ORM\ManyToOne(targetEntity="Acl\Entity\Resource")
     * @ORM\JoinColumn(name="resource_id",referencedColumnName="id")
     */
    protected $resource;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $name;

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
        (new Hydrator\ClassMethods)->hydrate($options, $this);
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
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
        return $this;
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
        return $this;
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
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime('now');
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Antes de Persistir no banco
     * @ORM\PrePersist
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime('now');
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param mixed $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function __toArray()
    {
        return array(
            'id'        =>  $this->id,
            'name'      =>  $this->name,
            'role'      =>  $this->role->getId(),
            'resource'  =>  $this->resource->getId()
        );
    }
}