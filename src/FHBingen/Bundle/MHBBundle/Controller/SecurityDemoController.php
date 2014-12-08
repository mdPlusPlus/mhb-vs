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
use Symfony\Component\Security\Core\SecurityContext;


class SecurityDemoController extends Controller
{
    /**
     * @Route("/sec")
     * @Template("FHBingenMHBBundle:SecurityDemo:login.html.twig")
     */
    public function indexAction(){
        return array('error' => '', 'last_username' => '');
    }

    /**
     * @Route("/sec/login", name="_login")
     */
    public function loginAction(Request $request)
    {
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
        );
    }

    /**
     * @Route("/sec/login_check", name="_security_check")
     */
    public function securityCheckAction()
    {
        //$em = $this->getDoctrine()->getManager();
        //$users = $em->getRepository('FHBingenMHBBundle:User');
        //$users->findOneBy(array('username' => $username));

        //return new Response($username);


        // The security layer will intercept this request
    }

    /**
     * @Route("/sec/logout", name="_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }
} 