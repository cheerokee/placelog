<?php
namespace Register\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Register\Entity\ProfileRepository")
 */
class Profile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=225, nullable=false)
     */
    public $name;

    /**
     * @var \Register\Entity\Profile
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Profile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profile_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     * })
     */
    private $profile;

    /**
     * @var string
     *
     * @ORM\Column(name="chave", type="string", length=225, nullable=false)
     */
    public $chave;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="text", length=65535, nullable=true)
     */
    public $information;
    
    /**
     * @return the $information
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * @param string $information
     */
    public function setInformation($information)
    {
        $this->information = $information;
    }

    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return the $person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }
  
    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function getChave()
    {
        return $this->chave;
    }

    /**
     * @param string $chave
     */
    public function setChave($chave)
    {
        $this->chave = $chave;
    }

    /**
     * @return Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param Profile $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }
}

