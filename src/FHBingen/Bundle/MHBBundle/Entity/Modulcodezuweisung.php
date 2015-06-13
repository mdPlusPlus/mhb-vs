<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 13.06.2015
 * Time: 22:07
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Modulcodezuweisung
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Modulcodezuweisung")
 *
 * @UniqueEntity(fields="code",      ignoreNull=true, message="Es existiert bereits ein Modulcodezuweisung für diesen Code.")
 * @UniqueEntity(fields="overwrite", ignoreNull=true, message="Es existiert bereits ein Modulcodezuwesiung für diesen Code.")
 */
class Modulcodezuweisung
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="FHBingen\Bundle\MHBBundle\Entity\Studiengang", inversedBy="modulcodezuweisung")
     * @ORM\JoinColumn(name="studiengang", referencedColumnName="Studiengang_ID", nullable=false)
     */
    private $studiengang;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="FHBingen\Bundle\MHBBundle\Entity\Fachgebiet", inversedBy="modulcodezuweisung")
     * @ORM\JoinColumn(name="fachgebiet", referencedColumnName="Fachgebiets_ID", nullable=true)
     */
    private $fachgebiet;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="FHBingen\Bundle\MHBBundle\Entity\Veranstaltung", inversedBy="modulcodezuweisung")
     * @ORM\JoinColumn(name="veranstaltung", referencedColumnName="Modul_ID", nullable=false)
     */
    private $veranstaltung;

    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     *
     * @ORM\Column(type="string", length=10, nullable=true, unique=true)
     * @Assert\Length(
     *      min = 8,
     *      minMessage = "Der Modulcode muss mindestens {{ limit }} Zeichen lang sein.",
     *      max = 9,
     *      maxMessage = "Der Modulcode darf maximal {{ limit }} Zeichen lang sein."
     * )
     * @Assert\Regex(
     *     pattern = "/[BM]\-[A-Z]{2,2}\-[A-Z]{1,2}[0-9]{2,2}/",
     *     message = "Bitte verwenden Sie folgendes Muster für den Modulcode: z.B. B-IN-MN01, B-IN-V05"
     * )
     */
    private $code;

    /**
     * @ORM\Column(type="string", nullable=true, unique=true)
     *
     * @ORM\Column(type="string", length=10, nullable=true, unique=true)
     * @Assert\Length(
     *      min = 8,
     *      minMessage = "Der Modulcode muss mindestens {{ limit }} Zeichen lang sein.",
     *      max = 9,
     *      maxMessage = "Der Modulcode darf maximal {{ limit }} Zeichen lang sein."
     * )
     * @Assert\Regex(
     *     pattern = "/[BM]\-[A-Z]{2,2}\-[A-Z]{1,2}[0-9]{2,2}/",
     *     message = "Bitte verwenden Sie folgendes Muster für den Modulcode: z.B. B-IN-MN01, B-IN-V05"
     * )
     */
    private $overwrite; //streng genommen darf overwrite auch nicht in code vorkommen und umgekehrt -> vernachlässigbar

    /**
     * @return string
     */
    public function __toString()
    {
        if (!is_null($this->overwrite)) {
            return $this->overwrite;
        } else {
            return $this->code;
        }
    }


    ////////////////////////



    /**
     * Set code
     *
     * @param string $code
     * @return Modulcodezuweisung
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set overwrite
     *
     * @param string $overwrite
     * @return Modulcodezuweisung
     */
    public function setOverwrite($overwrite)
    {
        $this->overwrite = $overwrite;

        return $this;
    }

    /**
     * Get overwrite
     *
     * @return string 
     */
    public function getOverwrite()
    {
        return $this->overwrite;
    }

    /**
     * Set studiengang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang
     * @return Modulcodezuweisung
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
     * Set fachgebiet
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiet
     * @return Modulcodezuweisung
     */
    public function setFachgebiet(\FHBingen\Bundle\MHBBundle\Entity\Fachgebiet $fachgebiet)
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
     * Set veranstaltung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $veranstaltung
     * @return Modulcodezuweisung
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
}
