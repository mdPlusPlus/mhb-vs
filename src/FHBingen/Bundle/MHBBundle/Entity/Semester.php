<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:06
 */
namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Semester
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @UniqueEntity(fields="Semester", message="Dieses Semester wurde bereits in die Datenbank eingetragen.")
 * @ORM\Table(name="Semester")
 * @ORM\HasLifecycleCallbacks
 * TODO: Start- und Enddatum einführen ?
 */
class Semester
{

    /**
     * @return string
     */
    public function __toString()
    {
        $string = $this->getSemester();

        return $string;
    }

    /**
     * @ORM\ID
     * @ORM\Column(type="string",  length=4, nullable=false, unique=true)
     * @Assert\NotBlank(message = "Die Bezeichnung des Semesters darf nicht leer sein.")
     * @Assert\Length(
     *      min = 4,
     *      max = 4,
     *      exactMessage = "Der Semestername muss aus genau {{ limit }} Zeichen bestehen."
     * )
     * @Assert\Regex(
     *     pattern = "/[SW][S][0-9]{2,2}/",
     *     message = "Bitte verwenden Sie folgendes Muster für den Semesternamen: z.B. SS01, WS17"
     * )
     */
    protected $Semester;

    /**
     * @ORM\OneToMany(targetEntity="Semesterplan", mappedBy="semester", cascade={"all"})
     * */
    protected $semesterplan;

    /**
     * @ORM\OneToMany(targetEntity="Modulhandbuch", mappedBy="gueltigAb")
     */
    protected $gueltigAbSemester;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gueltigAbSemester = new ArrayCollection();
        $this->semesterplan      = new ArrayCollection();
    }

    /**
     * Set Semester
     *
     * @param string $semester
     *
     * @return Semester
     */
    public function setSemester($semester)
    {
        $this->Semester = $semester;

        return $this;
    }

    /**
     * Get Semester
     *
     * @return string
     */
    public function getSemester()
    {
        return $this->Semester;
    }

    /**
     * Add semesterplan
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan
     *
     * @return Semester
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

    /**
     * Add sem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $sem
     *
     * @return Semester
     */
    public function addGueltigAbSemester(\FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $sem)
    {
        $this->gueltigAbSemester[] = $sem;

        return $this;
    }

    /**
     * Remove sem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $sem
     */
    public function removeSem(\FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $sem)
    {
        $this->gueltigAbSemester->removeElement($sem);
    }

    /**
     * Get sem
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGueltigAbSemester()
    {
        return $this->gueltigAbSemester;
    }
}