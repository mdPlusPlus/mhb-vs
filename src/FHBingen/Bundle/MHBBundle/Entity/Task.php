<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 10.04.2015
 * Time: 02:32
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="task" ,cascade={"persist"})
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function addTag(Tag $tag)
    {
        $tag->setTask($this);

        $this->tags->add($tag);
    }

    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
    }
}