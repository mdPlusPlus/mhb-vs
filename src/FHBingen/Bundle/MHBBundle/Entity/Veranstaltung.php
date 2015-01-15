<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:26
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Veranstaltung
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Veranstaltung")
 * @ORM\HasLifecycleCallbacks
 */
class Veranstaltung
{
    /*
     * TODO:
     * - Dauer (Unterscheidung Semster/Wochen/Monate)
     * - VoraussetzungLP (SL Sonstiges, PL Sonstiges)
     */

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\ID
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Modul_ID;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @Assert\Date()
     */
    protected $Erstellungsdatum;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Versionsnummer;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     * @Assert\Choice(
     * choices = { "in Planung", "Freigegeben", "expired" },
     * message = "Bitte geben Sie einen korrekten Status an!"
     * )
     */
    protected $Status;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Assert\Length(
     * min= 2,
     * max= 5,
     * minMessage="Ein Modul-Kuerzel muss aus mindestens {{ limit }} Zeichen bestehen.",
     * maxMessage="Ein Modul-Kuerzel muss aus maximal {{ limit }} Zeichen bestehen."
     * )
     */
    protected $Kuerzel;

    /**
     * @ORM\Column(type="string", length=70, nullable=false)
     * @Assert\Length(
     * min= 5,
     * minMessage="Der deutsche Modul-Titel muss aus mindestens {{ limit }} Zeichen bestehen.",
     * max = 70,
     * maxMessage="Der deutsche Modul-Titel darf maximal aus {{ limit }} Zeichen bestehen.",
     * )
     * @Assert\NotBlank(
     *      message="Der deutsche Modultitel muss gesetzt werden."
     * )
     */
    protected $Name;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     * @Assert\Length(
     * min= 5,
     * minMessage="Der englische Modul-Titel muss aus mindestens {{ limit }} Zeichen bestehen.",
     * max = 70,
     * maxMessage="Der englische Modul-Titel darf maximal aus {{ limit }} Zeichen bestehen.",
     * )
     */
    protected $NameEN;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Choice(
     * choices = { "Wintersemester", "Sommersemester", "wechselnd", "jedes Semester"},
     * message = "Bitte geben Sie eine korrekte Haeufigkeit an!"
     * )
     */
    protected $Haeufigkeit;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $Dauer;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $Lehrveranstaltungen;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Die Kontaktzeit Vorlesung muss mindestens {{ limit }} Stunden betragen."
     * )
     * TODO: Überprüfung auf Datentyp (Assert\Type funktioniert nicht, weil Umwandlung in NULL)
     */
    protected $KontaktzeitVL;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Die Kontaktzeit Sonstige muss mindestens {{ limit }} Stunden betragen."
     * )
     * TODO: Überprüfung auf Datentyp (Assert\Type funktioniert nicht, weil Umwandlung in NULL)
     */
    protected $KontaktzeitSonstige;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Das Selbststudium muss mindestens {{ limit }} Stunden betragen."
     * )
     * TODO: Überprüfung auf Datentyp (Assert\Type funktioniert nicht, weil Umwandlung in NULL)
     */
    protected $Selbststudium;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Die Gruppengroesse muss mindestens {{ limit }} Studenten betragen."
     * )
     * TODO: Überprüfung auf Datentyp (Assert\Type funktioniert nicht, weil Umwandlung in NULL)
     */
    protected $Gruppengroesse;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $Lernergebnisse;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $Inhalte;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $Pruefungsformen;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $PruefungsformSonstiges;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $PruefungsleistungSonstiges;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $StudienleistungSonstiges;


    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Choice(
     * choices = { "Deutsch", "Englisch" },
     * message = "Bitte geben Sie eine korrekte Sprache an!"
     * )
     */
    protected $Sprache;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $SpracheSonstiges;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $Autor;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $Literatur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Choice(
     * choices = { "3", "6", "9", "12", "15", "30"},
     * message = "Bitte geben Sie eine korrekte Anzahl an Leistungspunkten an!"
     * )
     */
    protected $Leistungspunkte;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $VoraussetzungLP;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $VoraussetzungInhalte;

    /**
     * @ORM\OneToMany(targetEntity="Semesterplan", mappedBy="veranstaltung", cascade={"all"})
     */
    protected $semesterplan;

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
     * @ORM\OneToMany(targetEntity="Studienplan", mappedBy="veranstaltung", cascade={"all"})
     */
    protected $studienplanModul;

    /**
     * @ORM\OneToMany(targetEntity="Kernfach", mappedBy="veranstaltung", cascade={"all"})
     */
    protected $kernfach;

    /**
     * @ORM\ManyToMany(targetEntity="Veranstaltung", mappedBy="modul_")
     */
    private $modulVoraussetzung;

    /**
     * @ORM\ManyToMany(targetEntity="Veranstaltung", inversedBy="modulVoraussetzung")
     * @ORM\JoinTable(name="Voraussetzungen",
     *      joinColumns={@ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="modulVoraussetzung", referencedColumnName="Modul_ID")}
     *      )
     */
    private $modul_;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lehrende = new ArrayCollection();
        $this->semesterplan = new ArrayCollection();
        $this->modul_kernfach = new ArrayCollection();
        $this->angebot = new ArrayCollection();
        $this->modulVoraussetzung = new \Doctrine\Common\Collections\ArrayCollection();
        $this->modul_ = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = $this->getName();

        return $string;
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
     * Set Name
     *
     * @param string $name
     * @return Veranstaltung
     */
    public function setName($name)
    {
        $this->Name = $name;

        return $this;
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
     * Get Erstellungsdatum
     *
     * @return \DateTime
     */
    public function getErstellungsdatum()
    {
        return $this->Erstellungsdatum;
    }

    /**
     * Set Erstellungsdatum
     *
     * @param \DateTime $erstellungsdatum
     * @return Veranstaltung
     */
    public function setErstellungsdatum($erstellungsdatum)
    {
        $this->Erstellungsdatum = $erstellungsdatum;

        return $this;
    }

    /**
     * Get Versionsnummer_Modul
     *
     * @return integer
     */
    public function getVersionsnummer()
    {
        return $this->Versionsnummer;
    }

    /**
     * Set Versionsnummer_Modul
     *
     * @param integer $versionsnummerModul
     * @return Veranstaltung
     */
    public function setVersionsnummer($versionsnummerModul)
    {
        $this->Versionsnummer = $versionsnummerModul;

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
     * Set Status
     *
     * @param string $status
     * @return Veranstaltung
     */
    public function setStatus($status)
    {
        $this->Status = $status;

        return $this;
    }

    /**
     * Get Kuerzel
     *
     * @return string
     */
    public function getKuerzel()
    {
        return $this->Kuerzel;
    }

    /**
     * Set Kuerzel
     *
     * @param string $kuerzel
     * @return Veranstaltung
     */
    public function setKuerzel($kuerzel)
    {
        $this->Kuerzel = $kuerzel;

        return $this;
    }

    /**
     * Get Name_en
     *
     * @return string
     */
    public function getNameEn()
    {
        return $this->NameEN;
    }

    /**
     * Set Name_en
     *
     * @param string $nameEn
     * @return Veranstaltung
     */
    public function setNameEn($nameEn)
    {
        $this->NameEN = $nameEn;

        return $this;
    }

    /**
     * Get Haeufigkeit
     *
     * @return string
     */
    public function getHaeufigkeit()
    {
        return $this->Haeufigkeit;
    }

    /**
     * Set Haeufigkeit
     *
     * @param string $haeufigkeit
     * @return Veranstaltung
     */
    public function setHaeufigkeit($haeufigkeit)
    {
        $this->Haeufigkeit = $haeufigkeit;

        return $this;
    }

    /**
     * Get Dauer
     *
     * @return integer
     */
    public function getDauer()
    {
        return $this->Dauer;
    }

    /**
     * Set Dauer
     *
     * @param integer $dauer
     * @return Veranstaltung
     */
    public function setDauer($dauer)
    {
        $this->Dauer = $dauer;

        return $this;
    }

    /**
     * Get Lehrveranstaltungen
     *
     * @return string
     */
    public function getLehrveranstaltungen()
    {
        return $this->Lehrveranstaltungen;
    }

    /**
     * Set Lehrveranstaltungen
     *
     * @param string $lehrveranstaltungen
     * @return Veranstaltung
     */
    public function setLehrveranstaltungen($lehrveranstaltungen)
    {
        $this->Lehrveranstaltungen = $lehrveranstaltungen;

        return $this;
    }

    /**
     * Get Kontaktzeit_VL
     *
     * @return integer
     */
    public function getKontaktzeitVL()
    {
        return $this->KontaktzeitVL;
    }

    /**
     * Set Kontaktzeit_VL
     *
     * @param integer $kontaktzeitVL
     * @return Veranstaltung
     */
    public function setKontaktzeitVL($kontaktzeitVL)
    {
        $this->KontaktzeitVL = $kontaktzeitVL;

        return $this;
    }

    /**
     * Get Kontaktzeit_sonstige
     *
     * @return integer
     */
    public function getKontaktzeitSonstige()
    {
        return $this->KontaktzeitSonstige;
    }

    /**
     * Set Kontaktzeit_sonstige
     *
     * @param integer $kontaktzeitSonstige
     * @return Veranstaltung
     */
    public function setKontaktzeitSonstige($kontaktzeitSonstige)
    {
        $this->KontaktzeitSonstige = $kontaktzeitSonstige;

        return $this;
    }

    /**
     * Get Selbststudium
     *
     * @return integer
     */
    public function getSelbststudium()
    {
        return $this->Selbststudium;
    }

    /**
     * Set Selbststudium
     *
     * @param integer $selbststudium
     * @return Veranstaltung
     */
    public function setSelbststudium($selbststudium)
    {
        $this->Selbststudium = $selbststudium;

        return $this;
    }

    /**
     * Get Gruppengroesse
     *
     * @return integer
     */
    public function getGruppengroesse()
    {
        return $this->Gruppengroesse;
    }

    /**
     * Set Gruppengroesse
     *
     * @param integer $gruppengroesse
     * @return Veranstaltung
     */
    public function setGruppengroesse($gruppengroesse)
    {
        $this->Gruppengroesse = $gruppengroesse;

        return $this;
    }

    /**
     * Get Lernergebnisse
     *
     * @return string
     */
    public function getLernergebnisse()
    {
        return $this->Lernergebnisse;
    }

    /**
     * Set Lernergebnisse
     *
     * @param string $lernergebnisse
     * @return Veranstaltung
     */
    public function setLernergebnisse($lernergebnisse)
    {
        $this->Lernergebnisse = $lernergebnisse;

        return $this;
    }

    /**
     * Get Inhalte
     *
     * @return string
     */
    public function getInhalte()
    {
        return $this->Inhalte;
    }

    /**
     * Set Inhalte
     *
     * @param string $inhalte
     * @return Veranstaltung
     */
    public function setInhalte($inhalte)
    {
        $this->Inhalte = $inhalte;

        return $this;
    }

    /**
     * Get Pruefungsformen
     *
     * @return string
     */
    public function getPruefungsformen()
    {
        return $this->Pruefungsformen;
    }

    /**
     * Set Pruefungsformen
     *
     * @param string $pruefungsformen
     * @return Veranstaltung
     */
    public function setPruefungsformen($pruefungsformen)
    {
        $this->Pruefungsformen = $pruefungsformen;

        return $this;
    }

    /**
     * Get PruefungsformenSonstiges
     *
     * @return string
     */
    public function getPruefungsformSonstiges()
    {
        return $this->PruefungsformSonstiges;
    }

    /**
     * Set PruefungsformSonstiges
     *
     * @param string $pruefungsformen
     * @return Veranstaltung
     */
    public function setPruefungsformSonstiges($pruefungsformSonst)
    {
        $this->PruefungsformSonstiges = $pruefungsformSonst;

        return $this;
    }

    /**
     * Get Sprache
     *
     * @return string
     */
    public function getSprache()
    {
        return $this->Sprache;
    }

    /**
     * Set PruefungsleistungSonstiges
     *
     * @param string $pruefungsleistungSonst
     * @return Veranstaltung
     */
    public function setPruefungsleistungSonstiges($pruefungsleistungSonst)
    {
        $this->PruefungsleistungSonstiges = $pruefungsleistungSonst;

        return $this;
    }

    /**
     * Get StudienleistungSonstiges
     *
     * @return string
     */
    public function getStudienleistungSonstiges()
    {
        return $this->StudienleistungSonstiges;
    }

    /**
     * Set PruefungsleistungSonstiges
     *
     * @param string $StudienleistungSonstiges
     * @return Veranstaltung
     */
    public function setStudienleistungSonstiges($StudienleistungSonst)
    {
        $this->StudienleistungSonstiges = $StudienleistungSonst;

        return $this;
    }

    /**
     * Get PruefungsleistungSonstiges
     *
     * @return string
     */
    public function getPruefungsleistungSonstiges()
    {
        return $this->PruefungsleistungSonstiges;
    }

    /**
     * Set Sprache
     *
     * @param string $sprache
     * @return Veranstaltung
     */
    public function setSprache($sprache)
    {
        $this->Sprache = $sprache;

        return $this;
    }

    /**
     * Get Sprache
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->Autor;
    }

    /**
     * Set Autor
     *
     * @param string $autor
     * @return Veranstaltung
     */
    public function setAutor($autor)
    {
        $this->Autor = $autor;

        return $this;
    }

    /**
     * Get SpracheSonstiges
     *
     * @return string
     */
    public function getSpracheSonstiges()
    {
        return $this->SpracheSonstiges;
    }

    /**
     * Set SpracheSonstiges
     * @param string $sprache
     * @return Veranstaltung
     */
    public function setSpracheSonstiges($sprache)
    {
        $this->SpracheSonstiges = $sprache;

        return $this;
    }

    /**
     * Get Literatur
     *
     * @return string
     */
    public function getLiteratur()
    {
        return $this->Literatur;
    }

    /**
     * Set Literatur
     *
     * @param string $literatur
     * @return Veranstaltung
     */
    public function setLiteratur($literatur)
    {
        $this->Literatur = $literatur;

        return $this;
    }

    /**
     * Get Leistungspunkte
     *
     * @return integer
     */
    public function getLeistungspunkte()
    {
        return $this->Leistungspunkte;
    }

    /**
     * Set Leistungspunkte
     *
     * @param integer $leistungspunkte
     * @return Veranstaltung
     */
    public function setLeistungspunkte($leistungspunkte)
    {
        $this->Leistungspunkte = $leistungspunkte;

        return $this;
    }

    /**
     * Get Voraussetzung_LP
     *
     * @return string
     */
    public function getVoraussetzungLP()
    {
        return $this->VoraussetzungLP;
    }

    /**
     * Set Voraussetzung_LP
     *
     * @param string $voraussetzungLP
     * @return Veranstaltung
     */
    public function setVoraussetzungLP($voraussetzungLP)
    {
        $this->VoraussetzungLP = $voraussetzungLP;

        return $this;
    }

    /**
     * Set Voraussetzung_inh
     *
     * @param string $voraussetzungInh
     * @return Veranstaltung
     */
    public function setVoraussetzungInh($voraussetzungInh)
    {
        $this->VoraussetzungInhalte = $voraussetzungInh;

        return $this;
    }

    /**
     * Get Voraussetzung_inh
     *
     * @return string
     */
    public function getVoraussetzungInh()
    {
        return $this->VoraussetzungInhalte;
    }

    /**
     * Add Lehrende
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrende
     * @return Veranstaltung
     */
    public function addLehrende(\FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrende)
    {
        $this->lehrende[] = $lehrende;

        return $this;
    }

    /**
     * Remove Lehrende
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrende
     */
    public function removeLehrende(\FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrende)
    {
        $this->lehrende->removeElement($lehrende);
    }

    /**
     * Get Lehrende
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
     * @return Veranstaltung
     */
    public function addSemesterplan(\FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan)
    {
        $this->semesterplan[] = $semesterplan;

        return $this;
    }



    /*Abhaengigkeiten*/


    /*Semesterplan*/

    /**
     * Remove semesterplan
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan
     */
    public function removeSemesterplan(\FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan)
    {
        $this->semesterplan->removeElement($semesterplan);
    }

    /*Angebot*/

    /**
     * Get semesterplan
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSemesterplan()
    {
        return $this->semesterplan;
    }

    /* Lehrende*/

    /**
     * Add modul_kernfach
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Kernfach $modulKernfach
     * @return Veranstaltung
     */
    public function addModulKernfach(\FHBingen\Bundle\MHBBundle\Entity\Kernfach $modulKernfach)
    {
        $this->modul_kernfach[] = $modulKernfach;

        return $this;
    }


    /*Modulbeauftragter (Dozent/Modul)*/

    /**
     * Remove modul_kernfach
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Kernfach $modulKernfach
     */
    public function removeModulKernfach(\FHBingen\Bundle\MHBBundle\Entity\Kernfach $modulKernfach)
    {
        $this->modul_kernfach->removeElement($modulKernfach);
    }

    /*Voraussetzung*/

    /**
     * Get modul_kernfach
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModulKernfach()
    {
        return $this->modul_kernfach;
    }

    /**
     * Add angebot
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot
     * @return Veranstaltung
     */
    public function addAngebot(\FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot)
    {
        $this->angebot[] = $angebot;

        return $this;
    }
    //TODO: super unintitiv, modul_ ist eigentlich die Voraussetzung

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


    //TODO: Was ist denn das hier schon wieder?
//    public function __construct_vor()
//    {
//        $this->modulVoraussetzung = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->modul_ = new \Doctrine\Common\Collections\ArrayCollection();
//    }

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
     * Set beauftragter
     *
     * @param string $erstelltVon
     * @return Veranstaltung
     */
    public function setBeauftragter($beauftragter = null)
    {
        $this->beauftragter = $beauftragter;

        return $this;
    }

    /**
     * Add modul_voraussetzung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulVoraussetzung
     * @return Veranstaltung
     */
    public function addModulVoraussetzung(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulVoraussetzung)
    {
        //$this->modulVoraussetzung[] = $modulVoraussetzung;
        $this->modul_[] = $modulVoraussetzung;

        return $this;
    }

    /*Studienplan*/

    /**
     * Remove modul_voraussetzung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulVoraussetzung
     */
    public function removeModulVoraussetzung(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulVoraussetzung)
    {
        //$this->modulVoraussetzung->removeElement($modulVoraussetzung);
        $this->modul_->removeElement($modulVoraussetzung);
    }

    /*Kernfach*/

    /**
     * Get modul_voraussetzung
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModulVoraussetzung()
    {
        //return $this->modulVoraussetzung;
        return $this->modul_;
    }

    /**
     * Add studienplan_modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplanModul
     * @return Veranstaltung
     */
    public function addStudienplanModul(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplanModul)
    {
        $this->studienplanModul[] = $studienplanModul;

        return $this;
    }

    /**
     * Remove studienplan_modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplanModul
     */
    public function removeStudienplanModul(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplanModul)
    {
        $this->studienplanModul->removeElement($studienplanModul);
    }

    /**
     * Get studienplan_modul
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudienplanModul()
    {
        return $this->studienplanModul;
    }

    /**
     * Add kernfach
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Kernfach $kernfach
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
}
