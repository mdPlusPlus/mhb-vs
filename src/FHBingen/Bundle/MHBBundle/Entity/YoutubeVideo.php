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
 * Class YoutubeVideo
 * @ORM\Entity
 * @ORM\Table(name="videos")
 */

class YoutubeVideo {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $ID_video;

    /**
     * @ORM\Column(type="string", length=125, nullable=true)
     */
    private $link;

    /**
     * @ORM\OneToOne(targetEntity="Projekt", inversedBy="video")
     * @ORM\JoinColumn(name="projekt_id", referencedColumnName="ID_projekt")
     */
    private $projekt;

    /**
     * Get ID_video
     *
     * @return integer 
     */
    public function getIDVideo()
    {
        return $this->ID_video;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return YoutubeVideo
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set projekt
     *
     * @param \FHBingen\Bundle\Entity\Projekt $projekt
     * @return YoutubeVideo
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
