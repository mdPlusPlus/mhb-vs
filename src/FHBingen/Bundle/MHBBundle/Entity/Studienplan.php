<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 04.12.2014
 * Time: 17:37
 */


namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Studienplan
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Studienplan")
 * @ORM\HasLifecycleCallbacks
 */

class Studienplan
{

    public function __toString()
    {
        $string = (string) $this->getRegelSemester();
        return $string;
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer $id
     */
    protected $Studienplan_ID;


    /**
     * @ORM\Column(type="string"), nullable=false
     * @ORM\OrderBy({"RegelSemester" = "ASC"})
     * */
    protected $Regelsemester;

    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="startSemester")
     * @ORM\JoinColumn(name="startsemester", referencedColumnName="Semester", nullable=false)
     * */
    protected $startSemester;

    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="studienplanModul")
     * @ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID", nullable=false)
     * @ORM\OrderBy({"name" = "ASC"})
     * */
    protected $veranstaltung;

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="studienplanZuStudienplan")
     * @ORM\JoinColumn(name="studiengang", referencedColumnName="Studiengang_ID", nullable=false)
     * @ORM\OrderBy({"titel" = "ASC"})
     * */
    protected $studiengang;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getStudienplan_ID()
    {
        return $this->Studienplan_ID;
    }

    /**
     * Set reg_sem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semester $regSem
     * @return Studienplan
     */
    public function setRegelSemester($regSem = null)
    {
        $this->regelSemester = $regSem;
    
        return $this;
    }

    /**
     * Get reg_sem
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Semester 
     */
    public function getRegelSemester()
    {
        return $this->regelSemester;
    }

    /**
     * Set start_sem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semester $startSem
     * @return Studienplan
     */
    public function setStartSemester(\FHBingen\Bundle\MHBBundle\Entity\Semester $startSem = null)
    {
        $this->startSemester = $startSem;
    
        return $this;
    }

    /**
     * Get start_sem
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Semester 
     */
    public function getStartSemester()
    {
        return $this->startSemester;
    }

    /**
     * Set modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul
     * @return Studienplan
     */
    public function setVeranstaltung(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul = null)
    {
        $this->veranstaltung = $modul;
    
        return $this;
    }

    /**
     * Get modul
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung 
     */
    public function getVeranstaltung()
    {
        return $this->veranstaltung;
    }

    /**
     * Set studiengang
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang
     * @return Studienplan
     */
    public function setStudiengang(\FHBingen\Bundle\MHBBundle\Entity\Studiengang $studiengang = null)
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
