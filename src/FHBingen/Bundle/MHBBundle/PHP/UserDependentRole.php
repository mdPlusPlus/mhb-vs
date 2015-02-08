<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 08.12.2014
 * Time: 11:47
 */

namespace FHBingen\Bundle\MHBBundle\PHP;

use Symfony\Component\Security\Core\Role\RoleInterface;

use FHBingen\Bundle\MHBBundle\Entity\Dozent;

/**
 * Class UserDependentRole
 *
 * wurde eingeführt, damit jeder Benutzer eine eigene Rolle nach erhält, z.B. 'ROLE_USER@EMAIL.COM' dann aber
 * in unserem Security-Modell nicht konsequent umgesetzt, bzw erschien überflüssig
 *
 * @package FHBingen\Bundle\MHBBundle\PHP
 */
class UserDependentRole implements RoleInterface
{
    private $user;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getRole();
    }

    /**
     * @param Dozent $user
     */
    public function __construct(Dozent $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return 'ROLE_' . strtoupper($this->user->getEmail());
    }
}