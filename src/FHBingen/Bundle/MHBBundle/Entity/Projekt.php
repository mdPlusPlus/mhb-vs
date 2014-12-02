<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 19.06.14
 * Time: 11:55
 */

namespace FHBingen\Bundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Projekt
 * @package FHBingen\Bundle\Entity
 * @ORM\Entity(repositoryClass="FHBingen\Bundle\Repository\ProjektRepository")
 * @ORM\Table(name="projekt")
 */
class Projekt implements \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $ID_projekt;
    /**
     * @ORM\Column(type="string", length=64,nullable=true)
     */
    private $semester;
    /**
     * @ORM\Column(type="string", length=64,nullable=true)
     */
    private $veranstaltung;
    /**
     * @ORM\Column(type="string", length=256,nullable=true)
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=256,nullable=true)
     */
    private $professor;
    /**
     * @ORM\Column(type="integer", length=256,nullable=true)
     */
    private $hoursEachPerson;
    /** @ORM\Column(type="datetime", nullable=true) */
    private $updated;
    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $kunde;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projektidee;
    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $realisierung;
    /**
     * @ORM\Column(type="boolean")
     */
    private $freigegeben;

    /**
     * @ORM\OneToMany(targetEntity="Teilnehmer", mappedBy="projekt")
     */
    private $teilnehmer;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="projekt")
     */
    private $images;

    /**
     * @ORM\OneToOne(targetEntity="YoutubeVideo", mappedBy="projekt")
     */
    private $video;

    /**
     * @ORM\OneToOne(targetEntity="Resources", mappedBy="projekt")
     */
    private $resources;
    /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function __construct()
    {
        $this->teilnehmer = new ArrayCollection();
        $this->freigegeben = false;
        $this->images = new ArrayCollection();

    }

    /**
     * Get ID_projekt
     *
     * @return integer
     */
    public function getIDProjekt()
    {
        return $this->ID_projekt;
    }

    /**
     * Set semester
     *
     * @param string $semester
     * @return Projekt
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;

        return $this;
    }

    /**
     * Get semester
     *
     * @return string
     */
    public function getSemester()
    {
        return $this->semester;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Projekt
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
     * Set freigegeben
     *
     * @param boolean $freigegeben
     * @return Projekt
     */
    public function setFreigegeben($freigegeben)
    {
        $this->freigegeben = $freigegeben;

        return $this;
    }

    /**
     * Get freigegeben
     *
     * @return boolean
     */
    public function getFreigegeben()
    {
        return $this->freigegeben;
    }

    /**
     * Add teilnehmer
     *
     * @param \FHBingen\Bundle\Entity\Teilnehmer $teilnehmer
     * @return Projekt
     */
    public function addTeilnehmer(\FHBingen\Bundle\Entity\Teilnehmer $teilnehmer)
    {
        $this->teilnehmer[] = $teilnehmer;

        return $this;
    }

    /**
     * Remove teilnehmer
     *
     * @param \FHBingen\Bundle\Entity\Teilnehmer $teilnehmer
     */
    public function removeTeilnehmer(\FHBingen\Bundle\Entity\Teilnehmer $teilnehmer)
    {
        $this->teilnehmer->removeElement($teilnehmer);
    }

    /**
     * Get teilnehmer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeilnehmer()
    {
        return $this->teilnehmer;
    }

    /**
     * Add users
     *
     * @param \FHBingen\Bundle\Entity\User $users
     * @return Projekt
     */
    public function addUser(\FHBingen\Bundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \FHBingen\Bundle\Entity\User $users
     */
    public function removeUser(\FHBingen\Bundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set projektidee
     *
     * @param string $projektidee
     * @return Projekt
     */
    public function setProjektidee($projektidee)
    {
        $this->projektidee = $projektidee;

        return $this;
    }

    /**
     * Get projektidee
     *
     * @return string
     */
    public function getProjektidee()
    {
        return $this->projektidee;
    }

    /**
     * Set user
     *
     * @param \FHBingen\Bundle\Entity\User $user
     * @return Projekt
     */
    public function setUser(\FHBingen\Bundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \FHBingen\Bundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->name,
            $this->semester,
            $this->durchfuehrung,
            $this->realisierung,
            $this->begruendung,
            $this->projektidee,

            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->name,
            $this->semester,
            $this->durchfuehrung,
            $this->realisierung,
            $this->begruendung,
            $this->projektidee,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Set kunde
     *
     * @param string $kunde
     * @return Projekt
     */
    public function setKunde($kunde)
    {
        $this->kunde = $kunde;

        return $this;
    }

    /**
     * Get kunde
     *
     * @return string
     */
    public function getKunde()
    {
        return $this->kunde;
    }

    public function setUpdated()
    {
        $this->updated = new \DateTime("now");
    }

    public function getUpdated()
    {
        if ($this->updated == null)
            return 'no data';
        else
            return $this->updated->format('d/m/Y H:i:s');
    }

    /**
     * Add images
     *
     * @param \FHBingen\Bundle\Entity\Image $images
     * @return Projekt
     */
    public function addImage(\FHBingen\Bundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \FHBingen\Bundle\Entity\Image $images
     */
    public function removeImage(\FHBingen\Bundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }


    /**
     * Set video
     *
     * @param \FHBingen\Bundle\Entity\YoutubeVideo $video
     * @return Projekt
     */
    public function setVideo(\FHBingen\Bundle\Entity\YoutubeVideo $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \FHBingen\Bundle\Entity\YoutubeVideo
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set veranstaltung
     *
     * @param string $veranstaltung
     * @return Projekt
     */
    public function setVeranstaltung($veranstaltung)
    {
        $this->veranstaltung = $veranstaltung;

        return $this;
    }

    /**
     * Get veranstaltung
     *
     * @return string
     */
    public function getVeranstaltung()
    {
        return $this->veranstaltung;
    }


    /**
     * Set realisierung
     *
     * @param string $realisierung
     * @return Projekt
     */
    public function setRealisierung($realisierung)
    {
        $this->realisierung = $realisierung;

        return $this;
    }

    /**
     * Get realisierung
     *
     * @return string
     */
    public function getRealisierung()
    {
        return $this->realisierung;
    }

    /**
     * Set begruendung
     *
     * @param string $begruendung
     * @return Projekt
     */
    public function setBegruendung($begruendung)
    {
        $this->begruendung = $begruendung;

        return $this;
    }

    /**
     * Get begruendung
     *
     * @return string
     */
    public function getBegruendung()
    {
        return $this->begruendung;
    }

    /**
     * Set durchfuehrung
     *
     * @param string $durchfuehrung
     * @return Projekt
     */
    public function setDurchfuehrung($durchfuehrung)
    {
        $this->durchfuehrung = $durchfuehrung;

        return $this;
    }

    /**
     * Get durchfuehrung
     *
     * @return string
     */
    public function getDurchfuehrung()
    {
        return $this->durchfuehrung;
    }

    /**
     * Set hoursEachPerson
     *
     * @param integer $hoursEachPerson
     * @return Projekt
     */
    public function setHoursEachPerson($hoursEachPerson)
    {
        $this->hoursEachPerson = $hoursEachPerson;

        return $this;
    }

    /**
     * Get hoursEachPerson
     *
     * @return integer
     */
    public function getHoursEachPerson()
    {
        return $this->hoursEachPerson;
    }

    /**
     * Set professor
     *
     * @param string $professor
     * @return Projekt
     */
    public function setProfessor($professor)
    {
        $this->professor = $professor;

        return $this;
    }

    /**
     * Get professor
     *
     * @return string 
     */
    public function getProfessor()
    {
        return $this->professor;
    }

    /**
     * Set resources
     *
     * @param \FHBingen\Bundle\Entity\Resources $resources
     * @return Projekt
     */
    public function setResources(\FHBingen\Bundle\Entity\Resources $resources = null)
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Get resources
     *
     * @return \FHBingen\Bundle\Entity\YoutubeVideo 
     */
    public function getResources()
    {
        return $this->resources;
    }
}
