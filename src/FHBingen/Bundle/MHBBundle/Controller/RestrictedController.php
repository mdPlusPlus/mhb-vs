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
use Symfony\Component\Security\Core\SecurityContextInterface;


class RestrictedController
{

    /**
     * @Route("/restricted/dozent")
     * @Security("is_granted('ROLE_DOZENT')")
     */
    public function restrictedDozentAction()
    {
        return new Response("Congratulations, you accessed the restricted area for Dozent!");
    }

    /**
     * @Route("/restricted/sgl")
     * @Security("is_granted('ROLE_SGL')")
     */
    public function restrictedSglAction()
    {
        return new Response("Congratulations, you accessed the restricted areafor SGL!");
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
            $response = $response . (string)$role . '<br />';
        }

        return new Response($response);
    }
}