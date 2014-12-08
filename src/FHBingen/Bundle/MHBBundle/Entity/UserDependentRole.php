<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 08.12.2014
 * Time: 11:47
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
//use Symfony\Component\Security\Core\User\UserInterface;

class UserDependentRole implements RoleInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getRole()
    {
        //return 'ROLE_' . strtoupper($this->user->getUsername());
        return $this->user->getEmail();
    }
}