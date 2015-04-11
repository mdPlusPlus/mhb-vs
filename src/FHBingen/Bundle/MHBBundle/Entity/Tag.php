<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 10.04.2015
 * Time: 02:32
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Tag
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
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $anotherField;

    /**
     * @return mixed
     */
    public function getAnotherField()
    {
        return $this->anotherField;
    }

    /**
     * @param mixed $anotherField
     */
    public function setAnotherField($anotherField)
    {
        $this->anotherField = $anotherField;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Task", inversedBy="tags")
     */
    private $task;

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param Task $task
     */
    public function setTask(Task $task)
    {
        $this->task = $task;
    }
}