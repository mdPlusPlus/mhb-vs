<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 01.02.2015
 * Time: 15:33
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Modulvoraussetzung
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Modulvoraussetzung")
 * @ORM\HasLifecycleCallbacks
 */
class Modulvoraussetzung {

    /**
     * @return string
     */
    public function __toString()
    {
        $string = $this->getModul()->getName().": ".$this->getVoraussetzung()->getName();

        return $string;
    }

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="grundmodul")
     * @ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID")
     */
    private $modul;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="forderung")
     * @ORM\JoinColumn(name="voraussetzung", referencedColumnName="Modul_ID")
     */
    private $voraussetzung;



    /**
     * Set modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul
     * @return Modulvoraussetzung
     */
    public function setModul(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul)
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
     * Set voraussetzung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $voraussetzung
     * @return Modulvoraussetzung
     */
    public function setVoraussetzung(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $voraussetzung)
    {
        $this->voraussetzung = $voraussetzung;
    
        return $this;
    }

    /**
     * Get voraussetzung
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung 
     */
    public function getVoraussetzung()
    {
        return $this->voraussetzung;
    }
}
