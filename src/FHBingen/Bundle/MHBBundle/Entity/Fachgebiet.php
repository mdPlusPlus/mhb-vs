<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:04
 */
namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Fachgebiet
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Fachgebiet")
 * @ORM\HasLifecycleCallbacks
 */

class Fachgebiet
{
    /**
     * @return string
     */
    public function __toString()
    {
        $string = $this->getTitel();

        return $string;
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\ID
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Fachgebiets_ID;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Assert\NotBlank(message = "Der Fachgebietstitel darf nicht leer sein.")
     * @Assert\Length(
     *      min = 4,
     *      minMessage = "Der Fachgebietstitel muss aus mindestens {{ limit }} Zeichen bestehen.",
     *      max = 50,
     *      maxMessage = "Der Fachgebietstitel darf aus maximal {{ limit }} Zeichen bestehen."
     * )
     * @Assert\Regex(
     *     pattern = "/[A-ZÄÖÜa-zäöüß \-]{4,50}/",
     *     message = "Der Fachgebietstitel darf nur aus Buchstaben, Leerzeichen und Bindestrichen bestehen."
     * )
     */
    protected $Titel;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     * @Assert\Regex(
     *     pattern="/[A-Z]{2,2}/",
     *     match=true,
     *     message="Das Fachgebietskürzel (Pflichtfach) darf nur aus zwei Großbuchstaben (A-Z) bestehen."
     * )
     */
    protected $KuerzelP;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     * @Assert\Regex(
     *     pattern="/[A-Z]{2,2}/",
     *     match=true,
     *     message="Das Fachgebietskürzel (Wahlpflichfach) darf nur aus zwei Großbuchstaben (A-Z) bestehen."
     * )
     */
    protected $KuerzelWP;

    /**
     * @ORM\OneToMany(targetEntity="Angebot", mappedBy="fachgebiet", cascade={"all"})
     * */
    protected $angebot;

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="fachgebiete")
     * @ORM\JoinColumn(name="studiengang", referencedColumnName="Studiengang_ID", nullable=false)
     */
    protected $studiengang;

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
     *
     * @return Fachgebiet
     */
    public function addAngebot(\FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot)
    {
        $angebot->setFachgebiet($this);
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

    /**
     * Get Fachgebiets_ID
     *
     * @return integer 
     */
    public function getFachgebietsID()
    {
        return $this->Fachgebiets_ID;
    }

    /**
     * Set Titel
     *
     * @param string $titel
     *
     * @return Fachgebiet
     */
    public function setTitel($titel)
    {
        $this->Titel = $titel;

        return $this;
    }

    /**
     * Get Titel
     *
     * @return string 
     */
    public function getTitel()
    {
        return $this->Titel;
    }

    /**
     * Set KuerzelP
     *
     * @param string $kuerzelP
     *
     * @return Fachgebiet
     */
    public function setKuerzelP($kuerzelP)
    {
        $this->KuerzelP = $kuerzelP;

        return $this;
    }

    /**
     * Get KuerzelP
     *
     * @return string 
     */
    public function getKuerzelP()
    {
        return $this->KuerzelP;
    }

    /**
     * Set KuerzelWP
     *
     * @param string $kuerzelWP
     *
     * @return Fachgebiet
     */
    public function setKuerzelWP($kuerzelWP)
    {
        $this->KuerzelWP = $kuerzelWP;

        return $this;
    }

    /**
     * Get KuerzelWP
     *
     * @return string 
     */
    public function getKuerzelWP()
    {
        return $this->KuerzelWP;
    }

    /**
     * Set studiengang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang
     *
     * @return Fachgebiet
     */
    public function setStudiengang(\FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang)
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
