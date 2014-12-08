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
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer $id
     */
    protected $id;


    /**
     * @ORM\Column(type="string"), nullable=false
     * */
    protected $reg_sem_som;

    /**
     * @ORM\Column(type="string"), nullable=false
     * */
    protected $reg_sem_winter;

    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="startsem")
     * @ORM\JoinColumn(name="Startsemester", referencedColumnName="Semester")
     * */
    protected $start_sem;

    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="studienplan_modul")
     * @ORM\JoinColumn(name="Modul_ID", referencedColumnName="Modul_ID")
     * */
    protected $modul;

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="studienplan_stgang")
     * @ORM\JoinColumn(name="Studiengang_ID", referencedColumnName="Studiengang_ID")
     * */
    protected $studiengang;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reg_sem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semester $regSem
     * @return Studienplan
     */
    public function setRegSem(\FHBingen\Bundle\MHBBundle\Entity\Semester $regSem = null)
    {
        $this->reg_sem = $regSem;
    
        return $this;
    }

    /**
     * Get reg_sem
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Semester 
     */
    public function getRegSem()
    {
        return $this->reg_sem;
    }

    /**
     * Set start_sem
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Semester $startSem
     * @return Studienplan
     */
    public function setStartSem(\FHBingen\Bundle\MHBBundle\Entity\Semester $startSem = null)
    {
        $this->start_sem = $startSem;
    
        return $this;
    }

    /**
     * Get start_sem
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Semester 
     */
    public function getStartSem()
    {
        return $this->start_sem;
    }

    /**
     * Set modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul
     * @return Studienplan
     */
    public function setModul(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul = null)
    {
        $this->modul = $modul;
    
        return $this;
    }

    /**
     * Get modul
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung 
     */
    public function getModul()
    {
        return $this->modul;
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
