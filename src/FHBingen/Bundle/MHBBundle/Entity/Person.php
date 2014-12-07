<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 07.12.2014
 * Time: 14:01
 */

namespace FHBingen\Bundle\MHBBundle\Entity;

class Person
{
    protected $email;
    protected $fullname;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }
}