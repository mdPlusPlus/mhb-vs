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
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Semesterplan")
 * @ORM\HasLifecycleCallbacks
 */

class Semesterplan
{

    public function __toString()
    {
        //TODO $Semester richtig? getter?
        $string = (string) $this->getSemester();

        return $string;
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Semesterplan_ID;

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
     *      max = 5,
     *      minMessage = "Ein Modul braucht mindestens {{ limit }} Übungsgruppen",
     *      maxMessage = "Ein Modul darf nicht mehr als {{ limit }} Übungsgruppen haben"
     * )
     */
    protected $AnzahlUebungsgruppen;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 30,
     *      minMessage = "Eine Übungsgruppe muss aus mindestens {{ limit }} Studenten bestehen",
     *      maxMessage = "Eine Übungsgruppe darf aus nicht mehr als {{ limit }} Studenten bestehen"
     * )
     * TODO: Welche Übungsgruppengröße sinnvoll?
     */
    protected $GroesseUebungsgruppen;

    /**
     * Abhaengigkeiten
     */

    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID", nullable=false)
     */
    protected $veranstaltung;


    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="dozent", referencedColumnName="Dozenten_ID", nullable=false)
     */
    protected $dozent;

    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="semester", referencedColumnName="Semester", nullable=false)
     * */
    protected $semester;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getSemesterplan_ID()
    {
        return $this->Semesterplan_ID;
    }

    /**
     * Set sws_uebung
     *
     * @param integer $swsUebung
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
        return $this->swsUebung;
    }

    /**
     * Set sws_vorlesung
     *
     * @param integer $swsVorlesung
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
     * @return Semesterplan
     */
    public function setAnzahlUebungsgruppen($anzahlUebungsgruppen)
    {
        $this->anzahlUebungsgruppen = $anzahlUebungsgruppen;
    
        return $this;
    }

    /**
     * Get anzahl_uebungsgruppen
     *
     * @return integer 
     */
    public function getAnzahlUebungsgruppen()
    {
        return $this->anzahlUebungsgruppen;
    }

    /**
     * Set groesse_uebungsgruppen
     *
     * @param integer $groesseUebungsgruppen
     * @return Semesterplan
     */
    public function setGroesseUebungsgruppen($groesseUebungsgruppen)
    {
        $this->groesseUebungsgruppen = $groesseUebungsgruppen;
    
        return $this;
    }

    /**
     * Get groesse_uebungsgruppen
     *
     * @return integer 
     */
    public function getGroesseUebungsgruppen()
    {
        return $this->groesseUebungsgruppen;
    }

    /**
     * Set module
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $module
     * @return Semesterplan
     */
    public function setVeranstaltung(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $module = null)
    {
        $this->veranstaltung = $module;
    
        return $this;
    }

    /**
     * Get module
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung 
     */
    public function getVeranstaltung()
    {
        return $this->veranstaltung;
    }

    /**
     * Set lehrender
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrender
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
}
