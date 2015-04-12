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
 *
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
     * @ORM\Column(type="text"), nullable=false
     * @Assert\NotBlank(message = "Die Regelsemester müssen gesetzt werden.")
     */
    protected $Regelsemester;

    /**
     * @ORM\Column(type="string"), nullable = false
     * @Assert\Choice(
     *      choices = { "SS", "WS" },
     *      message = "Bitte geben Sie ein korrektes Startsemester!"
     * )
     */
    protected $Startsemester;

    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="studienplanModul")
     * @ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID", nullable=false)
     */
    protected $veranstaltung;

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="studienplanZuStudienplan")
     * @ORM\JoinColumn(name="studiengang", referencedColumnName="Studiengang_ID", nullable=false)
     */
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
     * @param string $regSem
     *
     * @return Studienplan
     */
    public function setRegelSemester($regSem)
    {
        $this->Regelsemester = $regSem;
    
        return $this;
    }

    /**
     * Get reg_sem
     *
     */
    public function getRegelSemester()
    {
        return $this->Regelsemester;
    }


    public function setStartsemester($startSem)
    {
        $this->Startsemester = $startSem;
    
        return $this;
    }


    public function getStartsemester()
    {
        return $this->Startsemester;
    }

    /**
     * Set modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul
     *
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
     *
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
