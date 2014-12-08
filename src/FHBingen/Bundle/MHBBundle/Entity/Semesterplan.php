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
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="modul_id", referencedColumnName="Modul_ID")
     * */
    protected $module;


    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="dozent_id", referencedColumnName="Dozenten_ID")
     * */
    protected $lehrender;

    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="semesterplan")
     * @ORM\JoinColumn(name="semester", referencedColumnName="Semester")
     * */
    protected $semester;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     * min = 1,
     * max = 50,
     * minMessage = "You must be at least {{ limit }}cm tall to enter",
     * maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    protected $sws_uebung;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     * min = 1,
     * max = 50,
     * minMessage = "You must be at least {{ limit }}cm tall to enter",
     * maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    protected $sws_vorlesung;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     * min = 1,
     * max = 50,
     * minMessage = "You must be at least {{ limit }}cm tall to enter",
     * maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    protected $anzahl_uebungsgruppen;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     * min = 1,
     * max = 50,
     * minMessage = "You must be at least {{ limit }}cm tall to enter",
     * maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    protected $groesse_uebungsgruppen;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sws_uebung
     *
     * @param integer $swsUebung
     * @return Semesterplan
     */
    public function setSwsUebung($swsUebung)
    {
        $this->sws_uebung = $swsUebung;
    
        return $this;
    }

    /**
     * Get sws_uebung
     *
     * @return integer 
     */
    public function getSwsUebung()
    {
        return $this->sws_uebung;
    }

    /**
     * Set sws_vorlesung
     *
     * @param integer $swsVorlesung
     * @return Semesterplan
     */
    public function setSwsVorlesung($swsVorlesung)
    {
        $this->sws_vorlesung = $swsVorlesung;
    
        return $this;
    }

    /**
     * Get sws_vorlesung
     *
     * @return integer 
     */
    public function getSwsVorlesung()
    {
        return $this->sws_vorlesung;
    }

    /**
     * Set anzahl_uebungsgruppen
     *
     * @param integer $anzahlUebungsgruppen
     * @return Semesterplan
     */
    public function setAnzahlUebungsgruppen($anzahlUebungsgruppen)
    {
        $this->anzahl_uebungsgruppen = $anzahlUebungsgruppen;
    
        return $this;
    }

    /**
     * Get anzahl_uebungsgruppen
     *
     * @return integer 
     */
    public function getAnzahlUebungsgruppen()
    {
        return $this->anzahl_uebungsgruppen;
    }

    /**
     * Set groesse_uebungsgruppen
     *
     * @param integer $groesseUebungsgruppen
     * @return Semesterplan
     */
    public function setGroesseUebungsgruppen($groesseUebungsgruppen)
    {
        $this->groesse_uebungsgruppen = $groesseUebungsgruppen;
    
        return $this;
    }

    /**
     * Get groesse_uebungsgruppen
     *
     * @return integer 
     */
    public function getGroesseUebungsgruppen()
    {
        return $this->groesse_uebungsgruppen;
    }

    /**
     * Set module
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $module
     * @return Semesterplan
     */
    public function setModule(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $module = null)
    {
        $this->module = $module;
    
        return $this;
    }

    /**
     * Get module
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung 
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set lehrender
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrender
     * @return Semesterplan
     */
    public function setLehrender(\FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrender = null)
    {
        $this->lehrender = $lehrender;
    
        return $this;
    }

    /**
     * Get lehrender
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Dozent 
     */
    public function getLehrender()
    {
        return $this->lehrender;
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
