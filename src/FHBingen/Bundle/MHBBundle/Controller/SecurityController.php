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

use FHBingen\Bundle\MHBBundle\Entity\User;

class SecurityController extends Controller
{

    /**
     * @Route("/security/create/testuser")
     */
    public function createTestUserAction()
    {
        $testUser = new User();
        $testUser->setEmail("user@test.com");
        $testUser->setUsername("testuser");
        $testUser->setPassword("testpass");

        $validator = $this->get('validator');
        $errors = $validator->validate($testUser);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($testUser);
        $em->flush();

        return new Response("testuser angelegt");
    }
}