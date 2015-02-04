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
 * @ORM\Table(name="Vertiefung")
 * @ORM\HasLifecycleCallbacks
 */

class Vertiefung
{

    public function __toString()
    {
        $string =(string) $this->getName();

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
     * @Assert\NotBlank(message = "Ein Vertiefungsrichtungstitel darf nicht leer sein.")
     * @Assert\Length(
     *      min = 4,
     *      minMessage = "Ein Vertiefungsrichtungstitel darf aus maximal {{ limit }} Zeichen bestehen.",
     *      max = 30,
     *      maxMessage = "Ein Vertiefungsrichtungstitel darf aus maximal {{ limit }} Zeichen bestehen."
     * )
     * @Assert\Regex(
     *     pattern = "/[A-ZÄÖÜa-zäöüß \-]{4,30}/",
     *     message = "Ein Vertiefungsrichtungstitel darf nur aus Buchstaben, Leerzeichen und Bindestrichen bestehen."
     * )
     */
    protected $Name;

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
    public function setName($name)
    {
        $this->Name = $name;
    
        return $this;
    }

    /**
     * Get Vertiefungsrichtung
     *
     * @return string 
     */
    public function getName()
    {
        return $this->Name;
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
     * @ORM\JoinColumn(name="studiengang", referencedColumnName="Studiengang_ID", nullable=false)
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
