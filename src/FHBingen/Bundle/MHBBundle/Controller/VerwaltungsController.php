<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 15.12.2014
 * Time: 16:57
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use FHBingen\Bundle\MHBBundle\Entity;

class VerwaltungsController extends Controller
{
    /**
     * @Route("/restricted/sgl/useranzeige")
     * @Template("FHBingenMHBBundle:Verwaltung:userverwaltung.html.twig")
     */
    public function SglShowUsersAction()
    {
        //alle Nutzer sortieren

        $em = $this->getDoctrine()->getManager();
        $entries = $em->getRepository('FHBingenMHBBundle:Dozent')->findALL();

        $dozent=array();
        $sgl=array();

        foreach($entries as $e)
        {
            if($e->getRoles()[0]== 'ROLE_SGL')
            {
                $sgl[]=$e;
            }
            else
            {
                if($e->getRoles()[0]== 'ROLE_DOZENT')
                {
                    $dozent[]=$e;
                }
            }
        }
        return array('sgl' => $sgl, 'dozent' => $dozent, 'pageTitle' => 'Nutzerverwaltung');
    }
}
