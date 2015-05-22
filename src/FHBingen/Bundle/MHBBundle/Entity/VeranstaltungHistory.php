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

    //Wenn bei PDF-Erstellung auf '(' und ')' im Titel geprüft wird um auf Fachgebiet zu testen, dürfen '(' und ')' hier nicht im Titel auftauchen
    /**
     * @ORM\Column(type="string", length=70, nullable=false, unique=false)
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Der deutsche Modul-Titel muss aus mindestens {{ limit }} Zeichen bestehen.",
     *      max = 70,
     *      maxMessage = "Der deutsche Modul-Titel darf maximal aus {{ limit }} Zeichen bestehen.",
     * )
     * @Assert\NotBlank(
     *      message = "Der deutsche Modultitel muss gesetzt werden."
     * )
     * @Assert\Regex(
     *     pattern = "/[A-ZÄÖÜa-zäöüß0-9 \-]{5,70}/",
     *     message = "Der deutsche Name darf nur aus Buchstaben, Zahlen, Leerzeichen und Bindestrichen bestehen."
     * )
     */
    protected $Name;

    //Wenn bei PDF-Erstellung auf '(' und ')' im Titel geprüft wird um auf Fachgebiet zu testen, dürfen '(' und ')' hier nicht im Titel auftauchen
    /**
     * @ORM\Column(type="string", length=70, nullable=true, unique=false)
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Der englische Modul-Titel muss aus mindestens {{ limit }} Zeichen bestehen.",
     *      max = 70,
     *      maxMessage = "Der englische Modul-Titel darf maximal aus {{ limit }} Zeichen bestehen.",
     * )
     * @Assert\Regex(
     *     pattern = "/[A-ZÄÖÜa-zäöüß0-9 \-]{5,70}/",
     *     message = "Der englische Name darf nur aus Buchstaben, Zahlen, Leerzeichen und Bindestrichen bestehen."
     * )
     */
    protected $NameEN;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
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
