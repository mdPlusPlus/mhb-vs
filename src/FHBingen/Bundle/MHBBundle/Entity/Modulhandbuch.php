<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:25
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Studiengang
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Modulhandbuch")
 * @ORM\HasLifecycleCallbacks
 */

class Modulhandbuch
{

    /**
     * @return string
     */
    public function __toString()
    {
        //TODO richtig? getter?
        $string = (string) $this->getGehoertZu().' '.$this->getVersionsnummer();

        return $string;
    }

    /**
     * @return string
     */
    public function getMhbTitel()
    {
        return 'MHB_' . $this->getGehoertZu()->getKuerzel() . '_' . $this->getGueltigAb() . '_V' . $this->getVersionsnummer();
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
     * @ORM\Column(type="datetime", nullable=false)
     * @Assert\DateTime()
     */
    protected $Erstellungsdatum;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $Autor;


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
     * Set Versionsnummer
     *
     * @param integer $mhbVersionsnummer
     *
     * @return Modulhandbuch
     */
    public function setVersionsnummer($mhbVersionsnummer)
    {
        $this->Versionsnummer = $mhbVersionsnummer;
    
        return $this;
    }

    /**
     * Get Versionsnummer
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
     *
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

    /*Modulhandbuch/Semester*/

    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="gueltigAbSemester")
     * @ORM\JoinColumn(name="gueltigAb", referencedColumnName="Semester", nullable=false)
     */
    protected $gueltigAb;

    /*Modulhandbuch/Studiengang*/

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="modulhandbuch")
     * @ORM\JoinColumn(name="gehoertZu", referencedColumnName="Studiengang_ID", nullable=false)
     */
    protected $gehoertZu;

    /**
     * Set gueltig_ab
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semester $gueltigAb
     *
     * @return Modulhandbuch
     */
    public function setGueltigAb(\FHBingen\Bundle\MHBBundle\Entity\Semester $gueltigAb)
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
     *
     * @return Modulhandbuch
     */
    public function setGehoertZu(\FHBingen\Bundle\MHBBundle\Entity\Studiengang $gehoertZu)
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

    public function getAutor()
    {
     return $this->Autor;
    }

    public function setAutor($autor)
    {
        $this->Autor = $autor;

        return $this;
    }
}
