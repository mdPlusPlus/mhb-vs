<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03.12.2014
 * Time: 13:26
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class VeranstaltungHistory
 *
 * @package FHBingen\Bundle\MHBBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="VeranstaltungHistory")
 * @ORM\HasLifecycleCallbacks
 *
 * @ORM\AttributeOverrides(name="Versionsnummer",
 *  column=@column(
        @ORM\Id
 *  )
 * )
 *
 */
class VeranstaltungHistory extends VeranstaltungSuperClass
{


}
