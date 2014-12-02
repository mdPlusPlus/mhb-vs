<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
 * @Route("/juckel123")
 * @Template()
 */
    public function indexAction($name)
    {
        return array('name' => $name,'pageTitle' => 'STARTSEITE');
    }
}
