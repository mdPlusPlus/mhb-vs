<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 15.01.2015
 * Time: 20:49
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ModulhandbuchZuweisung
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="ModulhandbuchZuweisung")
 * @ORM\HasLifecycleCallbacks
 */
class ModulhandbuchZuweisung {

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Modulhandbuch", inversedBy="zuweisung")
     * @ORM\JoinColumn(name="mhb", referencedColumnName="MHB_ID")
     */
    private $mhb;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Angebot", inversedBy="zuweisung")
     * @ORM\JoinColumn(name="angebot", referencedColumnName="Angebots_ID")
     */
    private $angebot;

    /**
     * Set mhb
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $mhb
     * @return ModulhandbuchZuweisung
     */
    public function setMhb(\FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch $mhb)
    {
        $this->mhb = $mhb;

        return $this;
    }

    /**
     * Get mhb
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch 
     */
    public function getMhb()
    {
        return $this->mhb;
    }

    /**
     * Set angebot
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot
     * @return ModulhandbuchZuweisung
     */
    public function setAngebot(\FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot)
    {
        $this->angebot = $angebot;

        return $this;
    }

    /**
     * Get angebot
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Angebot 
     */
    public function getAngebot()
    {
        return $this->angebot;
    }
}
