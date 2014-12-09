<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 07.12.2014
 * Time: 14:20
 */

namespace FHBingen\Bundle\MHBBundle\Controller;


use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


use FHBingen\Bundle\MHBBundle\Entity\Role;
use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use Symfony\Component\Security\Core\Role\RoleInterface;

class SecurityController extends Controller
{

    /**
     * @Route("/security/test/roles");
     *
     * only for testing
     */
    public function testGetRolesAction()
    {
        $roleDozent = $this->getRoleDozent();
        $roleSgl = $this->getRoleSgl();

        return new Response('<p>'. $roleDozent->getName() .'<br />'. $roleDozent->getRole() .'</p><p>'. $roleSgl->getName() .'<br />'. $roleSgl->getRole() .'</p>');
    }

    ////////////////////////////////////

    private function getRoleDozent(){
        $em = $this->getDoctrine()->getManager();
        $roleArr = $em->getRepository('FHBingenMHBBundle:Role');
        $roleDozent = $roleArr->findOneBy(array('role' => 'ROLE_DOZENT'));

        return $roleDozent;
    }

    private function getRoleSgl(){
        $em = $this->getDoctrine()->getManager();
        $roleArr = $em->getRepository('FHBingenMHBBundle:Role');
        $roleSgl = $roleArr->findOneBy(array('role' => 'ROLE_SGL'));

        return $roleSgl;
    }


    /**
     * @Route("/security/create/roles")
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
     * @Route("/security/create/testUsers")
     */
    public function createTestUsersAction()
    {
        $respArr = array(
            $this->createDozent('Herr', 'Prof.', 'Max', 'Mustermann', 'm.mustermann@fh-bingen.de', 'm.mustermann', 'testpass'),
            $this->createSgl('Herr', 'Prof. Dr.', 'Peter', 'Lustig', 'p.lustig@fh-bingen.de', 'p.lustig', 'testpass'),
            $this->createDozent('Frau', 'Prof. Dr.', 'Alpha', 'Beta', 'a.beta@fh-bingen.de', 'a.beta', 'testpass'),
            $this->createSgl('Herr', '', 'Rollo', 'Rollo', 'rollo@test.com', 'rollo', 'testpass'),
        );

        $responseStr = '';
        foreach($respArr as $resp){
            $responseStr = $responseStr . $resp->getContent() . '<br />';
        }

        return new Response($responseStr);
    }


    public function createDozent($anrede, $titel, $vorname, $nachname, $email, $username, $password){
        $roleDozent = $this->getRoleDozent();

        return $this->createUser($roleDozent, $anrede, $titel, $vorname, $nachname, $email, $username, $password);
    }

    public function createSgl($anrede, $titel, $vorname, $nachname, $email, $username, $password){
        $roleSgl = $this->getRoleSgl();

        return $this->createUser($roleSgl, $anrede, $titel, $vorname, $nachname, $email, $username, $password);
    }

    private function createUser(RoleInterface $rolle, $anrede, $titel, $vorname, $nachname, $email, $username, $password)
    {
        $user = new Dozent();
        $user->setRole($rolle);
        $user->setAnrede($anrede);
        $user->setTitel($titel);
        $user->setName($vorname);
        $user->setNachname($nachname);
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setPassword(password_hash($password, PASSWORD_BCRYPT, array('cost' => 12)));

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

//    /**
//     * @Route("/security/create/testUser/{user}")
//     */
//    public function createTestUserAction($user)
//    {
//        $testUser = new User();
//        $testUser->setEmail($user . '@test.com');
//        $testUser->setUsername($user);
//        $testUser->setPassword(password_hash('testpass', PASSWORD_BCRYPT, array('cost' => 12)));
//        //$testUser->setPassword('testpass');
//
//        $validator = $this->get('validator');
//        $errors = $validator->validate($testUser);
//
//        if (count($errors) > 0) {
//            $errorsString = (string)$errors;
//
//            return new Response($errorsString);
//        }
//
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($testUser);
//        $em->flush();
//
//        return new Response($user . ' angelegt');
//    }
//
//    /**
//     * @Route("/security/addUserToRole/{username}/{rolename}")
//     */
//    public function addUserToRoleAction($username, $rolename)
//    {
//
//        $em = $this->getDoctrine()->getManager();
//
//        $usersTable = $em->getRepository('FHBingenMHBBundle:User');
//        $rolesTable = $em->getRepository('FHBingenMHBBundle:Role');
//
//        $user = $usersTable->findOneBy(array('username' => $username));
//        $role = $rolesTable->findOneBy(array('name' => $rolename));
//
//        if ($user == null) {
//            //TODO $username einbauen
//            throw new EntityNotFoundException();
//        }
//        if ($role == null) {
//            //TODO $rolename einbauen
//            throw new EntityNotFoundException();
//        }
//
//
//        $user->addRole($role);
//        /*
//         * alternativ
//         * $role->addUser($user);
//         */
//
//        $validator = $this->get('validator');
//
//        $errors = $validator->validate($user);
//        if (count($errors) > 0) {
//            $errorsString = (string)$errors;
//
//            return new Response($errorsString);
//        }
//
//        $errors = $validator->validate($role);
//        if (count($errors) > 0) {
//            $errorsString = (string)$errors;
//
//            return new Response($errorsString);
//        }
//
//        $em->persist($user);
//        $em->persist($role);
//        $em->flush();
//
//        return new Response($username . ' is added to ' . $rolename);
//
//    }
//
//    /**
//     * @Route("/security/create/user")
//     */
//    public function createUserAction($username, $password, $email, $roles)
//    {
//        //TODO testen
//        $user = new User();
//        $user->setUsername($username);
//        $user->setPassword($password);
//        $user->setEmail($email);
//        $user->setIsActive(true);
//        foreach ($roles as $role) {
//            $user->addRole($role);
//        }
//
//        $validator = $this->get('validator');
//
//        $errors = $validator->validate($user);
//        if (count($errors) > 0) {
//            $errorsString = (string)$errors;
//
//            return new Response($errorsString);
//        }
//
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($user);
//        $em->flush();
//
//        return new Response($username . ' wurde angelegt.');
//    }
//
//    /**
//     * @Route("/security/create/dozent")
//     */
//    public function createDozentAction()
//    {
//        //TODO
//    }
//
//    /**
//     * @Route("/security/create/sgl")
//     */
//    public function createSglAction()
//    {
//        //TODO
//    }


}