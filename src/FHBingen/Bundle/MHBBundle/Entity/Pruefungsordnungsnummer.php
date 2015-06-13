<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 13.05.2015
 * Time: 11:15
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Pruefungsordnungsnummer
 *
 * Diese Klasse ist für die Transition nach HISinOne vorgesehen
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="Pruefungsordnungsnummer")
 * @ORM\HasLifecycleCallbacks
 */
class Pruefungsordnungsnummer
{


    /**
     * @ORM\ID
     * @ORM\OneToOne(targetEntity="Veranstaltung")
     * @ORM\JoinColumn(name="modul", referencedColumnName="Modul_ID")
     */
    protected $modul;

    /**
     * @ORM\Column(type="integer", length=8, nullable=true)
     *
     * @Assert\Length(
     *      min = 4,
     *      minMessage = "Die Prüfungsordnungsnummer muss mindestens {{ limit }} Zeichen lang sein.",
     *      max = 8,
     *      maxMessage = "Die Prüfungsordnungsnummer darf maximal {{ limit }} Zeichen lang sein."
     * )
     */
    protected $PORDBIN;

    /**
     * @ORM\Column(type="integer", length=8, nullable=true)
     *
     * @Assert\Length(
     *      min = 4,
     *      minMessage = "Die Prüfungsordnungsnummer muss mindestens {{ limit }} Zeichen lang sein.",
     *      max = 8,
     *      maxMessage = "Die Prüfungsordnungsnummer darf maximal {{ limit }} Zeichen lang sein."
     * )
     */
    protected $PORDBMC;

    /**
     * @ORM\Column(type="integer", length=8, nullable=true)
     *
     * @Assert\Length(
     *      min = 4,
     *      minMessage = "Die Prüfungsordnungsnummer muss mindestens {{ limit }} Zeichen lang sein.",
     *      max = 8,
     *      maxMessage = "Die Prüfungsordnungsnummer darf maximal {{ limit }} Zeichen lang sein."
     * )
     */
    protected $PORDBBI;

    /**
     * @ORM\Column(type="integer", length=8, nullable=true)
     *
     * @Assert\Length(
     *      min = 4,
     *      minMessage = "Die Prüfungsordnungsnummer muss mindestens {{ limit }} Zeichen lang sein.",
     *      max = 8,
     *      maxMessage = "Die Prüfungsordnungsnummer darf maximal {{ limit }} Zeichen lang sein."
     * )
     */
    protected $PORDMIS;
}