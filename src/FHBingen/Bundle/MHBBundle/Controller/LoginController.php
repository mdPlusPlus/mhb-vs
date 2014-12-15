<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 12.12.2014
 * Time: 20:10
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;


class LoginController extends Controller{

    /**
     * @Route("/login")
     * @Template("FHBingenMHBBundle:Login:login.html.twig")
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
            'error' => $error,
            'username' => 'wurst',
        );

    }

    /**
     * @Route("/restricted/login/check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/restricted/logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }

}