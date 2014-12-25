<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 07.12.2014
 * Time: 14:20
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Role\RoleInterface;

use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use FHBingen\Bundle\MHBBundle\Entity\Role;


class TestUsersController extends Controller
{
    /**
     * @Route("/create/roles")
     */
    public function createRolesAction()
    {
        //TODO: In Oberfläche integrieren (AdminController ?)
        $roleDozent = new Role();
        $roleDozent->setName("ROLE_DOZENT");
        $roleDozent->setRole("ROLE_DOZENT");

        $roleSgl = new Role();
        $roleSgl->setName("ROLE_SGL");
        $roleSgl->setRole("ROLE_SGL");

        $validator = $this->get('validator');

        $errors = $validator->validate($roleDozent);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        $errors = $validator->validate($roleSgl);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($roleDozent);
        $em->persist($roleSgl);
        $em->flush();

        return new Response("Rollen angelegt");
    }
}