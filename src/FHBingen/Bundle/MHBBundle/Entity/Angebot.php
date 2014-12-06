<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 19:22
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="angebot")
     * @ORM\JoinColumn(name="modul_id", referencedColumnName="Modul_ID")
     * */
    protected $module;


    /**
     * @ORM\ManyToOne(targetEntity="Modulhandbuch", inversedBy="angebot")
     * @ORM\JoinColumn(name="mhb_id", referencedColumnName="MHB_ID")
     * */
    protected $mhb;

    /**
     * @ORM\ManyToOne(targetEntity="Fachgebiet", inversedBy="angebot")
     * @ORM\JoinColumn(name="fachgebiet_id", referencedColumnName="Fachgebiets_ID")
     * */
    protected $fachgebiet;

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="angebot")
     * @ORM\JoinColumn(name="studiengang_id", referencedColumnName="Studiengang_ID")
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
     */
    protected	$Code;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected	$abweichender_Titel_DE;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected	$abweichender_Titel_EN;

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
     * Set module
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $module
     * @return Angebot
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
     * Set mhb
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $mhb
     * @return Angebot
     */
    public function setMhb(\FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $mhb = null)
    {
        $this->mhb = $mhb;
    
        return $this;
    }

    /**
     * Get mhb
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch 
     */
    public function getMhb()
    {
        return $this->mhb;
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
}
