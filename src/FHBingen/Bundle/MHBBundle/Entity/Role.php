<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 07.12.2014
 * Time: 15:20
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Role
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 *
 * @ORM\Table(name="Roles")
 * @ORM\Entity()
 */
class Role implements RoleInterface
{

    /**
     * @return null|string
     */
    public function __toString()
    {
//TODO: Nach Abnahme de-kommentieren und testen!
//        if ($this->getRole() == 'ROLE_SGL') {
//            $string = 'Studiengangleiter';
//        } else {
//            if ($this->getRole() == 'ROLE_DOZENT') {
//                $string = 'Dozent';
//            } else {
//                $string = 'undefined';
//            }
//        }
//
//        return $string;
        return $this->getRole();
    }


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(name="role", type="string", length=20, unique=true)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity="Dozent", mappedBy="roles")
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @see RoleInterface
     */
    public function getRole()
    {
        return $this->role;
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
     * Set name
     *
     * @param string $name
     *
     * @return Role
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
     * Set role
     *
     * @param string $role
     *
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Add users
     *
     * @param UserInterface $users
     *
     * @return Role
     */
    public function addUser(UserInterface $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param UserInterface $users
     */
    public function removeUser(UserInterface $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
