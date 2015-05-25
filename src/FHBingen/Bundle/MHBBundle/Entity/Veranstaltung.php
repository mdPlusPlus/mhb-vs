<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:26
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Class Veranstaltung
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @UniqueEntity(fields="Name",    message="Es existiert bereits eine Veranstaltung mit diesem deutschen Namen.")
 * @UniqueEntity(fields="NameEN",  message="Es existiert bereits eine Veranstaltung mit diesem englischen Namen.")
 * @ORM\Table(name="Veranstaltung")
 * @ORM\HasLifecycleCallbacks
 */
class Veranstaltung extends VeranstaltungSuperClass
{
    /**
     * @return string
     */
    public function __toString()
    {
        $string = $this->getName();

        return $string;
    }

    //Wenn bei PDF-Erstellung auf '(' und ')' im Titel geprüft wird um auf Fachgebiet zu testen, dürfen '(' und ')' hier nicht im Titel auftauchen
    /**
     * @ORM\Column(type="string", length=70, nullable=false, unique=true)
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Der deutsche Modul-Titel muss aus mindestens {{ limit }} Zeichen bestehen.",
     *      max = 70,
     *      maxMessage = "Der deutsche Modul-Titel darf maximal aus {{ limit }} Zeichen bestehen.",
     * )
     * @Assert\NotBlank(
     *      message = "Der deutsche Modultitel muss gesetzt werden."
     * )
     * @Assert\Regex(
     *     pattern = "/[A-ZÄÖÜa-zäöüß0-9 \-]{5,70}/",
     *     message = "Der deutsche Name darf nur aus Buchstaben, Zahlen, Leerzeichen und Bindestrichen bestehen."
     * )
     */
    protected $Name;

    //Wenn bei PDF-Erstellung auf '(' und ')' im Titel geprüft wird um auf Fachgebiet zu testen, dürfen '(' und ')' hier nicht im Titel auftauchen
    /**
     * @ORM\Column(type="string", length=70, nullable=true, unique=true)
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Der englische Modul-Titel muss aus mindestens {{ limit }} Zeichen bestehen.",
     *      max = 70,
     *      maxMessage = "Der englische Modul-Titel darf maximal aus {{ limit }} Zeichen bestehen.",
     * )
     * @Assert\Regex(
     *     pattern = "/[A-ZÄÖÜa-zäöüß0-9 \-]{5,70}/",
     *     message = "Der englische Name darf nur aus Buchstaben, Zahlen, Leerzeichen und Bindestrichen bestehen."
     * )
     */
    protected $NameEN;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\ID
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $Modul_ID;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     * @Assert\Choice(
     *      choices = { "in Planung", "Freigegeben", "expired" },
     *      message = "Bitte geben Sie einen korrekten Status an!"
     * )
     */
    protected $Status;

    /**
     * @ORM\OneToMany(targetEntity="Angebot", mappedBy="veranstaltung", cascade={"all"})
     */
    protected $angebot;

    /**
     * @ORM\OneToMany(targetEntity="Lehrende", mappedBy="veranstaltung", cascade={"all"})
     */
    protected $lehrende;

    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="modulbeauftragter")
     * @ORM\JoinColumn(name="modulbeauftragter", referencedColumnName="Dozenten_ID", nullable=false)
     */
    protected $beauftragter;

    /**
     * @ORM\OneToMany(targetEntity="Kernfach", mappedBy="veranstaltung", cascade={"all"})
     */
    protected $kernfach;

    /**
     * @ORM\OneToMany(targetEntity="Modulvoraussetzung", mappedBy="modul", cascade={"all"})
     */
    private $grundmodul;

    /**
     * @ORM\OneToMany(targetEntity="Modulvoraussetzung", mappedBy="voraussetzung", cascade={"all"})
     */
    private $forderung;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->angebot          = new ArrayCollection();
        $this->forderung        = new ArrayCollection();
        $this->grundmodul       = new ArrayCollection();    //TODO: richtig?
        $this->kernfach         = new ArrayCollection();
        $this->lehrende         = new ArrayCollection();
    }

    /**
     * Get Modul_ID
     *
     * @return integer
     */
    public function getModulID()
    {
        return $this->Modul_ID;
    }

    /**
     * Set Name
     *
     * @param string $name
     *
     * @return Veranstaltung
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
     * Set NameEN
     *
     * @param string $nameEN
     *
     * @return Veranstaltung
     */
    public function setNameEN($nameEN)
    {
        $this->NameEN = $nameEN;

        return $this;
    }

    /**
     * Get NameEN
     *
     * @return string
     */
    public function getNameEN()
    {
        return $this->NameEN;
    }

    /**
     * Set Status
     *
     * @param string $status
     *
     * @return Veranstaltung
     */
    public function setStatus($status)
    {
        $this->Status = $status;

        return $this;
    }

    /**
     * Get Status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Add angebot
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot
     *
     * @return Veranstaltung
     */
    public function addAngebot(\FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot)
    {
        $this->angebot[] = $angebot;

        return $this;
    }

    /**
     * Remove angebot
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot
     */
    public function removeAngebot(\FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot)
    {
        $this->angebot->removeElement($angebot);
    }

    /**
     * Get angebot
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAngebot()
    {
        return $this->angebot;
    }

    /**
     * Add lehrende
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Lehrende $lehrende
     *
     * @return Veranstaltung
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
     * Set beauftragter
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $beauftragter
     *
     * @return Veranstaltung
     */
    public function setBeauftragter(\FHBingen\Bundle\MHBBundle\Entity\Dozent $beauftragter)
    {
        $this->beauftragter = $beauftragter;

        return $this;
    }

    /**
     * Get beauftragter
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Dozent 
     */
    public function getBeauftragter()
    {
        return $this->beauftragter;
    }



    /**
     * Add kernfach
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Kernfach $kernfach
     *
     * @return Veranstaltung
     */
    public function addKernfach(\FHBingen\Bundle\MHBBundle\Entity\Kernfach $kernfach)
    {
        $this->kernfach[] = $kernfach;

        return $this;
    }

    /**
     * Remove kernfach
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Kernfach $kernfach
     */
    public function removeKernfach(\FHBingen\Bundle\MHBBundle\Entity\Kernfach $kernfach)
    {
        $this->kernfach->removeElement($kernfach);
    }

    /**
     * Get kernfach
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getKernfach()
    {
        return $this->kernfach;
    }

    /**
     * Set VoraussetzungInhalte
     *
     * @param string $voraussetzungInhalte
     *
     * @return Veranstaltung
     */
    public function setVoraussetzungInhalte($voraussetzungInhalte)
    {
        $this->VoraussetzungInhalte = $voraussetzungInhalte;

        return $this;
    }

    /**
     * Get VoraussetzungInhalte
     *
     * @return string 
     */
    public function getVoraussetzungInhalte()
    {
        return $this->VoraussetzungInhalte;
    }

    /**
     * Add forderung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung $forderung
     *
     * @return Veranstaltung
     */
    public function addForderung(\FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung $forderung)
    {
        $this->forderung[] = $forderung;

        return $this;
    }

    /**
     * Remove forderung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung $forderung
     */
    public function removeForderung(\FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung $forderung)
    {
        $this->forderung->removeElement($forderung);
    }

    /**
     * Get forderung
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getForderung()
    {
        return $this->forderung;
    }

    /**
     * Add grundmodul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung $grundmodul
     *
     * @return Veranstaltung
     */
    public function addGrundmodul(\FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung $grundmodul)
    {
        $this->grundmodul[] = $grundmodul;

        return $this;
    }

    /**
     * Remove grundmodul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung $grundmodul
     */
    public function removeGrundmodul(\FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung $grundmodul)
    {
        $this->grundmodul->removeElement($grundmodul);
    }

    /**
     * Get grundmodul
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrundmodul()
    {
        return $this->grundmodul;
    }

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Versionsnummer;

    /**
     * Set Versionsnummer
     *
     * @param integer $versionsnummer
     *
     * @return Veranstaltung
     */
    public function setVersionsnummer($versionsnummer)
    {
        $this->Versionsnummer = $versionsnummer;

        return $this;
    }

    /**
     * Get Versionsnummer
     *
     * @return integer
     */
    public function getVersionsnummer()
    {
        return $this->Versionsnummer;
    }
}
