<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 12:59
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Dozent
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Dozent")
 * @UniqueEntity(fields="Titel", message="Unter dieser EMail ist bereits ein Dozent eingetragen.")
 * @ORM\HasLifecycleCallbacks
 */

class Dozent
{

	public function __toString()
	{
		//TODO richtig?
		$string = $this->getName();
		return $string;
	}
	
    /**
     * @ORM\Column(type="integer")
     * @ORM\ID
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
    protected	$Anrede;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected	$Titel;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\Length(
     * min= "3",
     * minMessage="Ein Dozenten-Vorname muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     */
    protected	$Name;

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     * @Assert\Length(
     * min= "3",
     * minMessage="Ein Dozenten-Nachname muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     */
    protected	$Nachname;

    /**
     * @Assert\Email(
     *     message = "Die Email '{{ value }}' ist keine gueltige Email."
     * )
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
        $this->lehrende = new \Doctrine\Common\Collections\ArrayCollection();
        $this->semesterplan = new \Doctrine\Common\Collections\ArrayCollection();
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
}
