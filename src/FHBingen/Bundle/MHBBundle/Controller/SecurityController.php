<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 07.12.2014
 * Time: 14:20
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use FHBingen\Bundle\MHBBundle\Entity\Role;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use FHBingen\Bundle\MHBBundle\Entity\User;

class SecurityController extends Controller
{
    /**
     * @Route("/security/create/roles")
     */
    public function createRolesAction()
    {
        $roleUser = new Role();
        $roleUser->setName("ROLE_USER");
        $roleUser->setRole("ROLE_USER");

        $roleAdmin = new Role();
        $roleAdmin->setName("ROLE_ADMIN");
        $roleAdmin->setRole("ROLE_ADMIN");

        $roleSuperAdmin = new Role();
        $roleSuperAdmin->setName("ROLE_SUPER_ADMIN");
        $roleSuperAdmin->setRole("ROLE_SUPER_ADMIN");

        $validator = $this->get('validator');

        $errors = $validator->validate($roleUser);
        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new Response($errorsString);
        }
        $errors = $validator->validate($roleAdmin);
        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new Response($errorsString);
        }
        $errors = $validator->validate($roleSuperAdmin);
        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($roleUser);
        $em->persist($roleAdmin);
        $em->persist($roleSuperAdmin);
        $em->flush();

        return new Response("Rollen angelegt");
    }


    /**
     * @Route("/security/create/testUser/{user}")
     */
    public function createTestUserAction($user)
    {
        $testUser = new User();
        $testUser->setEmail($user . '@test.com');
        $testUser->setUsername($user);
        $testUser->setPassword(password_hash('testpass', PASSWORD_BCRYPT, array('cost' => 12)));
        //$testUser->setPassword('testpass');

        $validator = $this->get('validator');
        $errors = $validator->validate($testUser);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($testUser);
        $em->flush();

        return new Response($user . ' angelegt');
    }

    /**
     * @Route("/security/addUserToRole/{username}/{rolename}")
     */
    public function addUserToRoleAction($username, $rolename)
    {

        $em = $this->getDoctrine()->getManager();

        $usersTable = $em->getRepository('FHBingenMHBBundle:User');
        $rolesTable = $em->getRepository('FHBingenMHBBundle:Role');

        $user = $usersTable->findOneBy(array('username' => $username));
        $role = $rolesTable->findOneBy(array('name' => $rolename));

        if ($user == null) {
            //TODO $username einbauen
            throw new EntityNotFoundException();
        }
        if ($role == null) {
            //TODO $rolename einbauen
            throw new EntityNotFoundException();
        }


        $user->addRole($role);
        /*
         * alternativ
         * $role->addUser($user);
         */

        $validator = $this->get('validator');

        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $errors = $validator->validate($role);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em->persist($user);
        $em->persist($role);
        $em->flush();

        return new Response($username . ' is added to ' . $rolename);

    }

    /**
     * @Route("/security/create/user")
     */
    public function createUserAction($username, $password, $email, $roles)
    {
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setEmail($email);
        $user->setIsActive(true);
        foreach($roles as $role){
            $user->addRole($role);
        }

        $validator = $this->get('validator');

        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
    }

    /**
     * @Route("/security/create/dozent")
     */
    public function createDozentAction(){
        //TODO
    }

    /**
     * @Route("/security/create/sgl")
     */
    public function createSglAction(){
        //TODO
    }


}