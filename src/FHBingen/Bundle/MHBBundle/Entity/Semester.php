<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:06
 */
namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Semester
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @UniqueEntity(fields="Semester", message="Dieses Semester wurde bereits in die Datenbank eingetragen.")
 * @ORM\Table(name="Semester")
 * @ORM\HasLifecycleCallbacks
 */
class Semester
{
	
	public function __toString()
	{
		//TODO $Semester richtig? getter?
		$string = $this->getSemester();
		return $string;
	}
	
    /**
     * @ORM\ID
     * @ORM\Column(type="string",  length=5, nullable=false, unique=true)
     * @Assert\Length(
     * min = 4,
     * max = 5,
     * minMessage="Ein Semester muss aus mindestens {{ limit }} Zeichen bestehen.",
     * maxMessage="Ein Semester darf aus maximal {{ limit }} Zeichen bestehen."
     * )
     */
    protected $semester;

    /**
     * Set Semester
     *
     * @param string $semester
     * @return Semester
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;
    
        return $this;
    }

    /**
     * Get Semester
     *
     * @return string 
     */
    public function getSemester()
    {
        return $this->semester;
    }


    /*Abhaengigkeiten*/

    /*Semesterplan*/

    /**
     * @ORM\OneToMany(targetEntity="Semesterplan", mappedBy="semester", cascade={"all"})
     * */
    protected $semesterplan;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->semesterplan = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add semesterplan
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semesterplan $semesterplan
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


    /*Modulhandbuch/Semester*/

    /**
     * @ORM\OneToMany(targetEntity="Modulhandbuch", mappedBy="gueltigAb")
     */
    protected $gueltigAbSemester;

    /**
     * Add sem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $sem
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

    /**
     * Add modul_start
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulStart
     * @return Semester
     */
    public function addModulStart(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulStart)
    {
        $this->modul_start[] = $modulStart;
    
        return $this;
    }

    /**
     * Remove modul_start
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulStart
     */
    public function removeModulStart(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modulStart)
    {
        $this->modul_start->removeElement($modulStart);
    }

    /**
     * Get modul_start
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModulStart()
    {
        return $this->modul_start;
    }


    /*Studienplan*/
    /*Startsemester*/
    /**
     * @ORM\OneToMany(targetEntity="Studienplan", mappedBy="startSemester", cascade={"all"})
     * */
    protected $startSemester;


    /**
     * Add regelsem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $regelsem
     * @return Semester
     */
    public function addRegelsem(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $regelsem)
    {
        $this->regelsem[] = $regelsem;
    
        return $this;
    }

    /**
     * Remove regelsem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $regelsem
     */
    public function removeRegelSemester(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $regelsem)
    {
        $this->regelsem->removeElement($regelsem);
    }

    /**
     * Get regelsem
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegelSemester()
    {
        return $this->regelsem;
    }

    /**
     * Add startsem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $startsem
     * @return Semester
     */
    public function addStartSemester(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $startsem)
    {
        $this->startSemester[] = $startsem;
    
        return $this;
    }

    /**
     * Remove startsem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studienplan $startsem
     */
    public function removeStartSemester(\FHBingen\Bundle\MHBBundle\Entity\Studienplan $startsem)
    {
        $this->startSemester->removeElement($startsem);
    }

    /**
     * Get startsem
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStartSemester()
    {
        return $this->startSemester;
    }
}
