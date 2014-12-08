<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 19:00
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Kernfach
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Kernfach")
 * @ORM\HasLifecycleCallbacks
 */

class Kernfach
{

    public function __toString()
    {
        //TODO $Semester richtig? getter?
        $string = (string)$this->$vertiefung;
        return $string;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /*Abhaengigkeiten*/

    /*Kernfach*/

    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="kernfach")
     * @ORM\JoinColumn(name="modul_id", referencedColumnName="Modul_ID")
     * */
    protected $modul;



    /*Vertiefung*/

    /**
     * @ORM\ManyToOne(targetEntity="Vertiefung", inversedBy="vertiefung")
     * @ORM\JoinColumn(name="vertiefungs_id", referencedColumnName="Vertiefungs_ID")
     * */
    protected $vertiefung;

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
     * Set modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul
     * @return Kernfach
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
     * Set vertiefung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Vertiefung $vertiefung
     * @return Kernfach
     */
    public function setVertiefung(\FHBingen\Bundle\MHBBundle\Entity\Vertiefung $vertiefung = null)
    {
        $this->vertiefung = $vertiefung;
    
        return $this;
    }

    /**
     * Get vertiefung
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Vertiefung 
     */
    public function getVertiefung()
    {
        return $this->vertiefung;
    }
}
