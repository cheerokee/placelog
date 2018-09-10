<?php
namespace Register\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonProfile
 *
 * @ORM\Table(name="person_role", indexes={@ORM\Index(name="fk_role", columns={"role_id"}),@ORM\Index(name="fk_person", columns={"person_id"})})
 * @ORM\Entity
 */
class PersonRole
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
     * @var \Register\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Person",
     *      inversedBy="person_profiles", fetch="LAZY")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person_id", referencedColumnName="id",
     *      nullable=false,
     *      onDelete="CASCADE")
     * })
     */
    private $person;
    
    /**
     * @var \Acl\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="Acl\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $role;
    
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param \Register\Entity\Person $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return \Acl\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param \Acl\Entity\Role $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
}

