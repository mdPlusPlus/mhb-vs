<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:26
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class VeranstaltungHistory
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="VeranstaltungHistory")
 * @ORM\HasLifecycleCallbacks
 *
 */
class VeranstaltungHistory extends VeranstaltungSuperClass
{

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\ID
     */
    protected $Modul_ID;

    /**
     * Get Modul_ID
     *
     * @return integer
     */
    public function getModulID()
    {
        return $this->Modul_ID;
    }

    public  function  setModulID($id)
    {
        $this->Modul_ID = $id;

        return $this;
    }

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     */
    protected $Versionsnummer;

    /**
     * Set Versionsnummer
     *
     * @param integer $versionsnummer
     *
     * @return Veranstaltung
     */
    public function setVersionsnummer($versionsnummer)
    {
        $this->Versionsnummer = $versionsnummer;

        return $this;
    }

    /**
     * Get Versionsnummer
     *
     * @return integer
     */
    public function getVersionsnummer()
    {
        return $this->Versionsnummer;
    }

}
