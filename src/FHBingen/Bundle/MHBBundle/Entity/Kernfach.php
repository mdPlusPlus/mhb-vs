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
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Kernfach")
 */
class Kernfach
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="kernfach")
     * @ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID", nullable=false)
     */
    protected $veranstaltung;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Vertiefung", inversedBy="vertiefung")
     * @ORM\JoinColumn(name="vertiefung", referencedColumnName="Vertiefung_ID", nullable=false)
     */
    protected $vertiefung;

    /**
     * Set modul
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $modul
     *
     * @return Kernfach
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
     * Set vertiefung
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Vertiefung $vertiefung
     *
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