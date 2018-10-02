<?php
namespace Acl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="history_access")
 * @ORM\ENtity(repositoryClass="Acl\Entity\HistoryAccessRepository")
 */

class HistoryAccess
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Acl\Entity\Privilege")
     * @ORM\JoinColumn(name="privilege_id",referencedColumnName="id",onDelete="CASCADE")
     */
    protected $privilege;

    /**
     * @ORM\Column(type="datetime",name="created_at")
     */
    protected $createdAt;

    public function __construct($options = array())
    {
        $this->createdAt = new \DateTime("now");
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
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     * @param mixed $privilege
     */
    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;
    }

    public function __toString()
    {
        return $this->getCreatedAt().format('d/m/Y H:i:s').' - '.$this->getPrivilege();
    }
}