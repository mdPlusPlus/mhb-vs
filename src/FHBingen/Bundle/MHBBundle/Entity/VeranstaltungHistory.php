<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:26
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Proxies\__CG__\FHBingen\Bundle\MHBBundle\Entity\Veranstaltung;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class VeranstaltungHistory
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="VeranstaltungHistory")
 * @ORM\HasLifecycleCallbacks
 */
class VeranstaltungHistory extends Veranstaltung
{


}
