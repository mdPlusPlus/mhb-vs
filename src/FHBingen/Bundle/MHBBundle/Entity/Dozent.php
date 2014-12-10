<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 12:59
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\EncoderAwareInterface;
use Symfony\Component\Security\Core\Role\RoleInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Dozent
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity(repositoryClass="FHBingen\Bundle\MHBBundle\Entity\UserRepository")
 * @ORM\Table(name="Dozent")
 * @UniqueEntity(fields="Email", message="Unter dieser EMail ist bereits ein Dozent eingetragen.")
 * @ORM\HasLifecycleCallbacks
 */

class Dozent implements UserInterface, AdvancedUserInterface, \Serializable, EncoderAwareInterface
{
    /*
	public function __toString()
	{
		return $this->getEmail();
	}
    */

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Dozenten_ID;

    /**
     * @ORM\Column(type="string", length=4, nullable=false)
     * @Assert\Choice(
     * choices = { "Herr", "Frau" },
     * message = "Bitte geben Sie eine korrekte Anrede an!"
     * )
     */
    protected $Anrede;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $Titel;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\Length(
     * min= 3,
     * minMessage="Ein Dozenten-Vorname muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     */
    protected $Name;

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     * @Assert\Length(
     * min= 3,
     * minMessage="Ein Dozenten-Nachname muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     */
    protected $Nachname;

//@Assert\Email(
//message = "Die Email '{{ value }}' ist keine gueltige Email."
//)

    /**
     *
     * @ORM\Column(type="string", length=60, unique=true, nullable=false)
     */
    private $Email;


    /**
     * Get Dozenten_ID
     *
     * @return integer 
     */
    public function getDozentenID()
    {
        return $this->Dozenten_ID;
    }

    public function getId()
    {
        /**
         * nur für Kompabilität mit UserRepository
         */
        return $this->getDozentenID();
    }

    /**
     * Set Anrede
     *
     * @param string $anrede
     * @return Dozent
     */
    public function setAnrede($anrede)
    {
        $this->Anrede = $anrede;
    
        return $this;
    }

    /**
     * Get Anrede
     *
     * @return string 
     */
    public function getAnrede()
    {
        return $this->Anrede;
    }

    /**
     * Set Titel
     *
     * @param string $titel
     * @return Dozent
     */
    public function setTitel($titel)
    {
        $this->Titel = $titel;
    
        return $this;
    }

    /**
     * Get Titel
     *
     * @return string 
     */
    public function getTitel()
    {
        return $this->Titel;
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return Dozent
     */
    public function setName($name)
    {
        $this->Name = $name;
    
        return $this;
    }

    /**
     * Get Name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set Nachname
     *
     * @param string $nachname
     * @return Dozent
     */
    public function setNachname($nachname)
    {
        $this->Nachname = $nachname;
    
        return $this;
    }

    /**
     * Get Nachname
     *
     * @return string 
     */
    public function getNachname()
    {
        return $this->Nachname;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->isActive = true;
        //$this->roles = new ArrayCollection();
        $this->lehrende = new ArrayCollection();
        $this->semesterplan = new ArrayCollection();
    }

    /**
     * Set Email
     *
     * @param string $email
     * @return Dozent
     */
    public function setEmail($email)
    {
        $this->Email = $email;
    
        return $this;
    }

    /**
     * Get Email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Add lehrende
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Lehrende $lehrende
     * @return Dozent
     */
    public function addLehrende(\FHBingen\Bundle\MHBBundle\Entity\Lehrende $lehrende)
    {
        $this->lehrende[] = $lehrende;
    
        return $this;
    }

    /**
     * Remove lehrende
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Lehrende $lehrende
     */
    public function removeLehrende(\FHBingen\Bundle\MHBBundle\Entity\Lehrende $lehrende)
    {
        $this->lehrende->removeElement($lehrende);
    }

    /**
     * Get lehrende
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLehrende()
    {
        return $this->lehrende;
    }

    /**
     * Add semesterplan
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan
     * @return Dozent
     */
    public function addSemesterplan(\FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan)
    {
        $this->semesterplan[] = $semesterplan;
    
        return $this;
    }

    /**
     * Remove semesterplan
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan
     */
    public function removeSemesterplan(\FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan)
    {
        $this->semesterplan->removeElement($semesterplan);
    }

    /**
     * Get semesterplan
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSemesterplan()
    {
        return $this->semesterplan;
    }


    /*Abhaengigkeiten*/

    /*Lehrender*/

    /**
     * @ORM\OneToMany(targetEntity="Lehrende", mappedBy="lehrender", cascade={"all"})
     * */
    protected   $lehrende;


    /*Semesterplan*/

    /**
     * @ORM\OneToMany(targetEntity="Semesterplan", mappedBy="lehrender", cascade={"all"})
     * */
    protected $semesterplan;

    /*Modulbeauftragter (Dozent/Modul)*/

    /**
     * @ORM\OneToMany(targetEntity="Veranstaltung", mappedBy="beauftragter")
     */
    protected $modul;

    /*Studiengangleiter (Dozent/Studiengang)*/

    /**
     * @ORM\OneToMany(targetEntity="Studiengang", mappedBy="sgl")
     */
    protected $studiengang;

    /**
     * Add modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul
     * @return Dozent
     */
    public function addModul(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul)
    {
        $this->modul[] = $modul;
    
        return $this;
    }

    /**
     * Remove modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul
     */
    public function removeModul(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul)
    {
        $this->modul->removeElement($modul);
    }

    /**
     * Get modul
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModul()
    {
        return $this->modul;
    }

    /**
     * Add studiengang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang
     * @return Dozent
     */
    public function addStudiengang(\FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang)
    {
        $this->studiengang[] = $studiengang;
    
        return $this;
    }

    /**
     * Remove studiengang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang
     */
    public function removeStudiengang(\FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang)
    {
        $this->studiengang->removeElement($studiengang);
    }

    /**
     * Get studiengang
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudiengang()
    {
        return $this->studiengang;
    }


    ///////////////////////////////////

    ///////////////////////////////////

    /**
     * @ORM\Column(type="string", length=25, unique=true, nullable=false)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="users")
     */
    private $roles;

    public function setRole(RoleInterface $role){
        $this->roles = $role;

        return $this;
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
        $rolesArrCol = new ArrayCollection();
        $rolesArr = $rolesArrCol->toArray();
        $rolesArr[] = $this->roles;
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
            $this->Dozenten_ID,
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
            $this->Dozenten_ID,
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
     * @return Dozent
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
     * @return Dozent
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
     * @return Dozent
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

    public function getEncoderName()
    {
        //always return encoder 'pwenc' defined in security.yml
        return 'pwenc';
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
