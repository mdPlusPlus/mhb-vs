<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 28.06.14
 * Time: 11:54
 */

namespace FHBingen\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Studiengang
 * @ORM\Entity
 * @ORM\Table(name="studiengang")
 */
class Studiengang
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $studiengang;
    /**
     * @ORM\OneToMany(targetEntity="Teilnehmer", mappedBy="studiengang")
     */
    protected $teilnehmer;

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
     * Set studiengang
     *
     * @param string $studiengang
     * @return Studiengang
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

    public function __toString()
    {
        return sprintf('%s', $this->studiengang);
    }
}
