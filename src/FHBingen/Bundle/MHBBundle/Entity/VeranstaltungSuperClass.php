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

/*
 * TODO:
 * @UniqueEntity(fields="Kuerzel", message="Es existiert bereits eine Veranstaltung mit diesem Kürzel.")
 * wirft fehler wegen MAT2
 */
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
class VeranstaltungSuperClass
{
    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\ID
     */
    protected $Modul_ID;

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
     * @return string
     */
    public function __toString()
    {
        $string = $this->getName();

        return $string;
    }

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @Assert\DateTime()
     */
    protected $Erstellungsdatum;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     * @Assert\Choice(
     *      choices = { "in Planung", "Freigegeben", "expired" },
     *      message = "Bitte geben Sie einen korrekten Status an!"
     * )
     */
    protected $Status;

    //TODO: unique, siehe oben
    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 5,
     *      minMessage = "Ein Modulkürzel muss aus mindestens {{ limit }} Zeichen bestehen.",
     *      maxMessage = "Ein Modulkürzel muss aus maximal {{ limit }} Zeichen bestehen."
     * )
     * @Assert\Regex(
     *     pattern = "/[A-Z0-9]{2,5}/",
     *     message = "Das Modulkürzel darf nur aus Großbuchstaben und Zahlen bestehen."
     * )
     */
    protected $Kuerzel;

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
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Choice(
     *      choices = { "Wintersemester", "Sommersemester", "wechselnd", "jedes Semester"},
     *      message = "Bitte geben Sie eine korrekte Haeufigkeit an!"
     * )
     */
    protected $Haeufigkeit;

    //TODO:
    //* @Assert\Regex(
    //*     pattern = "/[0-9]{1,2}[ ](\bWochen\b|\bSemester\b|\bMonate\b)/",
    //*     message = "Bitte verwenden Sie folgendes muster für die Dauer: z.B. 12 Wochen, 1 Semster, 3 Monate"
    //* )
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
    protected $ErlaeuterungenLP;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Choice(
     *      choices = { "Deutsch", "Englisch" },
     *      message = "Bitte geben Sie eine korrekte Sprache an!"
     * )
     */
    protected $Sprache;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $SpracheSonstiges;

    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="bearbeitet")
     * @ORM\JoinColumn(name="autor", referencedColumnName="Dozenten_ID", nullable=false)
     */
    protected $autor;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $Literatur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Choice(
     *      choices = { "3", "6", "9", "12", "15", "30"},
     *      message = "Bitte geben Sie eine korrekte Anzahl an Leistungspunkten an!"
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
     * Set Erstellungsdatum
     *
     * @param \DateTime $erstellungsdatum
     *
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
     * Set Kuerzel
     *
     * @param string $kuerzel
     *
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
     * Set Haeufigkeit
     *
     * @param string $haeufigkeit
     *
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
     * @param string $dauer
     *
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
     * @return string 
     */
    public function getDauer()
    {
        return $this->Dauer;
    }

    /**
     * Set Lehrveranstaltungen
     *
     * @param string $lehrveranstaltungen
     *
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
     * Set KontaktzeitVL
     *
     * @param integer $kontaktzeitVL
     *
     * @return Veranstaltung
     */
    public function setKontaktzeitVL($kontaktzeitVL)
    {
        $this->KontaktzeitVL = $kontaktzeitVL;

        return $this;
    }

    /**
     * Get KontaktzeitVL
     *
     * @return integer 
     */
    public function getKontaktzeitVL()
    {
        return $this->KontaktzeitVL;
    }

    /**
     * Set KontaktzeitSonstige
     *
     * @param integer $kontaktzeitSonstige
     *
     * @return Veranstaltung
     */
    public function setKontaktzeitSonstige($kontaktzeitSonstige)
    {
        $this->KontaktzeitSonstige = $kontaktzeitSonstige;

        return $this;
    }

    /**
     * Get KontaktzeitSonstige
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
     *
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
     *
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
     *
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
     *
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
     *
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
     * Set PruefungsformSonstiges
     *
     * @param string $pruefungsformSonstiges
     *
     * @return Veranstaltung
     */
    public function setPruefungsformSonstiges($pruefungsformSonstiges)
    {
        $this->PruefungsformSonstiges = $pruefungsformSonstiges;

        return $this;
    }

    /**
     * Get PruefungsformSonstiges
     *
     * @return string 
     */
    public function getPruefungsformSonstiges()
    {
        return $this->PruefungsformSonstiges;
    }

    /**
     * Set Sprache
     *
     * @param string $sprache
     *
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
     * Set SpracheSonstiges
     *
     * @param string $spracheSonstiges
     *
     * @return Veranstaltung
     */
    public function setSpracheSonstiges($spracheSonstiges)
    {
        $this->SpracheSonstiges = $spracheSonstiges;

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
     * Set Autor
     *
     * @param Dozent $autor
     *
     * @return Veranstaltung
     */
    public function setAutor(Dozent $autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get Autor
     *
     * @return Dozent
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set Literatur
     *
     * @param string $literatur
     *
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
     *
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
     * Set VoraussetzungLP
     *
     * @param string $voraussetzungLP
     *
     * @return Veranstaltung
     */
    public function setVoraussetzungLP($voraussetzungLP)
    {
        $this->VoraussetzungLP = $voraussetzungLP;

        return $this;
    }

    /**
     * Get VoraussetzungLP
     *
     * @return string 
     */
    public function getVoraussetzungLP()
    {
        return $this->VoraussetzungLP;
    }

    /**
     * Set VoraussetzungInhalte
     *
     * @param string $voraussetzungInhalte
     *
     * @return Veranstaltung
     */
    public function setVoraussetzungInh($voraussetzungInhalte)
    {
        $this->VoraussetzungInhalte = $voraussetzungInhalte;

        return $this;
    }

    /**
     * Get VoraussetzungInhalte
     *
     * @return string 
     */
    public function getVoraussetzungInh()
    {
        return $this->VoraussetzungInhalte;
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
     * @return string
     */
    public function getErlaeuterungenLP()
    {
        return $this->ErlaeuterungenLP;
    }

    /**
     * @param string $ErlaeuterungenLP
     *
     * @return $this
     */
    public function setErlaeuterungenLP($ErlaeuterungenLP)
    {
        $this->ErlaeuterungenLP = $ErlaeuterungenLP;

        return $this;
    }
}
