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
     */
    public function alleModuleAction()
    {

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
        $query = $em->createQuery('SELECT  s.Titel,v.Modul_ID, v.Name , v.Name_EN, v.Kuerzel ,a.Code, a.Angebotsart,
                                  v.Haeufigkeit , v.Dauer , v.Lehrveranstaltungen , v.Kontaktzeit_VL,
                                  v.Kontaktzeit_Sonstige , v.Selbststudium, v.Gruppengroesse , v.Lernergebnisse ,
                                  v.Inhalte , v.Pruefungsformen , v.Sprache , v.Literatur , v.Leistungspunkte ,
                                  v.Voraussetzung_LP , v.Voraussetzung_inh, d.Nachname
                                  FROM  FHBingenMHBBundle:Angebot a
                                  JOIN  FHBingenMHBBundle:Veranstaltung v WITH  a.module =  v.Modul_ID
                                  JOIN  FHBingenMHBBundle:Studiengang s WITH  a.studiengang =  s.Studiengang_ID
                                  JOIN  FHBingenMHBBundle:Dozent d WITH  v.beauftragter =  d.Dozenten_ID
                                  AND a.mhb =1');
        $result =$query->getResult();

        return array('Titel' => $result,'pageTitle' => 'STARTSEITE');
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