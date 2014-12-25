<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use FHBingen\Bundle\MHBBundle\Entity;

//TODO löschen/ändern
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Route("/index")
     */
    public function indexAction()
    {
        //'login' ist hier route alias von /login
        return $this->redirect($this->generateUrl('login'));
    }

    /**
     * @Route("/restricted/dozent/password")
     */
    public function ResetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dozenten = $em->getRepository('FHBingenMHBBundle:Dozent')->findAll();

        foreach ($dozenten as $doz) {
            $doz->setPassword('testpass');
            $em->persist($doz);
            $em->flush();
        }

        return new Response('Passwörter wurden zurückgesetzt');
    }

    /**
     * @Route("/restricted/sgl/Veranstaltung")
     * @Template("FHBingenMHBBundle:Veranstaltung:Veranstaltung_Uebersicht.html.twig")
     */
    public function VeranstaltungMainAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT v.Modul_ID,v.Kuerzel,v.Name,v.Name_EN,v.Versionsnummer_Modul,v.Status,v.Haeufigkeit,v.Dauer,
                                   v.Lehrveranstaltungen,v.Kontaktzeit_VL,v.Kontaktzeit_Sonstige,v.Selbststudium,v.Gruppengroesse,v.Lernergebnisse,v.Inhalte,
                                   v.Sprache,v.Pruefungsformen,v.Literatur,v.Leistungspunkte,v.Voraussetzung_inh,
                                   v.Voraussetzung_LP
                                   FROM FHBingenMHBBundle:Veranstaltung v
                                   WHERE v.Modul_ID=1');
        $result = $query->getSingleResult();

        return array('Titel' => $result, 'pageTitle' => 'STARTSEITE');
    }
}
