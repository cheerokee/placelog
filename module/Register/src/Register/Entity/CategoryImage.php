<?php

namespace Register\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReferenceImage
 *
 * @ORM\Table(name="category_image")
 * @ORM\Entity
 */
class CategoryImage
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
     * @ORM\Column(name="name", type="string", length=225, nullable=true)
     */
    public $name;

    /**
     * @var string
     *
     * @ORM\Column(name="chave", type="string", length=225, nullable=true)
     */
    public $chave;

    /**
     * @var \Register\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Register\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     * })
     */
    private $person;

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
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }
}

