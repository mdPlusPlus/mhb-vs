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
 * Class DBTest
 * @package Acme\DemoBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="DBTest")
 * @ORM\HasLifecycleCallbacks
 */


class DDBTest
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\ID
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $Test_ID;

    /**
     * @ORM\Column(type="string", length=4, nullable=false)
     */
    protected $Test;

    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $Blubb;

    /**
     * @ORM\Column(type="string", length=4)
     */
    protected  $Wurst;

}
