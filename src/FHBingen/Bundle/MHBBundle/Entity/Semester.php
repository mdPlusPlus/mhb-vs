<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:06
 */
namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Semester
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @UniqueEntity(fields="semester", message="Dieses Semester wurde bereits in die Datenbank eingetragen.")
 * @ORM\Table(name="Semester")
 * @ORM\HasLifecycleCallbacks
 */

class Semester
{
    /**
     * @ORM\Column(type="string",  length=5, nullable=false, unique=true)
     * @Assert\Length(
     * min= "4",
     * minMessage="Ein Semester muss aus mindestens {{ limit }} Zeichen bestehen."
     * )
     * @ORM\ID
     */
    protected $Semester;

    /**
     * Set Semester
     *
     * @param string $semester
     * @return Semester
     */
    public function setSemester($semester)
    {
        $this->Semester = $semester;
    
        return $this;
    }

    /**
     * Get Semester
     *
     * @return string 
     */
    public function getSemester()
    {
        return $this->Semester;
    }
}
