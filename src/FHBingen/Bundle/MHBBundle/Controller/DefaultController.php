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
        //TODO: wenn bereits eingeloggt auf andere Seite verweisen
        //'login' ist hier route alias von /login
        return $this->redirect($this->generateUrl('login'));
    }

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


    public function sprachAction(){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('FHBingenMHBBundle:Veranstaltung');
        $entries = $repo->findAll();
        foreach ($entries as $entry) {
            if($entry->getSprache() == "Deutsch, einzelne Ab")
                $entry->setSprache("Deutsch, einzelne Abschnitte in Englisch");

            $em->persist($entry);
            $em->flush();
        }
        return new Response('alles klar');
    }
}
