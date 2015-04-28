<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:18
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Studiengang
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @UniqueEntity(fields="Titel", message="Es existiert bereits ein Studiengang mit diesem Titel.")
 * @UniqueEntity(fields="Kuerzel", message="Es existiert bereits ein Studiengang mit diesem Kürzel.")
 * @UniqueEntity(fields="sgl", message="Es existiert bereits ein Studiengang mit diesem Studiengangleiter.")
 * @ORM\Table(name="Studiengang")
 */
class Studiengang
{
    /**
     * @return string
     */
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
     *      min = 1,
     *      max = 2,
     *      minMessage = "Fachbereich {{ limit }} ist Minimum",
     *      maxMessage = "Fachbereich {{ limit }} ist Maximum"
     * )
     */
    protected $Fachbereich;

    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     * @Assert\Choice(choices = {"Bachelor", "Master"}, message = "Wählen Sie einen gültigen Bildungsgrad")
     */
    protected $Grad;

    /**
     * @ORM\Column(type="string", length=40, nullable=false, unique=true)
     * @Assert\NotBlank(message = "Der Studiengang-Titel darf nicht leer sein.")
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Ein Studiengang-Titel muss aus mindestens {{ limit }} Zeichen bestehen.",
     *      max = 40,
     *      maxMessage = "Ein Studiengang-Titel darf aus maximal {{ limit }} Zeichen bestehen."
     * )
     * @Assert\Regex(
     *     pattern = "/[A-ZÄÖÜa-zäöüß \-]{2,40}/",
     *     message = "Der Studiengang-Titel darf nur aus Buchstaben, Leerzeichen und Bindestrichen bestehen."
     * )
     */
    protected $Titel;

    /**
     * @ORM\Column(type="string", length=5, nullable=false, unique=true)
     * @Assert\NotBlank(message = "Das Studiengang-Kürzel darf nicht leer sein.")
     * @Assert\Length(
     *      min = 2,
     *      max = 5,
     *      minMessage = "Ein Studiengang-Kürzel muss aus mindestens {{ limit }} Zeichen bestehen.",
     *      maxMessage = "Ein Studiengang-Kürzel darf aus maximal {{ limit }} Zeichen bestehen."
     * )
     * @Assert\Regex(
     *     pattern = "/[BM]\-[A-Z]{2,2}/",
     *     message = "Bitte verwenden Sie folgendes Muster für das Studiengangkürzel: z.B. B-IN, M-IS"
     * )
     */
    protected $Kuerzel;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank(message = "Die Studiengang-Beschreibung darf nicht leer sein.")
     */
    protected $Beschreibung;

    /**
     * @ORM\OneToMany(targetEntity="Angebot", mappedBy="studiengang", cascade={"all"})
     * */
    protected $angebot;

    /**
     * @ORM\OneToMany(targetEntity="Vertiefung", mappedBy="studiengang")
     */
    protected $richtung; //warum nicht '$vertiefungsrichtung'?

    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="studiengang")
     * @ORM\JoinColumn(name="sgl", referencedColumnName="Dozenten_ID", nullable=false, unique=true)
     */
    protected $sgl;

    /**
     * @ORM\OneToMany(targetEntity="Modulhandbuch", mappedBy="gehoertZu")
     */
    protected $modulhandbuch; //sind eigentlich die MHB, wer hat den Scheiß verbockt?

    /**
     * @ORM\OneToMany(targetEntity="Fachgebiet", mappedBy="studiengang")
     * @Assert\Count(
     *      min = "1",
     *      minMessage = "Sie müssen mindestens ein Fachgebiet anlegen"
     * )
     */
    protected $fachgebiete; //sollte das nicht Singular 'fachgebiet' sein?

    /**
     * @ORM\OneToMany(targetEntity="Studienplan", mappedBy="studiengang", cascade={"all"})
     */
    protected $studienplan;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->angebot       = new ArrayCollection();
        $this->fachgebiete   = new ArrayCollection();
        $this->richtung      = new ArrayCollection();
        $this->modulhandbuch = new ArrayCollection();
        $this->studienplan   = new ArrayCollection();
    }

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
        $this->Fachbereich = $fachbereich;

        return $this;
    }

    /**
     * Get Fachbereich
     *
     * @return integer 
     */
    public function getFachbereich()
    {
        return $this->Fachbereich;
    }

    /**
     * Set Grad
     *
     * @param string $grad
     * @return Studiengang
     */
    public function setGrad($grad)
    {
        $this->Grad = $grad;

        return $this;
    }

    /**
     * Get Grad
     *
     * @return string 
     */
    public function getGrad()
    {
        return $this->Grad;
    }

    /**
     * Set Titel
     *
     * @param string $titel
     * @return Studiengang
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
     * Set Kuerzel
     *
     * @param string $kuerzel
     * @return Studiengang
     */
    public function setKuerzel($kuerzel)
    {
        $this->Kuerzel = $kuerzel;

        return $this;
    }

    /**
     * Get Kuerzel
     *
     * @return string 
     */
    public function getKuerzel()
    {
        return $this->Kuerzel;
    }

    /**
     * Set Beschreibung
     *
     * @param string $beschreibung
     * @return Studiengang
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
     * Add modulhandbuch
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $modulhandbuch
     * @return Studiengang
     */
    public function addModulhandbuch(\FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $modulhandbuch)
    {
        $this->modulhandbuch[] = $modulhandbuch;

        return $this;
    }

    /**
     * Remove modulhandbuch
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $modulhandbuch
     */
    public function removeModulhandbuch(\FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $modulhandbuch)
    {
        $this->modulhandbuch->removeElement($modulhandbuch);
    }

    /**
     * Get modulhandbuch
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModulhandbuch()
    {
        return $this->modulhandbuch;
    }

    /**
     * Add fachgebiete
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiete
     * @return Studiengang
     */
    public function addFachgebiete(\FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiete)
    {
        $this->fachgebiete[] = $fachgebiete;

        return $this;
    }

    /**
     * Remove fachgebiete
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiete
     */
    public function removeFachgebiete(\FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiete)
    {
        $this->fachgebiete->removeElement($fachgebiete);
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

    /**
     * Add studienplan
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplan
     * @return Studiengang
     */
    public function addStudienplan(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplan)
    {
        $this->studienplan[] = $studienplan;

        return $this;
    }

    /**
     * Remove studienplan
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplan
     */
    public function removeStudienplan(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $studienplan)
    {
        $this->studienplan->removeElement($studienplan);
    }

    /**
     * Get studienplan
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudienplan()
    {
        return $this->studienplan;
    }
}
