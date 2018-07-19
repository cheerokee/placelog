<?php

namespace Register\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration
 *
 * @ORM\Table(name="configuration")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Register\Entity\ConfigurationRepository")
 */
class Configuration
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
     * @ORM\Column(name="title", type="string", length=225, nullable=true)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="chave", type="text", length=65535, nullable=true)
     */
    public $chave;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=true)
     */
    public $value;

    public function getArrayCopy()
    {
        return get_object_vars($this);
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
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
        
}

