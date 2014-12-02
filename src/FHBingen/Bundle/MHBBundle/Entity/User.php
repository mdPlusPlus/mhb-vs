<?php

namespace FHBingen\Bundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Bridge\Swiftmailer;

/**
 * Class User
 * @ORM\Entity
 * @UniqueEntity(fields="username", message="Username bereits vergeben.")
 * @UniqueEntity(fields="email", message="Email bereits vergeben.")

 * @ORM\Table(name="user")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\OneToOne(targetEntity="Projekt")
     * @ORM\JoinColumn(name="projekt_id", referencedColumnName="ID_projekt")
     */
    private $projekt;
    /**
     * @ORM\Column(type="string", length=25, unique=true)
     * @Assert\Length(
     *     min= "5",
     *     minMessage="Der Username muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salt;


    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\Length(
     *     min= "5",
     *     minMessage="Das Passwort muss mindestens {{ limit }} Zeichen haben."
     * )
     */
    private $password;

    /**
     * @Assert\NotBlank()
     * @Assert\Email(message="Bitte eine gültige Email eingeben")
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="is_admin",type="boolean")
     */
    protected $isAdmin;

    public function __construct()
    {
        $this->isActive = true;
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set projekt
     *
     * @param \FHBingen\Bundle\Entity\Projekt $projekt
     * @return User
     */
    public function setProjekt(\FHBingen\Bundle\Entity\Projekt $projekt = null)
    {
        $this->projekt = $projekt;

        return $this;
    }

    /**
     * Get projekt
     *
     * @return \FHBingen\Bundle\Entity\Projekt
     */
    public function getProjekt()
    {
        return $this->projekt;
    }

    /**
     * Returns the user roles
     *
     * @return array The roles
     */
    public function getRoles()
    {
        if ($this->isAdmin)
            return array('ROLE_ADMIN');
        else
            return array('ROLE_USER');
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Set isActive
     *
     * @param String $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     * @return User
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get isAdmin
     *
     * @return boolean
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function __toString()
    {
        return $this->username;
    }
}
