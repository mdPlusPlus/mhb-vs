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
        //TODO richtig? getter?
        $string = (string) $this->getGehoertZu().' '.$this->getVersionsnummer();

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
    protected $Versionsnummer;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @Assert\Date()
     */
    protected $Erstellungsdatum;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank(message = "Die Modulhandbuchbeschreibung darf nicht leer sein.")
     */
    protected $Beschreibung;

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
        $this->Versionsnummer = $mHBVersionsnummer;
    
        return $this;
    }

    /**
     * Get MHB_Versionsnummer
     *
     * @return integer 
     */
    public function getVersionsnummer()
    {
        return $this->Versionsnummer;
    }

    /**
     * Set Erstellungsdatum
     *
     * @param \DateTime $erstellungsdatum
     * @return Modulhandbuch
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
     * Set Beschreibung
     *
     * @param string $beschreibung
     * @return Modulhandbuch
     */
    public function setBeschreibung($beschreibung)
    {
        $this->Beschreibung = $beschreibung;
    
        return $this;
    }

    /**
     * Get Beschreibung
     *
     * @return string 
     */
    public function getBeschreibung()
    {
        return $this->Beschreibung;
    }

    /*Abhaengigkeiten*/

    /*Angebot*/

    /**
     * @ORM\OneToMany(targetEntity="ModulhandbuchZuweisung" , mappedBy="mhb" , cascade={"all"})
     */
    private $zuweisung;

    /*Modulhandbuch/Semester*/

    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="gueltigAbSemester")
     * @ORM\JoinColumn(name="gueltigAb", referencedColumnName="Semester", nullable=false)
     */
    protected $gueltigAb;

    /*Modulhandbuch/Studiengang*/

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="studiengang")
     * @ORM\JoinColumn(name="gehoertZu", referencedColumnName="Studiengang_ID", nullable=false)
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

    /**
     * Add zuweisung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\ModulhandbuchZuweisung $zuweisung
     * @return Modulhandbuch
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
}
