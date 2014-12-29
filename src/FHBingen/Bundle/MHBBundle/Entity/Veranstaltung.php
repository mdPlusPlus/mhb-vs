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

    public function __toString()
    {
        $string =(string) $this->getName();
        return $string;
    }

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
    protected $erstellungsdatum;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $versionsnummer;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     * @Assert\Choice(
     * choices = { "in Planung", "Freigegeben", "expired" },
     * message = "Bitte geben Sie einen korrekten Status an!"
     * )
     */
    protected $status;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Assert\Length(
     * min= 3,
     * max= 5,
     * minMessage="Ein Modul-Kuerzel muss aus mindestens {{ limit }} Zeichen bestehen.",
     * maxMessage="Ein Modul-Kuerzel muss aus maximal {{ limit }} Zeichen bestehen."
     * )
     */
    protected $kuerzel;

    /**
     * @ORM\Column(type="string", length=60, nullable=false)
    * @Assert\Length(
     * min= 5,
     * minMessage="Der deutsche Modul-Titel muss aus mindestens {{ limit }} Zeichen bestehen. Blubb"
     * )
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     * @Assert\Length(
     * min= 5,
     * minMessage="Der englische Modul-Titel muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     */
    protected $nameEN;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Choice(
     * choices = { "Wintersemester", "Sommersemester", "wechselnd", "jedes Semester"},
     * message = "Bitte geben Sie eine korrekte Haeufigkeit an!"
     * )
     */
    protected $haeufigkeit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $dauer;

/**
 * @ORM\Column(type="text", nullable=true)
 */
protected $lehrveranstaltungen;

/**
 * @ORM\Column(type="integer", nullable=true)
 */
protected $kontaktzeitVL;

/**
 * @ORM\Column(type="integer", nullable=true)
 */
protected $kontaktzeitSonstige;

/**
 * @ORM\Column(type="integer", nullable=true)
 */
protected $selbststudium;

/**
 * @ORM\Column(type="integer", nullable=true)
 */
protected $gruppengroesse;

/**
 * @ORM\Column(type="text", nullable=true)
 */
protected $lernergebnisse;

/**
 * @ORM\Column(type="text", nullable=true)
 */
protected $inhalte;

/**
 * @ORM\Column(type="text", nullable=true)
 */
protected $pruefungsformen;

/**
 * @ORM\Column(type="string", length=20, nullable=true)
 */
protected $sprache;

/**
 * @ORM\Column(type="text", nullable=true)
 */
protected $literatur;

/**
 * @ORM\Column(type="integer", nullable=true)
 */
protected $leistungspunkte;

/**
 * @ORM\Column(type="text", nullable=true)
 */
protected $voraussetzungLP;

/**
 * @ORM\Column(type="text", nullable=true)
 */
protected $voraussetzungInh;

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
     * Set Erstellungsdatum
     *
     * @param \DateTime $erstellungsdatum
     * @return Veranstaltung
     */
    public function setErstellungsdatum($erstellungsdatum)
    {
        $this->erstellungsdatum = $erstellungsdatum;
    
        return $this;
    }

    /**
     * Get Erstellungsdatum
     *
     * @return \DateTime
     */
    public function getErstellungsdatum()
    {
        return $this->erstellungsdatum;
    }

    /**
     * Set erstellt_von
     *
     * @param string $erstelltVon
     * @return Veranstaltung
     */
    public function setErstelltVon($erstelltVon)
    {
        $this->Erstellt_von = $erstelltVon;
    
        return $this;
    }

    /**
     * Get erstellt_von
     *
     * @return string 
     */
    public function getErstelltVon()
    {
        return $this->Erstellt_von;
    }

    /**
     * Set Versionsnummer_Modul
     *
     * @param integer $versionsnummerModul
     * @return Veranstaltung
     */
    public function setVersionsnummer($versionsnummerModul)
    {
        $this->versionsnummer = $versionsnummerModul;
    
        return $this;
    }

    /**
     * Get Versionsnummer_Modul
     *
     * @return integer 
     */
    public function getVersionsnummer()
    {
        return $this->versionsnummer;
    }

    /**
     * Set Status
     *
     * @param string $status
     * @return Veranstaltung
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get Status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Kuerzel
     *
     * @param string $kuerzel
     * @return Veranstaltung
     */
    public function setKuerzel($kuerzel)
    {
        $this->kuerzel = $kuerzel;
    
        return $this;
    }

    /**
     * Get Kuerzel
     *
     * @return string 
     */
    public function getKuerzel()
    {
        return $this->kuerzel;
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return Veranstaltung
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get Name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name_en
     *
     * @param string $nameEn
     * @return Veranstaltung
     */
    public function setNameEn($nameEn)
    {
        $this->nameEN = $nameEn;
    
        return $this;
    }

    /**
     * Get Name_en
     *
     * @return string 
     */
    public function getNameEn()
    {
        return $this->nameEN;
    }

    /**
     * Set Haeufigkeit
     *
     * @param string $haeufigkeit
     * @return Veranstaltung
     */
    public function setHaeufigkeit($haeufigkeit)
    {
        $this->haeufigkeit = $haeufigkeit;
    
        return $this;
    }

    /**
     * Get Haeufigkeit
     *
     * @return string 
     */
        public function getHaeufigkeit()
    {
        return $this->haeufigkeit;
    }

    /**
     * Set Dauer
     *
     * @param integer $dauer
     * @return Veranstaltung
     */
    public function setDauer($dauer)
    {
        $this->dauer = $dauer;
    
        return $this;
    }

    /**
     * Get Dauer
     *
     * @return integer 
     */
    public function getDauer()
    {
        return $this->dauer;
    }

    /**
     * Set Lehrveranstaltungen
     *
     * @param string $lehrveranstaltungen
     * @return Veranstaltung
     */
    public function setLehrveranstaltungen($lehrveranstaltungen)
    {
        $this->lehrveranstaltungen = $lehrveranstaltungen;
    
        return $this;
    }

    /**
     * Get Lehrveranstaltungen
     *
     * @return string 
     */
    public function getLehrveranstaltungen()
    {
        return $this->lehrveranstaltungen;
    }

    /**
     * Set Kontaktzeit_VL
     *
     * @param integer $kontaktzeitVL
     * @return Veranstaltung
     */
    public function setKontaktzeitVL($kontaktzeitVL)
    {
        $this->kontaktzeitVL = $kontaktzeitVL;
    
        return $this;
    }

    /**
     * Get Kontaktzeit_VL
     *
     * @return integer 
     */
    public function getKontaktzeitVL()
    {
        return $this->kontaktzeitVL;
    }

    /**
     * Set Kontaktzeit_sonstige
     *
     * @param integer $kontaktzeitSonstige
     * @return Veranstaltung
     */
    public function setKontaktzeitSonstige($kontaktzeitSonstige)
    {
        $this->kontaktzeitSonstige = $kontaktzeitSonstige;
    
        return $this;
    }

    /**
     * Get Kontaktzeit_sonstige
     *
     * @return integer 
     */
    public function getKontaktzeitSonstige()
    {
        return $this->kontaktzeitSonstige;
    }

    /**
     * Set Selbststudium
     *
     * @param integer $selbststudium
     * @return Veranstaltung
     */
    public function setSelbststudium($selbststudium)
    {
        $this->selbststudium = $selbststudium;
    
        return $this;
    }

    /**
     * Get Selbststudium
     *
     * @return integer 
     */
    public function getSelbststudium()
    {
        return $this->selbststudium;
    }

    /**
     * Set Gruppengroesse
     *
     * @param integer $gruppengroesse
     * @return Veranstaltung
     */
    public function setGruppengroesse($gruppengroesse)
    {
        $this->gruppengroesse = $gruppengroesse;
    
        return $this;
    }

    /**
     * Get Gruppengroesse
     *
     * @return integer 
     */
    public function getGruppengroesse()
    {
        return $this->gruppengroesse;
    }

    /**
     * Set Lernergebnisse
     *
     * @param string $lernergebnisse
     * @return Veranstaltung
     */
    public function setLernergebnisse($lernergebnisse)
    {
        $this->lernergebnisse = $lernergebnisse;
    
        return $this;
    }

    /**
     * Get Lernergebnisse
     *
     * @return string 
     */
    public function getLernergebnisse()
    {
        return $this->lernergebnisse;
    }

    /**
     * Set Inhalte
     *
     * @param string $inhalte
     * @return Veranstaltung
     */
    public function setInhalte($inhalte)
    {
        $this->inhalte = $inhalte;
    
        return $this;
    }

    /**
     * Get Inhalte
     *
     * @return string 
     */
    public function getInhalte()
    {
        return $this->inhalte;
    }

    /**
     * Set Pruefungsformen
     *
     * @param string $pruefungsformen
     * @return Veranstaltung
     */
    public function setPruefungsformen($pruefungsformen)
    {
        $this->pruefungsformen = $pruefungsformen;
    
        return $this;
    }

    /**
     * Get Pruefungsformen
     *
     * @return string 
     */
    public function getPruefungsformen()
    {
        return $this->pruefungsformen;
    }

    /**
     * Set Sprache
     *
     * @param string $sprache
     * @return Veranstaltung
     */
    public function setSprache($sprache)
    {
        $this->sprache = $sprache;
    
        return $this;
    }

    /**
     * Get Sprache
     *
     * @return string 
     */
    public function getSprache()
    {
        return $this->sprache;
    }

    /**
     * Set Literatur
     *
     * @param string $literatur
     * @return Veranstaltung
     */
    public function setLiteratur($literatur)
    {
        $this->literatur = $literatur;
    
        return $this;
    }

    /**
     * Get Literatur
     *
     * @return string 
     */
    public function getLiteratur()
    {
        return $this->literatur;
    }

    /**
     * Set Leistungspunkte
     *
     * @param integer $leistungspunkte
     * @return Veranstaltung
     */
    public function setLeistungspunkte($leistungspunkte)
    {
        $this->leistungspunkte = $leistungspunkte;
    
        return $this;
    }

    /**
     * Get Leistungspunkte
     *
     * @return integer 
     */
    public function getLeistungspunkte()
    {
        return $this->leistungspunkte;
    }

    /**
     * Set Voraussetzung_LP
     *
     * @param string $voraussetzungLP
     * @return Veranstaltung
     */
    public function setVoraussetzungLP($voraussetzungLP)
    {
        $this->voraussetzungLP = $voraussetzungLP;
    
        return $this;
    }

    /**
     * Get Voraussetzung_LP
     *
     * @return string 
     */
    public function getVoraussetzungLP()
    {
        return $this->voraussetzungLP;
    }

    /**
     * Set Voraussetzung_inh
     *
     * @param string $voraussetzungInh
     * @return Veranstaltung
     */
    public function setVoraussetzungInh($voraussetzungInh)
    {
        $this->voraussetzungInh = $voraussetzungInh;
    
        return $this;
    }

    /**
     * Get Voraussetzung_inh
     *
     * @return string 
     */
    public function getVoraussetzungInh()
    {
        return $this->voraussetzungInh;
    }



    public function __construct_lehrende()
    {
        $this->Lehrende = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modul = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Lehrende = new \Doctrine\Common\Collections\ArrayCollection();
        $this->semesterplan = new \Doctrine\Common\Collections\ArrayCollection();
        $this->modul_kernfach = new \Doctrine\Common\Collections\ArrayCollection();
        $this->angebot = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Lehrende $modul
     * @return Veranstaltung
     */
    public function addModul(\FHBingen\Bundle\MHBBundle\Entity\Lehrende $modul)
    {
        $this->modul[] = $modul;
    
        return $this;
    }

    /**
     * Remove modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Lehrende $modul
     */
    public function removeModul(\FHBingen\Bundle\MHBBundle\Entity\Lehrende $modul)
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
     * Add Lehrende
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrende
     * @return Veranstaltung
     */
    public function addLehrende(\FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrende)
    {
        $this->Lehrende[] = $lehrende;
    
        return $this;
    }

    /**
     * Remove Lehrende
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrende
     */
    public function removeLehrende(\FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrende)
    {
        $this->Lehrende->removeElement($lehrende);
    }

    /**
     * Get Lehrende
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLehrende()
    {
        return $this->Lehrende;
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

    /**
     * Remove modul_kernfach
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Kernfach $modulKernfach
     */
    public function removeModulKernfach(\FHBingen\Bundle\MHBBundle\Entity\Kernfach $modulKernfach)
    {
        $this->modul_kernfach->removeElement($modulKernfach);
    }

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



    /*Abhaengigkeiten*/


    /*Semesterplan*/

    /**
     * @ORM\OneToMany(targetEntity="Semesterplan", mappedBy="veranstaltung", cascade={"all"})
     * */
    protected $semesterplan;

    /*Angebot*/

    /**
     * @ORM\OneToMany(targetEntity="Angebot", mappedBy="veranstaltung", cascade={"all"})
     * */
    protected $angebot;

    /* Lehrende*/

    /**
     * @ORM\OneToMany(targetEntity="Lehrende", mappedBy="veranstaltung", cascade={"all"})
     * */
    protected  $modul;



    /*Modulbeauftragter (Dozent/Modul)*/

    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="modulbeauftragter")
     * @ORM\JoinColumn(name="Modulbeauftragter", referencedColumnName="Dozenten_ID", nullable=false)
     */
    protected $beauftragter;

    /*Voraussetzung*/

    /**
     * @ORM\ManyToMany(targetEntity="Veranstaltung", mappedBy="modul_")
     **/
    private $modulVoraussetzung;

    /**
     * @ORM\ManyToMany(targetEntity="Veranstaltung", inversedBy="modulVoraussetzung")
     * @ORM\JoinTable(name="Voraussetzungen",
     *      joinColumns={@ORM\JoinColumn(name="Modul", referencedColumnName="Modul_ID")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="Modul_Voraussetzung", referencedColumnName="Modul_ID")}
     *      )
     **/
    private $modul_;

    public function __construct_vor() {
        $this->modulVoraussetzung = new \Doctrine\Common\Collections\ArrayCollection();
        $this->modul_ = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get beauftragter
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Dozent 
     */
    public function getBeauftragter()
    {
        return $this->beauftragter;
    }

    /**
     * Add modul_voraussetzung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulVoraussetzung
     * @return Veranstaltung
     */
    public function addModulVoraussetzung(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulVoraussetzung)
    {
        $this->modulVoraussetzung[] = $modulVoraussetzung;
    
        return $this;
    }

    /**
     * Remove modul_voraussetzung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulVoraussetzung
     */
    public function removeModulVoraussetzung(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulVoraussetzung)
    {
        $this->modulVoraussetzung->removeElement($modulVoraussetzung);
    }

    /**
     * Get modul_voraussetzung
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModulVoraussetzung()
    {
        return $this->modulVoraussetzung;
    }

    /*Studienplan*/
    /**
     * @ORM\OneToMany(targetEntity="Studienplan", mappedBy="veranstaltung", cascade={"all"})
     * */
    protected $studienplanModul;

    /*Kernfach*/
    /**
     * @ORM\OneToMany(targetEntity="Kernfach", mappedBy="veranstaltung", cascade={"all"})
     * */
    protected $kernfach;

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
