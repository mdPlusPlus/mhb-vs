<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 12.12.2014
 * Time: 20:13
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class RestrictedController extends Controller
{

    /**
     * @Route("/restricted/dozent")
     */
    public function restrictedDozentAction()
    {
        return new Response("Congratulations, you accessed the restricted area for Dozent!");
    }

    /**
     * @Route("/restricted/sgl")
     */
    public function restrictedSglAction()
    {
        return new Response("Congratulations, you accessed the restricted area for SGL!");
    }

    /**
     * @Route("/restricted/dozent/test")
     */
    public function restrictedDozentTestAction()
    {
        return new Response("Congratulations, you accessed the restricted area for Dozent!");
    }

    /**
     * @Route("/restricted/sgl/test")
     */
    public function restrictedSglTestAction()
    {
        return new Response("Congratulations, you accessed the restricted area for SGL!");
    }

    /**
     * @Route("/restricted/printRoles")
     */
    public function printRolesAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $roleArr = $user->getRoles();

        $response = '';
        foreach ($roleArr as $role) {
            $response = $response . (string) $role . '<br />';
        }

        return new Response($response);
    }
}