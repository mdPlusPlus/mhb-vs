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
        $string = (string)$this->getName();
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
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(
     *      min = 1,
     *      minMessage = "Die Dauer muss mindestens {{ limit }} Semester betragen.",
     *      max = 12,
     *      maxMessage = "Die Dauer darf maximal {{ limit }} Wochen betragen.",
     * )
     * TODO: Überprüfung auf Datentyp (Assert\Type funktioniert nicht, weil Umwandlung in NULL)
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
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Choice(
     * choices = { "Deutsch", "Englisch", "Deutsch, einzelne Abschnitte möglicherweise in Englisch" },
     * message = "Bitte geben Sie eine korrekte Sprache an!"
     * )
     */
    protected $Sprache;

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
        $this->Erstellungsdatum = $erstellungsdatum;

        return $this;
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
        $this->Versionsnummer = $versionsnummerModul;

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
     * Get Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
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
     * Get Kuerzel
     *
     * @return string
     */
    public function getKuerzel()
    {
        return $this->Kuerzel;
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
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
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
     * Get Name_en
     *
     * @return string
     */
    public function getNameEn()
    {
        return $this->NameEN;
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
     * Get Haeufigkeit
     *
     * @return string
     */
    public function getHaeufigkeit()
    {
        return $this->Haeufigkeit;
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
     * Get Dauer
     *
     * @return integer
     */
    public function getDauer()
    {
        return $this->Dauer;
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
     * Get Lehrveranstaltungen
     *
     * @return string
     */
    public function getLehrveranstaltungen()
    {
        return $this->Lehrveranstaltungen;
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
     * Get Kontaktzeit_VL
     *
     * @return integer
     */
    public function getKontaktzeitVL()
    {
        return $this->KontaktzeitVL;
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
     * Get Kontaktzeit_sonstige
     *
     * @return integer
     */
    public function getKontaktzeitSonstige()
    {
        return $this->KontaktzeitSonstige;
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
     * Get Selbststudium
     *
     * @return integer
     */
    public function getSelbststudium()
    {
        return $this->Selbststudium;
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
     * Get Gruppengroesse
     *
     * @return integer
     */
    public function getGruppengroesse()
    {
        return $this->Gruppengroesse;
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
     * Get Lernergebnisse
     *
     * @return string
     */
    public function getLernergebnisse()
    {
        return $this->Lernergebnisse;
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
     * Get Inhalte
     *
     * @return string
     */
    public function getInhalte()
    {
        return $this->Inhalte;
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
     * Get Pruefungsformen
     *
     * @return string
     */
    public function getPruefungsformen()
    {
        return $this->Pruefungsformen;
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
    public function getSprache()
    {
        return $this->Sprache;
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
     * Get Literatur
     *
     * @return string
     */
    public function getLiteratur()
    {
        return $this->Literatur;
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
     * Get Leistungspunkte
     *
     * @return integer
     */
    public function getLeistungspunkte()
    {
        return $this->Leistungspunkte;
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
     * Get Voraussetzung_LP
     *
     * @return string
     */
    public function getVoraussetzungLP()
    {
        return $this->VoraussetzungLP;
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
    protected $modul;
    //TODO: Sind eigentlich Lehrende... Warum Modul? Weiß kein Mensch.


    /*Modulbeauftragter (Dozent/Modul)*/

    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="modulbeauftragter")
     * @ORM\JoinColumn(name="modulbeauftragter", referencedColumnName="Dozenten_ID", nullable=false)
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
     *      joinColumns={@ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="modulVoraussetzung", referencedColumnName="Modul_ID")}
     *      )
     **/
    private $modul_;

    public function __construct_vor()
    {
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
        //$this->modulVoraussetzung[] = $modulVoraussetzung;
        $this->modul_[] = $modulVoraussetzung;

        return $this;
    }

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
