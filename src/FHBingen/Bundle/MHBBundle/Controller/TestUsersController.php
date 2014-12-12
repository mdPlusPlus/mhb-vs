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

    /**
     * @Route("/test/roles");
     *
     * only for testing
     */
    public function testGetRolesAction()
    {
        $roleDozent = $this->getRoleDozent();
        $roleSgl = $this->getRoleSgl();

        return new Response('<p>'. $roleDozent->getName() .'<br />'. $roleDozent->getRole() .'</p><p>'. $roleSgl->getName() .'<br />'. $roleSgl->getRole() .'</p>');
    }

    private function getRoleDozent()
    {
        $em = $this->getDoctrine()->getManager();
        $roleArr = $em->getRepository('FHBingenMHBBundle:Role');
        $roleDozent = $roleArr->findOneBy(array('role' => 'ROLE_DOZENT'));

        return $roleDozent;
    }

    private function getRoleSgl()
    {
        $em = $this->getDoctrine()->getManager();
        $roleArr = $em->getRepository('FHBingenMHBBundle:Role');
        $roleSgl = $roleArr->findOneBy(array('role' => 'ROLE_SGL'));

        return $roleSgl;
    }

    /**
     * @Route("/create/testUsers")
     */
    public function createTestUsersAction()
    {
        $respArr = array(
            //$this->createDozent('Herr', 'Prof.', 'Max', 'Mustermann', 'm.mustermann@fh-bingen.de', 'testpass'),
            //$this->createSgl('Herr', 'Prof. Dr.', 'Peter', 'Lustig', 'p.lustig@fh-bingen.de', 'testpass'),
            //$this->createDozent('Frau', 'Prof. Dr.', 'Alpha', 'Beta', 'a.beta@fh-bingen.de', 'testpass'),
            $this->createDozent('Herr', '', 'Rollo', 'Rollo', 'rollo@test.com', 'testpass'),
        );

        $responseStr = '';
        foreach($respArr as $resp){
            $responseStr = $responseStr . $resp->getContent() . '<br />';
        }

        return new Response($responseStr);
    }

    public function createDozent($anrede, $titel, $vorname, $nachname, $email, $password)
    {
        $roleDozent = $this->getRoleDozent();

        return $this->createUser($roleDozent, $anrede, $titel, $vorname, $nachname, $email, $password);
    }

    public function createSgl($anrede, $titel, $vorname, $nachname, $email, $password)
    {
        $roleSgl = $this->getRoleSgl();

        return $this->createUser($roleSgl, $anrede, $titel, $vorname, $nachname, $email, $password);
    }

    private function createUser(RoleInterface $rolle, $anrede, $titel, $vorname, $nachname, $email, $password)
    {
        $user = new Dozent();
        $user->setRole($rolle);
        $user->setAnrede($anrede);
        $user->setTitel($titel);
        $user->setName($vorname);
        $user->setNachname($nachname);
        $user->setEmail($email);
        $user->setPassword($password);

        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        } else {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush(); //ohne flush kommt kein fehler...

            return new Response('User erfolgreich angelegt.');
        }
    }
}