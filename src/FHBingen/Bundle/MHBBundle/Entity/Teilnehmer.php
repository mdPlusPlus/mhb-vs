<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 19.06.14
 * Time: 11:55
 */

namespace FHBingen\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Teilnehmer
 * @package FHBingen\Bundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="teilnehmer")
 */
class Teilnehmer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $ID_teilnehmer;
    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $name;
    /**
     *
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="teilnehmer")
     * @ORM\JoinColumn(name="studiengang_ID", referencedColumnName="id")
     */
    protected $studiengang;

    /**
     * @ORM\ManyToOne(targetEntity="Projekt", inversedBy="teilnehmer")
     * @ORM\JoinColumn(name="projekt_id", referencedColumnName="ID_projekt")
     */
    protected $projekt;

    /**
     * Get ID_teilnehmer
     *
     * @return integer
     */
    public function getIDTeilnehmer()
    {
        return $this->ID_teilnehmer;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Teilnehmer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }



    /**
     * Set studiengang
     *
     * @param string $studiengang
     * @return Teilnehmer
     */
    public function setStudiengang($studiengang)
    {
        $this->studiengang = $studiengang;

        return $this;
    }

    /**
     * Get studiengang
     *
     * @return string
     */
    public function getStudiengang()
    {
        return $this->studiengang;
    }

    /**
     * Set projekt
     *
     * @param \FHBingen\Bundle\Entity\Projekt $projekt
     * @return Teilnehmer
     */
    public function setProjekt(\FHBingen\Bundle\Entity\Projekt $projekt = null)
    {
        $this->projekt = $projekt;

        return $this;
    }

    /**
     * Get projekt
     *
     * @return \FHBingen\Bundle\Entity\Projekt
     */
    public function getProjekt()
    {
        return $this->projekt;
    }
}
