<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 12.12.2014
 * Time: 20:13
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class RestrictedController extends Controller
{
    /**
     * @Route("/restricted/role_check")
     */
    public function roleCheckAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_SGL')) {
            //render SGL
            return $this->redirect($this->generateUrl('fhbingen_mhb_default_sglmain'));
        } else {
            if ($this->get('security.context')->isGranted('ROLE_DOZENT')) {
                //render Dozent
                return $this->redirect($this->generateUrl('fhbingen_mhb_default_dozentmain'));
            } else {
                return new AccessDeniedException('Rolle nicht erkannt.');
            }
        }
    }

    /**
     * @Route("/restricted/printRoles")
     */
    public function printRolesAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $username = $user->getUsername();
        $roleArr = $user->getRoles();

        $response = 'Username: ' . $username . '<br />Roles:<br />';
        foreach ($roleArr as $role) {
            $response = $response . (string) $role . '<br />';
        }

        return new Response($response);
    }
}