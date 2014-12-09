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
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Lehrende")
 * @ORM\HasLifecycleCallbacks
 */

class Lehrende
{

    public function __toString()
    {
        //TODO $Semester richtig? getter?
        $string = (string)$this->getId();
        return $string;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Lehrende_ID;


    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="modul")
     * @ORM\JoinColumn(name="modul_id", referencedColumnName="Modul_ID")
     * */
    protected $module;


    /**
     * @ORM\ManyToOne(targetEntity="Dozent", inversedBy="lehrende")
     * @ORM\JoinColumn(name="dozent_id", referencedColumnName="Dozenten_ID")
     * */
    protected $lehrender;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getLehrende_ID()
    {
        return $this->Lehrende_ID;
    }

    /**
     * Set module
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $module
     * @return Lehrende
     */
    public function setModule(\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung $module = null)
    {
        $this->module = $module;
    
        return $this;
    }

    /**
     * Get module
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Veranstaltung 
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set lehrender
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrender
     * @return Lehrende
     */
    public function setLehrender(\FHBingen\Bundle\MHBBundle\Entity\Dozent $lehrender = null)
    {
        $this->lehrender = $lehrender;
    
        return $this;
    }

    /**
     * Get lehrender
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Dozent 
     */
    public function getLehrender()
    {
        return $this->lehrender;
    }
}
