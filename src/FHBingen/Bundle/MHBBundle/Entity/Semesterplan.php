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
        $string = (string)$this->getSemester();
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
     * min = 1,
     * max = 50,
     * minMessage = "You must be at least {{ limit }}cm tall to enter",
     * maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    protected $swsUebungen;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     * min = 1,
     * max = 50,
     * minMessage = "You must be at least {{ limit }}cm tall to enter",
     * maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    protected $swsVorlesung;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     * min = 1,
     * max = 50,
     * minMessage = "You must be at least {{ limit }}cm tall to enter",
     * maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    protected $anzahlUebungsgruppen;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     * min = 1,
     * max = 50,
     * minMessage = "You must be at least {{ limit }}cm tall to enter",
     * maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    protected $groesseUebungsgruppen;

    /**
     * Abhaengigkeiten
     */

    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="modul_id", referencedColumnName="Modul_ID", nullable=false)
     * */
    protected $veranstaltung;


    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="dozent_id", referencedColumnName="Dozenten_ID", nullable=false)
     * */
    protected $dozent;

    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="semester", referencedColumnName="semester", nullable=false)
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
    public function setSwsUebungen($swsUebung)
    {
        $this->swsUebungen = $swsUebung;
    
        return $this;
    }

    /**
     * Get sws_uebung
     *
     * @return integer 
     */
    public function getSwsUebungen()
    {
        return $this->swsUebungen;
    }

    /**
     * Set sws_vorlesung
     *
     * @param integer $swsVorlesung
     * @return Semesterplan
     */
    public function setSwsVorlesung($swsVorlesung)
    {
        $this->swsVorlesung = $swsVorlesung;
    
        return $this;
    }

    /**
     * Get sws_vorlesung
     *
     * @return integer 
     */
    public function getSwsVorlesung()
    {
        return $this->swsVorlesung;
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
