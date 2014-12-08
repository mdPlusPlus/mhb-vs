<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\Encoder\EncoderAwareInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @ORM\Entity(repositoryClass="FHBingen\Bundle\MHBBundle\Entity\UserRepository")
 * @ORM\Table(name="Users")
 */
class User implements AdvancedUserInterface, \Serializable, EncoderAwareInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true, nullable=false)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true, nullable=false)
     * @Assert\Email(
     *     message = "Die Email '{{ value }}' ist keine gueltige Email.",
     * )
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
     *
     */
    private $roles;

    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));

        $this->roles = new ArrayCollection();
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        //return array('ROLE_USER');
        //return $this->roles->toArray();

        $rolesArr = $this->roles->toArray();
        $rolesArr[] = new UserDependentRole($this);
        return $rolesArr;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add roles
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Role $roles
     * @return User
     */
    public function addRole(\FHBingen\Bundle\MHBBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;
    
        return $this;
    }

    /**
     * Remove roles
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Role $roles
     */
    public function removeRole(\FHBingen\Bundle\MHBBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }

    public function getEncoderName()
    {
        //always return encoder 'blubb' defined in security.yml
        return 'blubb';
    }

    //TODO von http://symfony.com/doc/2.5/cookbook/security/entity_provider.html übernommen
    public function isAccountNonExpired()
    {
        return true;
    }

    //TODO von http://symfony.com/doc/2.5/cookbook/security/entity_provider.html übernommen
    public function isAccountNonLocked()
    {
        return true;
    }

    //TODO von http://symfony.com/doc/2.5/cookbook/security/entity_provider.html übernommen
    public function isCredentialsNonExpired()
    {
        return true;
    }

    //TODO von http://symfony.com/doc/2.5/cookbook/security/entity_provider.html übernommen
    public function isEnabled()
    {
        return $this->isActive;
    }
}
