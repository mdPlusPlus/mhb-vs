<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


//TODO löschen/ändern
class DefaultController extends Controller
{
    /**
    * @Route("/test123/{name}")
    * @Template("FHBingenMHBBundle:SGL:eigeneModule.html.twig")
    */
    public function testAction($name)
    {
        return array('name' => $name,'pageTitle' => 'STARTSEITE');
    }

    /**
     * @Route("/")
     * @Template("FHBingenMHBBundle:SecurityDemo:login.html.twig")
     */
    public function indexAction()
    {
        return array('pageTitle' => 'Modulhandbuch-Verwaltungssystem', 'headline' => 'Login');
    }


    /**
     * @Route("/SGL")
     * @Template("eigeneModule.html.twig")
     */
    public function SglMainAction($userID)
    {
        return array('name' => $userID,'pageTitle' => 'STARTSEITE');
    }

    /**
     * @Route("/Dozent")
     * @Template("eigeneModule.html.twig")
     */
    public function DozentMainAction($userID)
    {
        return array('name' => $userID,'pageTitle' => 'STARTSEITE');
    }

}
