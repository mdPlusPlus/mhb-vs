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

    //TODO: entfernen
    public function regelSemesterCorrectAction()
    {
        $encoder = new JsonEncoder();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('FHBingenMHBBundle:Veranstaltung');
        $entries = $repo->findAll();
        foreach ($entries as $entry) {
            $entry->setSprache(null);
            $em->persist($entry);
            $em->flush();
        }

        return new Response('alles klar');
    }

    //TODO: entfernen
    public function sprachAction(){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('FHBingenMHBBundle:Veranstaltung');
        $entries = $repo->findAll();
        foreach ($entries as $entry) {
            if ($entry->getSprache() == "Deutsch, einzelne Ab") {
                $entry->setSprache("Deutsch, einzelne Abschnitte in Englisch");
            }
            $em->persist($entry);
            $em->flush();
        }

        return new Response('alles klar');
    }

    //TODO: entfernen
    public function startsemesterAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('FHBingenMHBBundle:Studienplan');
        $entries = $repo->findAll();
        foreach ($entries as $entry) {
            if ($entry->getStartsemester() == 'SS14') {
                $entry->setStartsemester('SS');
            }
            if ($entry->getStartsemester() == 'WS13') {
                $entry->setStartsemester('WS');
            }

            $em->persist($entry);
            $em->flush();
        }

        return new Response('alles klar');
    }

    /**
     * @Route("/restricted/sgl/sort")
     * @Template("@FHBingenMHB/jquerySortTest.html.twig")
     */
    public function jquerySortTestAction()
    {
        return array();
    }
}
