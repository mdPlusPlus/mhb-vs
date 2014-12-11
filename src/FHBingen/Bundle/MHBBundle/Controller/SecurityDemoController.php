<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 08.12.2014
 * Time: 12:43
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContextInterface;


class SecurityDemoController extends Controller
{
    /**
     * @Route("/sec/")
     * @Template("FHBingenMHBBundle:SecurityDemo:login.html.twig")
     */
    public function indexAction()
    {
        return array('error' => '', 'last_username' => '');
    }

    /**
     * @Route("/sec/login")
     * @Template("FHBingenMHBBundle:SecurityDemo:login.html.twig")
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        return array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error
        );
    }

    /**
     * @Route("/sec/restricted/login_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/sec/restricted/logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/sec/restricted/res")
     * @Security("is_granted('ROLE_ROLLO@TEST.COM')")
     */
    public function restrictedAction()
    {
        return new Response("Congratulations, you accessed the restricted area!");
    }

    /**
     * @Route("/sec/restricted/printRoles")
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