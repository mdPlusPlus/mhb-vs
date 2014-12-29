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

class UserDependentRole implements RoleInterface
{
    private $user;

    public function __toString()
    {
        return $this->getRole();
    }

    public function __construct(Dozent $user)
    {
        $this->user = $user;
    }

    public function getRole()
    {
        return 'ROLE_' . strtoupper($this->user->getEmail());
    }
}