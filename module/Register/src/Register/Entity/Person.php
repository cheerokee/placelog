<?php

namespace Register\Entity;

use Acl\Entity\Role;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;
use Doctrine\Common\Collections\Collection;
/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Register\Entity\PersonRepository")
 */
class Person
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
     * @var boolean
     *
     * @ORM\Column(name="type_person", type="boolean", nullable=true)
     */
    private $type_person;

    /**
     * @var string
     *
     * @ORM\Column(name="document", type="string", length=255, nullable=true)
     */
    private $document;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;


    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="celphone", type="string", length=255, nullable=true)
     */
    private $celphone;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var boolean
     *
     * @ORM\Column(name="first_access", type="boolean", nullable=true)
     */
    private $firstAccess;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_key", type="string", length=255, nullable=false)
     */
    private $activationKey;

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
     * @var boolean
     *
     * @ORM\Column(name="is_admin", type="boolean", nullable=true)
     */
    private $isAdmin;

    /**
     * @var \Register\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     * })
     */
    private $company;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="Register\Entity\PersonRole",
     *      cascade={"persist", "remove","merge","refresh"},
     *      mappedBy="person", orphanRemoval=true)
     */
    private $person_roles;

    /**
     * @var string
     *
     * @ORM\Column(name="friendly_url", type="string", length=255, nullable=true)
     */
    private $friendlyUrl;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    public function __construct(array $options = array())
    {
        (new Hydrator\ClassMethods)->hydrate($options, $this);

        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");

        $this->activationKey = md5($this->email);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $this->encryptPassword($password);
        return $this;
    }

    public function encryptPassword($password)
    {
        return md5($password);
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    public function getActivationKey()
    {
        return $this->activationKey;
    }

    public function setActivationKey($activationKey)
    {
        $this->activationKey = $activationKey;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime("now");
    }

    public function toArray()
    {
        return (new Hydrator\ClassMethods())->extract($this);
    }

    /**
     * @return boolean
     */
    public function isIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param boolean $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    public function getAdmin()
    {
        return $this->isAdmin;
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
     * @return bool
     */
    public function isTypePerson()
    {
        return $this->type_person;
    }

    /**
     * @param bool $type_person
     */
    public function setTypePerson($type_person)
    {
        $this->type_person = $type_person;
    }


    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param string $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
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
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCelphone()
    {
        return $this->celphone;
    }

    /**
     * @param string $celphone
     */
    public function setCelphone($celphone)
    {
        $this->celphone = $celphone;
    }

    /**
     * @return bool
     */
    public function isFirstAccess()
    {
        return $this->firstAccess;
    }

    /**
     * @param bool $firstAccess
     */
    public function setFirstAccess($firstAccess)
    {
        $this->firstAccess = $firstAccess;
    }

    /**
     * @return Person
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Person $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return Collection
     */
    public function getPersonRoles()
    {
        return $this->person_roles;
    }

    /**
     * @param Collection $person_roles
     */
    public function setPersonRoles($person_roles)
    {
        $this->person_roles = $person_roles;
    }

    public function hasThisRole($role) {
        /**
         * @var PersonRole[] $personRoles
         * @var Role $db_role
         */
        $personRoles = $this->getPersonRoles()->getValues();

        if(!empty($personRoles))
        {
            foreach($personRoles as $personRole)
            {
                $db_role = $personRole->getRole();
                if($db_role->getChave() == $role)
                {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @return string
     */
    public function getFriendlyUrl()
    {
        return $this->friendlyUrl;
    }

    /**
     * @param string $friendly_url
     */
    public function setFriendlyUrl($friendlyUrl)
    {
        $this->friendlyUrl = $friendlyUrl;
    }

}