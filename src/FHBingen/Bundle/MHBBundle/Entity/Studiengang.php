<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:18
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Studiengang
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @UniqueEntity(fields="Titel", message="Dieser Studiengang/Kuerzel ist bereits in die Datenbank eingepflegt worden.")
 * @ORM\Table(name="Studiengang")
 * @ORM\HasLifecycleCallbacks
 */

class Studiengang
{
    public function __toString()
    {
        $string = $this->getGrad().' '.$this->getTitel();
        return $string;
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\ID
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Studiengang_ID;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\Range(
     * min = 1,
     * max = 2,
     * minMessage = "Fachbereich {{ limit }} ist Minimum",
     * maxMessage = "Fachbereich {{ limit }} ist Maximum"
     * )
     */
    protected $fachbereich;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     * @Assert\Choice(choices = {"Bachelor", "Master"}, message = "Waehlen Sie einen gueltigen Bildungsgrad")
     */
    protected $grad;

    /**
     * @ORM\Column(type="string", length=40, nullable=false, unique=true)
     * @Assert\Length(
     * min= 8,
     * minMessage="Ein Studiengang-Titel muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     */
    protected $titel;
    /**
     * @ORM\Column(type="string", length=5, nullable=false, unique=true)
     * @Assert\Length(
     * min= 2,
     * max= 5,
     * minMessage="Ein Studiengangs-Kuerzel muss aus mindestens {{ limit }} Zeichen bestehen.",
     * maxMessage="Ein Studiengangs-Kuerzel darf aus maximal {{ limit }} Zeichen bestehen."
     * )
     */
    protected $kuerzel;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $beschreibung;

    /**
     * Get Studiengang_ID
     *
     * @return integer 
     */
    public function getStudiengangID()
    {
        return $this->Studiengang_ID;
    }

    /**
     * Set Fachbereich
     *
     * @param integer $fachbereich
     * @return Studiengang
     */
    public function setFachbereich($fachbereich)
    {
        $this->fachbereich = $fachbereich;
    
        return $this;
    }

    /**
     * Get Fachbereich
     *
     * @return integer 
     */
    public function getFachbereich()
    {
        return $this->fachbereich;
    }

    /**
     * Set Grad
     *
     * @param string $grad
     * @return Studiengang
     */
    public function setGrad($grad)
    {
        $this->grad = $grad;
    
        return $this;
    }

    /**
     * Get Grad
     *
     * @return string 
     */
    public function getGrad()
    {
        return $this->grad;
    }

    /**
     * Set Titel
     *
     * @param string $titel
     * @return Studiengang
     */
    public function setTitel($titel)
    {
        $this->titel = $titel;
    
        return $this;
    }

    /**
     * Get Titel
     *
     * @return string 
     */
        public function getTitel()
    {
        return $this->titel;
    }

    /**
     * Set Kuerzel
     *
     * @param string $kuerzel
     * @return Studiengang
     */
    public function setKuerzel($kuerzel)
    {
        $this->kuerzel = $kuerzel;
    
        return $this;
    }

    /**
     * Get Kuerzel
     *
     * @return string 
     */
    public function getKuerzel()
    {
        return $this->kuerzel;
    }

    /**
     * Set Beschreibung
     *
     * @param string $beschreibung
     * @return Studiengang
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
     * @return Studiengang
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



    /*Abhaengigkeiten*/

    /*Angebot*/

    /**
     * @ORM\OneToMany(targetEntity="Angebot", mappedBy="studiengang", cascade={"all"})
     * */
    protected $angebot;

    /*Vertiefungsrichtung*/

    /**
     * @ORM\OneToMany(targetEntity="Vertiefung", mappedBy="studiengang")
     */
    protected $richtung;

    /*Modulbeauftragter (Dozent/Modul)*/

    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="studiengang")
     * @ORM\JoinColumn(name="SGL", referencedColumnName="Dozenten_ID")
     */
    protected $sgl;

    /*Modulhandbuch/Studiengang*/

    /**
     * @ORM\OneToMany(targetEntity="Modulhandbuch", mappedBy="gehoertZu")
     */
    protected $studiengang;


    /*Fachgebiet/Studiengang*/

    /**
     * @ORM\OneToMany(targetEntity="Fachgebiet", mappedBy="studiengang")
     */
    protected $fachgebiete;


    /**
     * Add richtung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Vertiefung $richtung
     * @return Studiengang
     */
    public function addRichtung(\FHBingen\Bundle\MHBBundle\Entity\Vertiefung $richtung)
    {
        $this->richtung[] = $richtung;
    
        return $this;
    }

    /**
     * Remove richtung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Vertiefung $richtung
     */
    public function removeRichtung(\FHBingen\Bundle\MHBBundle\Entity\Vertiefung $richtung)
    {
        $this->richtung->removeElement($richtung);
    }

    /**
     * Get richtung
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRichtung()
    {
        return $this->richtung;
    }

    /**
     * Set sgl
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $sgl
     * @return Studiengang
     */
    public function setSgl(\FHBingen\Bundle\MHBBundle\Entity\Dozent $sgl)
    {
        $this->sgl = $sgl;
    
        return $this;
    }

    /**
     * Get sgl
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Dozent 
     */
    public function getSgl()
    {
        return $this->sgl;
    }

    /**
     * Add studiengang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $studiengang
     * @return Studiengang
     */
    public function addStudiengang(\FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $studiengang)
    {
        $this->studiengang[] = $studiengang;
    
        return $this;
    }

    /**
     * Remove studiengang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $studiengang
     */
    public function removeStudiengang(\FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $studiengang)
    {
        $this->studiengang->removeElement($studiengang);
    }

    /**
     * Get studiengang
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudiengang()
    {
        return $this->studiengang;
    }

    /**
     * Add fachgebiete
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiet
     * @return Studiengang
     */
    public function addFachgebiete(\FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiet)
    {
        $this->fachgebiete[] = $fachgebiet;
    
        return $this;
    }

    /**
     * Remove fachgebiet
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiet
     */
    public function removeFachgebiete(\FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiet)
    {
        $this->fachgebiete->removeElement($fachgebiet);
    }

    /**
     * Get fachgebiete
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFachgebiete()
    {
        return $this->fachgebiete;
    }

    /*Studienplan*/
    /**
     * @ORM\OneToMany(targetEntity="Studienplan", mappedBy="studiengang", cascade={"all"})
     * */
    protected $studienplanZuStudienplan;

    /**
     * Add studienplan_stgang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplanStgang
     * @return Studiengang
     */
    public function addStudienplanZuStudienplan(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplanStgang)
    {
        $this->studienplanZuStudienplan[] = $studienplanStgang;
    
        return $this;
    }

    /**
     * Remove studienplan_stgang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplanStgang
     */
    public function removeStudienplanZuStudienplan(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplanStgang)
    {
        $this->studienplanZuStudienplan->removeElement($studienplanStgang);
    }

    /**
     * Get studienplan_stgang
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudienplanZuStudienplan()
    {
        return $this->studienplanZuStudienplan;
    }
}
