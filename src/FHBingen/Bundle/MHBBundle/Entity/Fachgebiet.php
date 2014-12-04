<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:04
 */
namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Fachgebiet
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Fachgebiet")
 * @UniqueEntity(fields="Titel", message="Dieses Fachgebiet wurde bereits in die Datenbank eingetragen.")
 * @ORM\HasLifecycleCallbacks
 */

class Fachgebiet
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\ID
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Fachgebiets_ID;

    /**
     * @ORM\Column(type="string", length=50, nullable=false, unique=true)
     * @Assert\Length(
     * min= "4",
     * minMessage="Der Fachgebietstitel muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     */
    protected $Titel;

    /**
     * Get Fachgebiets_ID
     *
     * @return integer 
     */
    public function getFachgebietsID()
    {
        return $this->Fachgebiets_ID;
    }

    /**
     * Set Titel
     *
     * @param string $titel
     * @return Fachgebiet
     */
    public function setTitel($titel)
    {
        $this->Titel = $titel;
    
        return $this;
    }

    /**
     * Get Titel
     *
     * @return string 
     */
    public function getTitel()
    {
        return $this->Titel;
    }


    /*Abhaengigkeiten*/


    /*Angebot*/

    /**
     * @ORM\OneToMany(targetEntity="Angebot", mappedBy="fachgebiet", cascade={"all"})
     * */
    protected $angebot;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->angebot = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add angebot
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot
     * @return Fachgebiet
     */
    public function addAngebot(\FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot)
    {
        $this->angebot[] = $angebot;
    
        return $this;
    }

    /**
     * Remove angebot
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot
     */
    public function removeAngebot(\FHBingen\Bundle\MHBBundle\Entity\Angebot $angebot)
    {
        $this->angebot->removeElement($angebot);
    }

    /**
     * Get angebot
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAngebot()
    {
        return $this->angebot;
    }

    /*Fachgbiet/Studiengang*/

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="stgang_fach")
     * @ORM\JoinColumn(name="Studiengang_ID", referencedColumnName="Studiengang_ID")
     */
    protected $hat;

    /**
     * Set hat
     *
     * @param \FHBingen\Bundle\MHBBundle\Entity\Studiengang $hat
     * @return Fachgebiet
     */
    public function setHat(\FHBingen\Bundle\MHBBundle\Entity\Studiengang $hat = null)
    {
        $this->hat = $hat;
    
        return $this;
    }

    /**
     * Get hat
     *
     * @return \FHBingen\Bundle\MHBBundle\Entity\Studiengang 
     */
    public function getHat()
    {
        return $this->hat;
    }
}
