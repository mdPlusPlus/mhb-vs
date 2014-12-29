<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:23
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Studiengang
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @UniqueEntity(fields="Vertiefungsrichtung", message="Diese Vertiefungsrichtung wurde bereits in die Datenbank eingetragen.")
 * @ORM\Table(name="Vertiefung")
 * @ORM\HasLifecycleCallbacks
 */

class Vertiefung
{

    public function __toString()
    {
        $string =(string) $this->getVertiefungsrichtung();
        return $string;
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\ID;
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Vertiefung_ID;

    /**
     * @ORM\Column(type="string", length=30, unique=true, nullable=false)
     * @Assert\Length(
     * min= 8,
     * minMessage="Ein Vertiefungsrichtungstitel muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     */
    protected $vertiefungsrichtung;

    /**
     * Get Vertiefungs_ID
     *
     * @return integer 
     */
    public function getVertiefungID()
    {
        return $this->Vertiefung_ID;
    }

    /**
     * Set Vertiefungsrichtung
     *
     * @param string $vertiefungsrichtung
     * @return Vertiefung
     */
    public function setVertiefungsrichtung($vertiefungsrichtung)
    {
        $this->vertiefungsrichtung = $vertiefungsrichtung;
    
        return $this;
    }

    /**
     * Get Vertiefungsrichtung
     *
     * @return string 
     */
    public function getVertiefungsrichtung()
    {
        return $this->vertiefungsrichtung;
    }




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vertiefung = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vertiefung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Kernfach $vertiefung
     * @return Vertiefung
     */
    public function addVertiefung(\FHBingen\Bundle\MHBBundle\Entity\Kernfach $vertiefung)
    {
        $this->vertiefung[] = $vertiefung;
    
        return $this;
    }

    /**
     * Remove vertiefung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Kernfach $vertiefung
     */
    public function removeVertiefung(\FHBingen\Bundle\MHBBundle\Entity\Kernfach $vertiefung)
    {
        $this->vertiefung->removeElement($vertiefung);
    }

    /**
     * Get vertiefung
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVertiefung()
    {
        return $this->vertiefung;
    }

    /*Abhaengigkeiten*/

    /*Kernfach*/
    /**
     * @ORM\OneToMany(targetEntity="Kernfach", mappedBy="vertiefung", cascade={"all"})
     * */
    protected   $vertiefung;


    /*Vertiefungsrichtung/Studiengang*/

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="richtung")
     * @ORM\JoinColumn(name="studiengang_id", referencedColumnName="Studiengang_ID", nullable=false)
     * @ORM\OrderBy({"titel" = "ASC"})
     */
    protected $studiengang;

    /**
     * Set stgang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studiengang $stgang
     * @return Vertiefung
     */
    public function setStudiengang(\FHBingen\Bundle\MHBBundle\Entity\Studiengang $stgang = null)
    {
        $this->studiengang = $stgang;
    
        return $this;
    }

    /**
     * Get stgang
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Studiengang 
     */
    public function getStudiengang()
    {
        return $this->studiengang;
    }
}
