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

class SglController extends Controller
{
    /**
     * @Route("/restricted/sgl/alleModule", name="alleModule")
     * * @Template("FHBingenMHBBundle:Veranstaltung:alleModule.html.twig")
     */
    public function alleModuleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();

        return array('module' => $module,'pageTitle' => 'STARTSEITE');
    }

    /**
     * @Route("/restricted/sgl/modulcode", name="modulcode")
     */
    public function modulCodeAction()
    {


    }

    /**
     * @Route("/restricted/sgl/mhbUebersicht", name="mhbUebersicht")
     * @Template("FHBingenMHBBundle:MHB:MHB_Modul_Uebersicht.html.twig")
     */
    public function mhbUebersichtAction()
    {
    $em = $this->getDoctrine()->getManager();
    $mhb = $em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findAll();

    return array('mhb' => $mhb,'pageTitle' => 'STARTSEITE');
    }
    /**
     * @Route("/restricted/sgl/mhbModulListe/{id}", name="mhbModulListe")
     * @Template("FHBingenMHBBundle:MHB:MHB_Modul_Liste.html.twig")
     */
    public function mhbModulListe($id)
    {

        $em = $this->getDoctrine()->getManager();
        $mhb = $em->createQuery('SELECT v.Modul_ID, v.Name , v.Kuerzel ,a.Code, v.Haeufigkeit, v.Versionsnummer_Modul , d.Nachname
                                  FROM  FHBingenMHBBundle:Angebot a
                                  JOIN  FHBingenMHBBundle:Veranstaltung v WITH  a.module =  v.Modul_ID
                                  JOIN  FHBingenMHBBundle:Dozent d WITH  v.beauftragter =  d.Dozenten_ID
                                  AND a.mhb ='.$id);


        $result =$mhb->getResult();

        return array('mhb' => $result,'pageTitle' => 'STARTSEITE');
    }


    /**
     * @Route("/restricted/sgl/mhbErstellung", name="mhbErstellung")
     */
    public function mhbErstellungAction()
    {

    }

    /**
     * @Route("/restricted/sgl/moduldeaktivierung", name="moduldeaktivierung")
     */
    public function modulDeaktivierungAction()
{

}

}