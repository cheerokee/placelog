<?php
namespace Register\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonProfile
 *
 * @ORM\Table(name="person_profile", indexes={@ORM\Index(name="fk_profile", columns={"profile_id"}),@ORM\Index(name="fk_person", columns={"person_id"})})
 * @ORM\Entity
 */
class PersonProfile
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
     * @var \Register\Entity\Profile
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Profile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profile_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $profile;
    
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
     * @return the $profile
     */
    public function getProfile()
    {
        return $this->profile;
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
     * @param \Register\Entity\Profile $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }
}

