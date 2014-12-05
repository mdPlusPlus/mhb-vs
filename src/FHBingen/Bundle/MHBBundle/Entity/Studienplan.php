<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 04.12.2014
 * Time: 17:37
 */


namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Studienplan
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Studienplan")
 * @ORM\HasLifecycleCallbacks
 */

class Studienplan
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer $id
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="regelsem")
     * @ORM\JoinColumn(name="Regelsemester", referencedColumnName="Semester")
     * */
    protected $reg_sem;

    /**
     * @ORM\ManyToOne(targetEntity="Semester", inversedBy="startsem")
     * @ORM\JoinColumn(name="Startsemester", referencedColumnName="Semester")
     * */
    protected $start_sem;

    /**
     * @ORM\ManyToOne(targetEntity="Veranstaltung", inversedBy="studienplan_modul")
     * @ORM\JoinColumn(name="Modul_ID", referencedColumnName="Modul_ID")
     * */
    protected $modul;

    /**
     * @ORM\ManyToOne(targetEntity="Studiengang", inversedBy="studienplan_stgang")
     * @ORM\JoinColumn(name="Studiengang_ID", referencedColumnName="Studiengang_ID")
     * */
    protected $studiengang;
}