<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 19:22
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectManagerAware;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Angebot
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\EntityListeners({"FHBingen\Bundle\MHBBundle\EntityListener\AngebotListener"})
 * @UniqueEntity(fields="AbweichenderNameDE", ignoreNull=true, message="Es existiert bereits ein Angebot mit diesem studiengangspezifischen deutschen Titel.")
 * @UniqueEntity(fields="AbweichenderNameEN", ignoreNull=true, message="Es existiert bereits ein Angebot mit diesem studiengangspezifischen englischen Titel.")
 * @ORM\Table(name="Angebot")
 * @ORM\HasLifecycleCallbacks
 */
class Angebot implements ObjectManagerAware
{
    /**
     * @return string
     */
    public function __toString()
    {
        $string = null;
        if ($this->getAbweichenderNameDE() != null) {
            $string = $this->getAbweichenderNameDE();
        } else {
            $string = (string) $this->getVeranstaltung();
        }

        return $string;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Angebots_ID;

    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="angebot")
     * @ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID", nullable=false)
     */
    protected $veranstaltung;

    /**
     * @ORM\ManyToOne(targetEntity="Fachgebiet", inversedBy="angebot")
     * @ORM\JoinColumn(name="fachgebiet", referencedColumnName="Fachgebiets_ID", nullable=true)
     */
    protected $fachgebiet;

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="angebot")
     * @ORM\JoinColumn(name="studiengang", referencedColumnName="Studiengang_ID", nullable=false)
     */
    protected $studiengang;


    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\Choice(
     *      choices = { "Wahlpflichtfach", "Pflichtfach" },
     *      message = "Bitte geben Sie eine korrekte Angebotsart an!"
     * )
     */
    protected	$Angebotsart;

//    /**
//     * @ORM\Column(type="string", length=10, nullable=true, unique=true)
//     * @Assert\Length(
//     *      min = 8,
//     *      minMessage = "Der Modulcode muss mindestens {{ limit }} Zeichen lang sein.",
//     *      max = 9,
//     *      maxMessage = "Der Modulcode darf maximal {{ limit }} Zeichen lang sein."
//     * )
//     * @Assert\Regex(
//     *     pattern = "/[BM]\-[A-Z]{2,2}\-[A-Z]{1,2}[0-9]{2,2}/",
//     *     message = "Bitte verwenden Sie folgendes Muster für den Modulcode: z.B. B-IN-MN01, B-IN-V05"
//     * )
//     */
//    protected	$Code;

    // Wenn bei PDF-Erstellung auf '(' und ')' im Titel geprüft wird um auf Fachgebiet zu testen, dürfen '(' und ')' hier nicht im Titel auftauchen
    /**
     * @ORM\Column(type="string", length=70, nullable=true, unique=true)
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Der abweichende deutsche Name muss mindestens {{ limit }} Zeichen lang sein.",
     *      max = 70,
     *      maxMessage = "Der abweichende deutsche Name darf maximal {{ limit }} Zeichen lang sein."
     * )
     * @Assert\Regex(
     *     pattern = "/[A-ZÄÖÜa-zäöüß0-9 \-]{5,70}/",
     *     message = "Der studiengangspezifische deutsche Name darf nur aus Buchstaben, Zahlen, Leerzeichen und Bindestrichen bestehen."
     * )
     */
    protected	$AbweichenderNameDE;

    //Wenn bei PDF-Erstellung auf '(' und ')' im Titel geprüft wird um auf Fachgebiet zu testen, dürfen '(' und ')' hier nicht im Titel auftauchen
    /**
     * @ORM\Column(type="string", length=70, nullable=true, unique=true)
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Der abweichende englische Name muss mindestens {{ limit }} Zeichen lang sein.",
     *      max = 70,
     *      maxMessage = "Der abweichende englische Name darf maximal {{ limit }} Zeichen lang sein."
     * )
     * @Assert\Regex(
     *     pattern = "/[A-ZÄÖÜa-zäöüß0-9 \-]{5,70}/",
     *     message = "Der studiengangspezifische englische Name darf nur aus Buchstaben, Zahlen, Leerzeichen und Bindestrichen bestehen."
     * )
     */
    protected $AbweichenderNameEN;


    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank(message = "Die Regelsemester müssen gesetzt werden.")
     */
    protected $RegelsemesterSS;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank(message = "Die Regelsemester müssen gesetzt werden.")
     */
    protected $RegelsemesterWS;

    /**
     * @ORM\OneToMany(targetEntity="Semesterplan", mappedBy="angebot", cascade={"all"})
     */
    protected $semesterplan;

    ////// BEGIN OF IMPORTANT CODE //////

    private $em;

    /**
     * Wird benötigt um auf den Entity-Manager zugreifen zu können.
     *
     * @param ObjectManager $objectManager
     * @param ClassMetadata $classMetadata
     */
    public function injectObjectManager(ObjectManager $objectManager, ClassMetadata $classMetadata)
    {
        $this->em = $objectManager;
    }

    /**
     * Get Code
     *
     * @return string
     */
    public function getCode()
    {
        //DON'T REMOVE THIS FUNCTION!
        $zuweisungen = $this->getVeranstaltung()->getModulcodezuweisung();
        foreach ($zuweisungen as $zuweisung) {
            if (
                ($zuweisung->getStudiengang()   == $this->getStudiengang()) &&
                ($zuweisung->getFachgebiet()    == $this->getFachgebiet()) &&
                ($zuweisung->getVeranstaltung() == $this->getVeranstaltung())
            ) {
                if (!is_null($zuweisung->getOverwrite())) {
                    return $zuweisung->getOverwrite();
                } else {
                    return $zuweisung->getCode();
                }
            }
        }

        return null;
    }

    /**
     * Set Code
     *
     * $this->veranstaltung MUSS gesetzt sein, bevor diese Funktion aufgerufen werden kann
     *
     * @param string $code
     *
     * @return Angebot
     */
    public function setCode($code)
    {
        //DON'T REMOVE THIS FUNCTION!
        $zuweisungen = $this->getVeranstaltung()->getModulcodezuweisung();
        foreach ($zuweisungen as $zuweisung) {
            if (
                ($zuweisung->getStudiengang()   == $this->getStudiengang()) &&
                ($zuweisung->getFachgebiet()    == $this->getFachgebiet()) &&
                ($zuweisung->getVeranstaltung() == $this->getVeranstaltung())
            ) {
                $zuweisung->setCode($code);
            }
        }

        return $this;
    }

    ////// END OF IMPORTANT CODE //////

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->semesterplan = new ArrayCollection();
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
     * Set Angebotsart
     *
     * @param string $angebotsart
     *
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
     * Set AbweichenderNameDE
     *
     * @param string $abweichenderNameDE
     *
     * @return Angebot
     */
    public function setAbweichenderNameDE($abweichenderNameDE)
    {
        $this->AbweichenderNameDE = $abweichenderNameDE;

        return $this;
    }

    /**
     * Get AbweichenderNameDE
     *
     * @return string 
     */
    public function getAbweichenderNameDE()
    {
        return $this->AbweichenderNameDE;
    }

    /**
     * Set AbweichenderNameEN
     *
     * @param string $abweichenderNameEN
     *
     * @return Angebot
     */
    public function setAbweichenderNameEN($abweichenderNameEN)
    {
        $this->AbweichenderNameEN = $abweichenderNameEN;

        return $this;
    }

    /**
     * Get AbweichenderNameEN
     *
     * @return string 
     */
    public function getAbweichenderNameEN()
    {
        return $this->AbweichenderNameEN;
    }

    /**
     * Set veranstaltung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $veranstaltung
     *
     * @return Angebot
     */
    public function setVeranstaltung(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $veranstaltung)
    {
        $this->veranstaltung = $veranstaltung;

        return $this;
    }

    /**
     * Get veranstaltung
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
     *
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
     *
     * @return Angebot
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


    /**
     * Set RegelsemesterSS
     *
     * @param string $regelsemesterSS
     *
     * @return Angebot
     */
    public function setRegelsemesterSS($regelsemesterSS)
    {
        $this->RegelsemesterSS = $regelsemesterSS;

        return $this;
    }

    /**
     * Get RegelsemesterSS
     *
     * @return string 
     */
    public function getRegelsemesterSS()
    {
        return $this->RegelsemesterSS;
    }

    /**
     * Set RegelsemesterWS
     *
     * @param string $regelsemesterWS
     *
     * @return Angebot
     */
    public function setRegelsemesterWS($regelsemesterWS)
    {
        $this->RegelsemesterWS = $regelsemesterWS;

        return $this;
    }

    /**
     * Get RegelsemesterWS
     *
     * @return string 
     */
    public function getRegelsemesterWS()
    {
        return $this->RegelsemesterWS;
    }

    /**
     * Add semesterplan
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan
     *
     * @return Veranstaltung
     */
    public function addSemesterplan(\FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan)
    {
        $this->semesterplan[] = $semesterplan;

        return $this;
    }

    /**
     * Remove semesterplan
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan
     */
    public function removeSemesterplan(\FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan)
    {
        $this->semesterplan->removeElement($semesterplan);
    }

    /**
     * Get semesterplan
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSemesterplan()
    {
        return $this->semesterplan;
    }
}
