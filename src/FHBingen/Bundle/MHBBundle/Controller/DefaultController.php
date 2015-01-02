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
        //'login' ist hier route alias von /login
        return $this->redirect($this->generateUrl('login'));

        //TODO: wenn bereits eingeloggt auf andere Seite verweisen
    }

    /**
     * PDF-Export Test
     * @Route("/pdf")
     * @Template("FHBingenMHBBundle:PDF-Test:modulhandbuch.html.twig")
     */
    public function pdfAction(){
        $em = $this->getDoctrine()->getManager();
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('mhb' =>1));
        $lehrende = $em->getRepository('FHBingenMHBBundle:Lehrende');

        $moduleZuMHB = array();
        foreach ($angebote as $valueA) {
            foreach ($module as $valueM) {
                if ($valueA->getVeranstaltung()->getModulID() == $valueM->getModulID()) {
                    $moduleZuMHB[] = $valueM;
                }
            }
        }

        $stgZuModul = array();
        foreach ($moduleZuMHB as $modul) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('veranstaltung' => $modul->getModulID()));
            foreach ($tmp as $studiengang) {
                if ($studiengang->getStudiengang() != $angebote[3]->getStudiengang()) {
                    $name[] = (string) $studiengang->getStudiengang();
                }
            }
            $stgZuModul[] = $name;
        }

        $lehrendeZuModul = array();
        foreach ($moduleZuMHB as $modul) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('veranstaltung' => $modul->getModulID()));
            foreach ($tmp as $lehrend) {
                if ($lehrend->getDozent() != $modul->getBeauftragter()) {
                    $name[] = (string) $lehrend->getDozent();
                }
            }
            $lehrendeZuModul[] = $name;
        }

        $voraussetzungZuModul = array();
        foreach ($moduleZuMHB as $modul) {
            $name = array();
            $vorArr = $modul->getModulVoraussetzung();
            foreach ($vorArr as $vor) {
                $name[] = $vor;//->getModulID();
            }
            $voraussetzungZuModul[] = $name;
        }

        $regelsemester = array();
        foreach ($moduleZuMHB as $modul) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Studienplan')->findBy(array('veranstaltung' => $modul->getModulID(),'studiengang'=>2));
            foreach ($tmp as $studienplan) {
                $name[] = $studienplan;
            }
            $regelsemester[] = $name;
        }
        return array('moduleZuMHB' => $moduleZuMHB,'angebote' => $angebote, 'studiengaenge' => $stgZuModul,'semester'=>$regelsemester,"lehrende" => $lehrendeZuModul, "voraussetzung" => $voraussetzungZuModul);
    }



    /**
     * ChoiceList Test
     * @Route("/choiceListDemo")
     * @Template("")
     */
    public function choiceListDemoAction(){

    }

    /**
     * Encoding Test
     * @Route("/encode")
     *
     */
    public function encodeAction(){
//        $encoder=new JsonEncoder();
//        $em = $this->getDoctrine()->getManager();
//        $data= $em->getRepository()
//        $encoder->encode(, 'json');
    }


}
