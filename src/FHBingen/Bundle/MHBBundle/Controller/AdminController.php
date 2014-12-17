<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 17.12.2014
 * Time: 03:00
 */

namespace FHBingen\Bundle\MHBBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /*
     * TODO
     * Alle Admin-Funktionen hier rein
     */
    /**
     * @Route("/restricted/sgl/benutzerverwaltung", name="benutzerverwaltung")
     */
    public function benutzerverwaltungAction()
    {

    }

    /**
     * @Route("/restricted/sgl/studiengangverwaltung", name="studiengangverwaltung")
     */
    public function studiengangverwaltungAction()
    {

    }
}