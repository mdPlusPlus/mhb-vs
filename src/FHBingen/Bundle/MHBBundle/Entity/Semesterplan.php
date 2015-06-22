<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 18:42
 */
namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Semesterplan
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Semesterplan")
 * @ORM\HasLifecycleCallbacks
 */
class Semesterplan
{
    /**
     * @return string
     */
    public function __toString()
    {
        //TODO $Semester richtig? getter?
        $string = (string) $this->getSemester();

        return $string;
    }

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 10,
     *      minMessage = "Ein Modul braucht mindestens {{ limit }} SWS Übung",
     *      maxMessage = "Ein Modul darf nicht mehr als {{ limit }} SWS Übung haben"
     * )
     */
    protected $SWSUebung;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 10,
     *      minMessage = "Ein Modul braucht mindestens {{ limit }} SWS Vorlesung",
     *      maxMessage = "Ein Modul darf nicht mehr als {{ limit }} SWS Vorlesung haben"
     * )
     */
    protected $SWSVorlesung;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Ein Modul braucht mindestens {{ limit }} Übungsgruppen",
     * )
     */
    protected $AnzahlUebungsgruppen;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Eine Übungsgruppe muss aus mindestens {{ limit }} Studenten bestehen",
     * )
     */
    protected $GroesseUebungsgruppen;


    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $istLehrbeauftragter;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $findetStatt;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Angebot", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="angebot", referencedColumnName="Angebots_ID", nullable=false)
     */
    protected $angebot;

    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="dozent", referencedColumnName="Dozenten_ID", nullable=false)
     */
    protected $dozent;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="semester", referencedColumnName="Semester", nullable=false)
     * */
    protected $semester;


    /**
     * Set sws_uebung
     *
     * @param integer $swsUebung
     *
     * @return Semesterplan
     */
    public function setSWSUebung($swsUebung)
    {
        $this->SWSUebung = $swsUebung;

        return $this;
    }

    /**
     * Get sws_uebung
     *
     * @return integer 
     */
    public function getSWSUebung()
    {
        return $this->SWSUebung;
    }

    /**
     * Set sws_vorlesung
     *
     * @param integer $swsVorlesung
     *
     * @return Semesterplan
     */
    public function setSWSVorlesung($swsVorlesung)
    {
        $this->SWSVorlesung = $swsVorlesung;

        return $this;
    }

    /**
     * Get sws_vorlesung
     *
     * @return integer 
     */
    public function getSWSVorlesung()
    {
        return $this->SWSVorlesung;
    }

    /**
     * Set anzahl_uebungsgruppen
     *
     * @param integer $anzahlUebungsgruppen
     *
     * @return Semesterplan
     */
    public function setAnzahlUebungsgruppen($anzahlUebungsgruppen)
    {
        $this->AnzahlUebungsgruppen = $anzahlUebungsgruppen;

        return $this;
    }

    /**
     * Get anzahl_uebungsgruppen
     *
     * @return integer 
     */
    public function getAnzahlUebungsgruppen()
    {
        return $this->AnzahlUebungsgruppen;
    }

    /**
     * Set groesse_uebungsgruppen
     *
     * @param integer $groesseUebungsgruppen
     *
     * @return Semesterplan
     */
    public function setGroesseUebungsgruppen($groesseUebungsgruppen)
    {
        $this->GroesseUebungsgruppen = $groesseUebungsgruppen;

        return $this;
    }

    /**
     * Get groesse_uebungsgruppen
     *
     * @return integer 
     */
    public function getGroesseUebungsgruppen()
    {
        return $this->GroesseUebungsgruppen;
    }

    /**
     * Set lehrender
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrender
     *
     * @return Semesterplan
     */
    public function setDozent(\FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrender = null)
    {
        $this->dozent = $lehrender;

        return $this;
    }

    /**
     * Get lehrender
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Dozent 
     */
    public function getDozent()
    {
        return $this->dozent;
    }

    /**
     * Set semester
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semester $semester
     *
     * @return Semesterplan
     */
    public function setSemester(\FHBingen\Bundle\MHBBundle\Entity\Semester $semester = null)
    {
        $this->semester = $semester;

        return $this;
    }

    /**
     * Get semester
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Semester 
     */
    public function getSemester()
    {
        return $this->semester;
    }


    /**
     * Set istLehrbeauftragter
     *
     * @param boolean $istLehrbeauftragter
     *
     * @return Semesterplan
     */
    public function setIstLehrbeauftragter($istLehrbeauftragter)
    {
        $this->istLehrbeauftragter = $istLehrbeauftragter;

        return $this;
    }

    /**
     * Get istLehrbeauftragter
     *
     * @return boolean 
     */
    public function getIstLehrbeauftragter()
    {
        return $this->istLehrbeauftragter;
    }

    /**
     * Set findetStatt
     *
     * @param boolean $findetStatt
     *
     * @return Semesterplan
     */
    public function setFindetStatt($findetStatt)
    {
        $this->findetStatt = $findetStatt;

        return $this;
    }

    /**
     * Get findetStatt
     *
     * @return boolean 
     */
    public function getFindetStatt()
    {
        return $this->findetStatt;
    }

    /**
     * Set angebot
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot
     *
     * @return Semesterplan
     */
    public function setAngebot(\FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot)
    {
        $this->angebot = $angebot;

        return $this;
    }

    /**
     * Get angebot
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Angebot 
     */
    public function getAngebot()
    {
        return $this->angebot;
    }
}
