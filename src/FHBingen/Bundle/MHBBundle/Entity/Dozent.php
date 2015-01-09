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

use FHBingen\Bundle\MHBBundle\PHP\UserDependentRole;

/**
 * Class Dozent
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity(repositoryClass="FHBingen\Bundle\MHBBundle\PHP\UserRepository")
 * @ORM\Table(name="Dozent")
 * @UniqueEntity(fields="email", message="Unter dieser EMail ist bereits ein Dozent eingetragen.")
 * @ORM\HasLifecycleCallbacks
 */

class Dozent implements UserInterface, AdvancedUserInterface, \Serializable, EncoderAwareInterface
{
    public function __toString()
    {
        return (string) $this->getTitel().' '.$this->getNachname();
    }

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
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Der Titel darf nicht länger als {{ limit }} Zeichen sein."
     * )
     */
    protected $Titel;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\Length(
     *      max = 20,
     *      maxMessage = "Der Vorname darf nicht länger als {{ limit }} Zeichen sein."
     * )
     * @Assert\NotBlank(
     *      message="Der Vorname darf nicht leer sein."
     * )
     */
    protected $Name;

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     * @Assert\Length(
     *      max = 30,
     *      maxMessage = "Der Nachname darf nicht länger als {{ limit }} Zeichen sein."
     * )
     * @Assert\NotBlank(
     *      message="Der Nachname darf nicht leer sein."
     * )
     */
    protected $Nachname;

    /**
     * @ORM\Column(type="string", length=60, unique=true, nullable=false)
     * @Assert\NotBlank(
     *      message="Die eMail-Adresse darf nicht leer sein."
     * )
     * @Assert\Email(
     *      message = "Die Email '{{ value }}' ist keine gueltige Email."
     * )
     * @Assert\Length(
     *      max = 60,
     *      maxMessage = "Die eMail-Adresse darf nicht länger als {{ limit }} Zeichen sein."
     * )
     */
    private $email;


    /**
     * Get Dozenten_ID
     *
     * @return integer 
     */
    public function getDozentenID()
    {
        return $this->Dozenten_ID;
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
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get Email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
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
     * @ORM\OneToMany(targetEntity="Lehrende", mappedBy="dozent", cascade={"all"})
     * */
    protected   $lehrende;


    /*Semesterplan*/

    /**
     * @ORM\OneToMany(targetEntity="Semesterplan", mappedBy="dozent", cascade={"all"})
     * */
    protected $semesterplan;

    /*Modulbeauftragter (Dozent/Modul)*/

    /**
     * @ORM\OneToMany(targetEntity="Veranstaltung", mappedBy="beauftragter")
     */
    protected $modulbeauftragter;


    /*Studiengangleiter (Dozent/Studiengang)*/

    /**
     * @ORM\OneToMany(targetEntity="Studiengang", mappedBy="sgl")
     */
    protected $studiengang;

    /**
     * Add modul_admin
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul_admin
     * @return Dozent
     */
    public function addModulbeauftragter(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul_admin)
    {
        $this->modulbeauftragter[] = $modul_admin;
    
        return $this;
    }

    /**
     * Remove modul_admin
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul_admin
     */
    public function removeModulbeauftragter(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul_admin)
    {
        $this->modulbeauftragter->removeElement($modul_admin);
    }

    /**
     * Get modul_admin
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModulbeauftragter()
    {
        return $this->modulbeauftragter;
    }

    //TODO: Was zur Hölle ist das?
    /**
     * Add modul_erstellt
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulErstellt
     * @return Dozent
     */
    public function addModulErstellt(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulErstellt)
    {
        $this->modul_erstellt[] = $modulErstellt;

        return $this;
    }

    //TODO: Was zur Hölle ist das?
    /**
     * Remove modul_erstellt
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulErstellt
     */
    public function removeModulErstellt(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulErstellt)
    {
        $this->modul_erstellt->removeElement($modulErstellt);
    }

    //TODO: Was zur Hölle ist das?
    /**
     * Get modul_erstellt
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModulErstellt()
    {
        return $this->modul_erstellt;
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
     * @ORM\Column(type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="users")
     * @ORM\JoinColumn(name="roles_id", referencedColumnName="id", nullable=false)
     */
    private $roles;

    public function setRole(RoleInterface $role)
    {
        $this->roles = $role;

        return $this;
    }

    public function setRoles(RoleInterface $role)
    {

        return $this->setRole($role);
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        //return $this->username;
        return $this->email;
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
        $rolesArr = array();
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
            //$this->username,
            $this->email,
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
            //$this->username,
            $this->email,
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
        //$this->username = $username;
        $this->email = $username;

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
        //$this->password = $password;
        $this->password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

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

    //von http://symfony.com/doc/2.5/cookbook/security/entity_provider.html übernommen
    public function isAccountNonExpired()
    {
        return true;
    }

    //von http://symfony.com/doc/2.5/cookbook/security/entity_provider.html übernommen
    public function isAccountNonLocked()
    {
        return true;
    }

    //von http://symfony.com/doc/2.5/cookbook/security/entity_provider.html übernommen
    public function isCredentialsNonExpired()
    {
        return true;
    }

    //von http://symfony.com/doc/2.5/cookbook/security/entity_provider.html übernommen
    public function isEnabled()
    {
        return $this->isActive;
    }
}
