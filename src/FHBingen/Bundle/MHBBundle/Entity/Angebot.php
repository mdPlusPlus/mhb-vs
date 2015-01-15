<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 19:22
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FHBingen\Bundle\MHBBundle\PHP\ModulBeschreibung;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Angebot
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Angebot")
 * @ORM\HasLifecycleCallbacks
 */

class Angebot
{

    public function __toString()
    {
        $string = (string) $this->getVeranstaltung();

        return $string;
    }


    /**
     * @ORM\OneToMany(targetEntity="ModulhandbuchZuweisung", mappedBy="angebot", cascade={"all"})
     */
    private $zuweisung;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Angebots_ID;


    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="angebot")
     * @ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID", nullable=false)
     * */
    protected $veranstaltung;

    /**
     * @ORM\ManyToOne(targetEntity="Fachgebiet", inversedBy="angebot")
     * @ORM\JoinColumn(name="fachgebiet", referencedColumnName="Fachgebiets_ID", nullable=false)
     * */
    protected $fachgebiet;

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="angebot")
     * @ORM\JoinColumn(name="studiengang", referencedColumnName="Studiengang_ID", nullable=false)
     * */
    protected $studiengang;


    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\Choice(
     * choices = { "Wahlpflichtfach", "Pflichtfach" },
     * message = "Bitte geben Sie eine korrekte Angebotsart an!"
     * )
     */
    protected	$Angebotsart;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\Length(
     *      min = 9,
     *      minMessage = "Der Modulcode muss genau {{ limit }} Zeichen lang sein.",
     *      max = 9,
     *      maxMessage="Der Modulcode muss genau {{ limit }} Zeichen lang sein."
     * )
     */
    protected	$Code;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     * @Assert\Length(
     *      max = 70,
     *      maxMessage = "Der abweichende deutsche Name darf maximal {{ limit }} Zeichen lang sein."
     * )
     */
    protected	$AbweichenderNameDE;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     * @Assert\Length(
     *      max = 70,
     *      maxMessage = "Der abweichende englische Name darf maximal {{ limit }} Zeichen lang sein."
     * )
     */
    protected	$AbweichenderNameEN;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->zuweisung = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getAngebots_ID()
    {
        return $this->Angebots_ID;
    }

    /**
     * Set module
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $module
     * @return Angebot
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
     * Set fachgebiet
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiet
     * @return Angebot
     */
    public function setFachgebiet(\FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiet = null)
    {
        $this->fachgebiet = $fachgebiet;
    
        return $this;
    }

    /**
     * Get fachgebiet
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Fachgebiet 
     */
    public function getFachgebiet()
    {
        return $this->fachgebiet;
    }

    /**
     * Set studiengang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang
     * @return Angebot
     */
    public function setStudiengang(\FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang = null)
    {
        $this->studiengang = $studiengang;
    
        return $this;
    }

    /**
     * Get studiengang
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Studiengang 
     */
    public function getStudiengang()
    {
        return $this->studiengang;
    }

    /**
     * Set Angebotsart
     *
     * @param string $angebotsart
     * @return Angebot
     */
    public function setAngebotsart($angebotsart)
    {
        $this->Angebotsart = $angebotsart;
    
        return $this;
    }

    /**
     * Get Angebotsart
     *
     * @return string 
     */
    public function getAngebotsart()
    {
        return $this->Angebotsart;
    }

    /**
     * Set Code
     *
     * @param string $code
     * @return Angebot
     */
    public function setCode($code)
    {
        $this->Code = $code;
    
        return $this;
    }

    /**
     * Get Code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * Set abweichender_Titel_DE
     *
     * @param string $abweichenderTitelDE
     * @return Angebot
     */
    public function setAbweichenderNameDE($abweichenderNameDE)
    {
        $this->AbweichenderNameDE = $abweichenderNameDE;
    
        return $this;
    }

    /**
     * Get abweichender_Titel_DE
     *
     * @return string 
     */
    public function getAbweichenderNameDE()
    {
        return $this->AbweichenderNameDE;
    }

    /**
     * Set abweichender_Titel_EN
     *
     * @param string $abweichenderTitelEN
     * @return Angebot
     */
    public function setAbweichenderNameEN($abweichenderNameEN)
    {
        $this->AbweichenderNameEN = $abweichenderNameEN;
    
        return $this;
    }

    /**
     * Get abweichender_Titel_EN
     *
     * @return string 
     */
    public function getAbweichenderNameEN()
    {
        return $this->AbweichenderNameEN;
    }

    /**
     * Get Angebots_ID
     *
     * @return integer 
     */
    public function getAngebotsID()
    {
        return $this->Angebots_ID;
    }

    /**
     * Add zuweisung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\ModulhandbuchZuweisung $zuweisung
     * @return Angebot
     */
    public function addZuweisung(\FHBingen\Bundle\MHBBundle\Entity\ModulhandbuchZuweisung $zuweisung)
    {
        $this->zuweisung[] = $zuweisung;

        return $this;
    }

    /**
     * Remove zuweisung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\ModulhandbuchZuweisung $zuweisung
     */
    public function removeZuweisung(\FHBingen\Bundle\MHBBundle\Entity\ModulhandbuchZuweisung $zuweisung)
    {
        $this->zuweisung->removeElement($zuweisung);
    }

    /**
     * Get zuweisung
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getZuweisung()
    {
        return $this->zuweisung;
    }

    /**
     * @return ModulBeschreibung
     */
//    public function getModulBeschreibung() {
//        $modulBeschreibung = new ModulBeschreibung();
//        $modulBeschreibung->setAngebot($this);
//
//        return $modulBeschreibung;
//    }
}
