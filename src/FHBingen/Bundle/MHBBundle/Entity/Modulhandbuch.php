<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:25
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Studiengang
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Modulhandbuch")
 * @ORM\HasLifecycleCallbacks
 */

class Modulhandbuch
{

    public function __toString()
    {
        //TODO $Semester richtig? getter?
        $string =(string) $this->getGehoertZu().' '.$this->getVersionsnummer();
        return $string;
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\ID
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $MHB_ID;

    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $versionsnummer;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @Assert\Date()
     */
    protected $erstellungsdatum;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $beschreibung;

    /**
     * Get MHB_ID
     *
     * @return integer 
     */
    public function getMHBID()
    {
        return $this->MHB_ID;
    }

    /**
     * Set MHB_Versionsnummer
     *
     * @param integer $mHBVersionsnummer
     * @return Modulhandbuch
     */
    public function setVersionsnummer($mHBVersionsnummer)
    {
        $this->versionsnummer = $mHBVersionsnummer;
    
        return $this;
    }

    /**
     * Get MHB_Versionsnummer
     *
     * @return integer 
     */
    public function getVersionsnummer()
    {
        return $this->versionsnummer;
    }

    /**
     * Set Erstellungsdatum
     *
     * @param \DateTime $erstellungsdatum
     * @return Modulhandbuch
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
     * Set Beschreibung
     *
     * @param string $beschreibung
     * @return Modulhandbuch
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    
        return $this;
    }

    /**
     * Get Beschreibung
     *
     * @return string 
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }


    /*Abhaengigkeiten*/

    /*Angebot*/

    /**
     * @ORM\OneToMany(targetEntity="Angebot", mappedBy="mhb", cascade={"all"})
     * */
    protected $angebot;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->angebot = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add angebot
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot
     * @return Modulhandbuch
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


    /*Modulhandbuch/Semester*/

    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="gueltigAbSemester")
     * @ORM\JoinColumn(name="gueltig_ab", referencedColumnName="Semester")
     */
    protected $gueltigAb;

    /*Modulhandbuch/Studiengang*/

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="studiengang")
     * @ORM\JoinColumn(name="gehoert_zu", referencedColumnName="Studiengang_ID")
     */
    protected $gehoertZu;

    /**
     * Set gueltig_ab
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semester $gueltigAb
     * @return Modulhandbuch
     */
    public function setGueltigAb(\FHBingen\Bundle\MHBBundle\Entity\Semester $gueltigAb = null)
    {
        $this->gueltigAb = $gueltigAb;
    
        return $this;
    }

    /**
     * Get gueltig_ab
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Semester 
     */
    public function getGueltigAb()
    {
        return $this->gueltigAb;
    }

    /**
     * Set gehoert_zu
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studiengang $gehoertZu
     * @return Modulhandbuch
     */
    public function setGehoertZu(\FHBingen\Bundle\MHBBundle\Entity\Studiengang $gehoertZu = null)
    {
        $this->gehoertZu = $gehoertZu;
    
        return $this;
    }

    /**
     * Get gehoert_zu
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Studiengang 
     */
    public function getGehoertZu()
    {
        return $this->gehoertZu;
    }
}
