<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 17:48
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Lehrende
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Lehrende")
 * @ORM\HasLifecycleCallbacks
 */

class Lehrende
{
    public function __toString()
    {
        $string = (string) $this->dozent . ' ' .(string) $this->veranstaltung;

        return $string;
    }

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="lehrende")
     * @ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID", nullable=false)
     */
    protected $veranstaltung;


    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="lehrende")
     * @ORM\JoinColumn(name="dozent", referencedColumnName="Dozenten_ID", nullable=false)
     */
    protected $dozent;

    /**
     * Set module
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $module
     *
     * @return Lehrende
     */
    public function setVeranstaltung(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul)
    {
        $this->veranstaltung = $modul;
    
        return $this;
    }

    /**
     * Get module
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung 
     */
    public function getVeranstaltung()
    {
        return $this->veranstaltung;
    }

    /**
     * Set lehrender
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrender
     *
     * @return Lehrende
     */
    public function setDozent(\FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrender)
    {
        $this->dozent = $lehrender;
    
        return $this;
    }

    /**
     * Get lehrender
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Dozent 
     */
    public function getDozent()
    {
        return $this->dozent;
    }
}
