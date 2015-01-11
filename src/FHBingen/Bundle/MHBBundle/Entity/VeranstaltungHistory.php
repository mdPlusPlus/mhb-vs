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
 * Class VeranstaltungHistory
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="VeranstaltungHistory")
 * @ORM\HasLifecycleCallbacks
 */
class VeranstaltungHistory
{

    public function __toString()
    {
        $string = (string)$this->getName();
        return $string;
    }

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\ID
     */
    protected $Modul_ID;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @Assert\Date()
     */
    protected $Erstellungsdatum;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\ID
     */
    protected $Versionsnummer;

    /**
     * @ORM\Column(type="string", length=5, nullable=false)
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
     * @ORM\Column(type="string", length=70, nullable=false)
     * @Assert\Length(
     * min= 5,
     * minMessage="Der englische Modul-Titel muss aus mindestens {{ limit }} Zeichen bestehen.",
     * max = 70,
     * maxMessage="Der englische Modul-Titel darf maximal aus {{ limit }} Zeichen bestehen.",
     * )
     */
    protected $NameEN;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\Choice(
     * choices = { "Wintersemester", "Sommersemester", "wechselnd", "jedes Semester"},
     * message = "Bitte geben Sie eine korrekte Haeufigkeit an!"
     * )
     */
    protected $Haeufigkeit;

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    protected $Dauer;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $Lehrveranstaltungen;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Die Kontaktzeit Vorlesung muss mindestens {{ limit }} Stunden betragen."
     * )
     * TODO: Überprüfung auf Datentyp (Assert\Type funktioniert nicht, weil Umwandlung in NULL)
     */
    protected $KontaktzeitVL;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Die Kontaktzeit Sonstige muss mindestens {{ limit }} Stunden betragen."
     * )
     * TODO: Überprüfung auf Datentyp (Assert\Type funktioniert nicht, weil Umwandlung in NULL)
     */
    protected $KontaktzeitSonstige;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Das Selbststudium muss mindestens {{ limit }} Stunden betragen."
     * )
     * TODO: Überprüfung auf Datentyp (Assert\Type funktioniert nicht, weil Umwandlung in NULL)
     */
    protected $Selbststudium;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Die Gruppengroesse muss mindestens {{ limit }} Studenten betragen."
     * )
     * TODO: Überprüfung auf Datentyp (Assert\Type funktioniert nicht, weil Umwandlung in NULL)
     */
    protected $Gruppengroesse;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $Lernergebnisse;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $Inhalte;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $Pruefungsformen;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $PruefungsformSonstiges;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\Choice(
     * choices = { "Deutsch", "Englisch" },
     * message = "Bitte geben Sie eine korrekte Sprache an!"
     * )
     */
    protected $Sprache;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $SpracheSonstiges;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $Autor;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $Literatur;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\Choice(
     * choices = { "3", "6", "9", "12", "15", "30"},
     * message = "Bitte geben Sie eine korrekte Anzahl an Leistungspunkten an!"
     * )
     */
    protected $Leistungspunkte;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $VoraussetzungLP;

    /**
     * @ORM\Column(type="text", nullable=false)
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
     * Set Modul_ID
     *
     * @param \integer $Modul_ID
     * @return VeranstaltungHistory
     */
    public function setModulID($id)
    {
        $this->Modul_ID = $id;

        return $this;
    }


    /**
     * Set Erstellungsdatum
     *
     * @param \DateTime $erstellungsdatum
     * @return VeranstaltungHistory
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
     * @return VeranstaltungHistory
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
     * @return VeranstaltungHistory
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
     * Set Kuerzel
     *
     * @param string $kuerzel
     * @return VeranstaltungHistory
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
     * @return VeranstaltungHistory
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
     * @return VeranstaltungHistory
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
     * @return VeranstaltungHistory
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
     * @return VeranstaltungHistory
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
     * @return VeranstaltungHistory
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
     * @return VeranstaltungHistory
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
     * Get PruefungsformenSonstiges
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
     * Get Sprache
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->Autor;
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
     * Get SpracheSonstiges
     *
     * @return string
     */
    public function getSpracheSonstiges()
    {
        return $this->SpracheSonstiges;
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

}
