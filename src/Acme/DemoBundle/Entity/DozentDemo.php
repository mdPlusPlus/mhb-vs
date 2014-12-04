<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 22:32
 */

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class DozentDemo
 * @package Acme\DemoBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="DozentenDemo")
 * @ORM\HasLifecycleCallbacks
 */


class DozentDemo
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\ID
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Dozenten_ID;

    /**
     * @ORM\Column(type="string", length=4, nullable=false)
     */
    protected $Anrede;

    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $Titel;

    /**
     * @ORM\Column(type="string", length=4)
     */
    protected  $Name;



    /**
     * Get Dozenten_ID
     *
     * @return integer 
     */
    public function getDozentenID()
    {
        return $this->Dozenten_ID;
    }

    /**
     * Set Anrede
     *
     * @param string $anrede
     * @return DozentDemo
     */
    public function setAnrede($anrede)
    {
        $this->Anrede = $anrede;
    
        return $this;
    }

    /**
     * Get Anrede
     *
     * @return string 
     */
    public function getAnrede()
    {
        return $this->Anrede;
    }

    /**
     * Set Titel
     *
     * @param string $titel
     * @return DozentDemo
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

    /**
     * Set Name
     *
     * @param string $name
     * @return DozentDemo
     */
    public function setName($name)
    {
        $this->Name = $name;
    
        return $this;
    }

    /**
     * Get Name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->Name;
    }
}
