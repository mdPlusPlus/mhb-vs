<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;



class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Route("/index")
     */
    public function indexAction()
    {
        /*
         * TODO:
         * wenn bereits eingeloggt auf andere Seite verweisen
         * nicht so einfach, weil nicht hinter /restricted/ und damit firewall kontext nicht verfügbar
         */
        //'login' ist hier route alias von /login
        return $this->redirect($this->generateUrl('login'));
    }
}
