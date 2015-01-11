<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 17.12.2014
 * Time: 03:00
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use FHBingen\Bundle\MHBBundle\Entity;
use FHBingen\Bundle\MHBBundle\Form;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class SglController extends Controller
{
    /**
     * @Route("/restricted/sgl/alleModule", name="alleModule")
     * * @Template("FHBingenMHBBundle:SGL:alleModule.html.twig")
     */
    public function alleModuleAction()//Sortierung? nach Studiengang?
    {
        $em = $this->getDoctrine()->getManager();
        //TODO!
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();


        $nichtInPlanung = array();
        foreach ($module as $value) {
            if ($value->getStatus() != 'in Planung' && $value->getStatus() != 'expired') {
                $nichtInPlanung[] = $value;
            }
        }
        asort($nichtInPlanung,SORT_STRING);

        $stgZuModul = array();
        foreach ($nichtInPlanung as $modul) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('veranstaltung' => $modul->getModulID()));
            foreach ($tmp as $studiengang) {
                $name[] = (string) $studiengang->getStudiengang();
            }
            asort($name,SORT_STRING);
            $stgZuModul[] = $name;
        }

        return array('module' => $nichtInPlanung, 'stgZuModul' => $stgZuModul, 'pageTitle' => 'Alle Module');
    }


    /**
     * @Route("/restricted/sgl/modulCodeUebersicht", name="modulCodeUebersicht")
     * @Template("FHBingenMHBBundle:SGL:modulCodeUebersicht.html.twig")
     */
    public function modulCodeUebersichtAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $dozent->getDozentenID()));

        $dummyAngebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('Code' => 'DUMMY'), array("Code" => 'asc'));
        asort($dummyAngebote,SORT_STRING);
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findAll();
        $angeboteOhneDummy = array();
        foreach ($angebote as $value) {
            if ($value->getCode() != 'DUMMY' && $value->getStudiengang()->getStudiengangID() == $studiengang->getStudiengangID()) {
                $angeboteOhneDummy[] = $value;
            }
        }
        asort($angeboteOhneDummy,SORT_STRING);

        return array('angebote' => $angeboteOhneDummy, 'dummyAngebote' => $dummyAngebote,'studiengang'=>$studiengang, 'pageTitle' => 'Modulcodes');
    }

    /**
     * @Route("/restricted/sgl/modulCodeErstellung/{id}", name="modulCodeErstellung")
     * @Template("FHBingenMHBBundle:SGL:modulCodeErstellung.html.twig")
     */
    public function modulCodeErstellungAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $angebot = $em->getRepository('FHBingenMHBBundle:Angebot')->findOneBy(array('veranstaltung' => $id));
        $modul = $angebot->getVeranstaltung();

        $form = $this->createForm(new Form\CodeType(), $angebot);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $angebot->setCode($form->get('code')->getData());
                $em->persist($angebot);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Der Code wurde erfolgreich bearbeitet.');

                return $this->redirect($this->generateUrl('modulCodeUebersicht'));
            }

        }

        return $this->render('FHBingenMHBBundle:SGL:modulCodeErstellung.html.twig', array('form' => $form->createView(), 'modul' => $modul, 'pageTitle' => 'Modulcodeerstellung'));
    }

    /**
     * @Route("/restricted/sgl/mhbUebersicht", name="mhbUebersicht")
     * @Template("FHBingenMHBBundle:SGL:mhbModulUebersicht.html.twig")
     */
    public function mhbUebersichtAction()
    {
        $em = $this->getDoctrine()->getManager();
        //TODO!
        $mhb = $em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findAll();

        return array('mhb' => $mhb, 'pageTitle' => 'Modulhandbücher');
    }

    /**
     * @Route("/restricted/sgl/mhbModulListe/{id}", name="mhbModulListe")
     * @Template("FHBingenMHBBundle:SGL:mhbModulListe.html.twig")
     */
    public function mhbModulListe($id)
    {

        $em = $this->getDoctrine()->getManager();
        $mhb = $em->createQuery('SELECT v.Modul_ID, v.Name , v.Kuerzel ,a.Code, v.Haeufigkeit, v.Versionsnummer,
                                 d.Titel, d.Nachname, v.Autor
                                 FROM  FHBingenMHBBundle:Angebot a
                                 JOIN  FHBingenMHBBundle:Veranstaltung v WITH  a.veranstaltung =  v.Modul_ID
                                 JOIN  FHBingenMHBBundle:Dozent d WITH  v.beauftragter =  d.Dozenten_ID
                                 AND a.mhb =' . $id);
        $result = $mhb->getResult();
        $mhb_tile = $em->createQuery('SELECT DISTINCT m.Beschreibung
                                 FROM  FHBingenMHBBundle:Modulhandbuch m
                                 WHERE m.MHB_ID =' . $id);
        $mhb_Beschreibung = $mhb_tile->getResult();

        return array('mhb' => $result,'beschreibung'=>$mhb_Beschreibung, 'pageTitle' => 'Module des Modulhandbuchs ' );
    }


    /*
    public function mhbErstellungAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $dozent->getDozentenID()));
        $angeboteNachStudiengang = $em->getRepository('FHBingenMHBBundle:Angebot')
            ->findBy(array('studiengang' => $studiengang->getStudiengangID()));
        $angeboteOhneMHB = array();
        foreach ($angeboteNachStudiengang as $value) {
            if ($value->getMhb() == null) {
                $angeboteOhneMHB[] = $value;
            }
        }
        return array('angebote' => $angeboteOhneMHB,'pageTitle' => 'Modulhandbucherstellung');
    }
    */
    /**
     * PDF-Export Test
     * @Route("/restricted/sgl/mhbErstellung", name="mhbErstellung")
     * @Template("FHBingenMHBBundle:SGL:mhbErstellung.html.twig")
     */
    public function mhbErstellungAction()
    {
        $em = $this->getDoctrine()->getManager();
        $decode = new JsonEncoder();
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('mhb' => 1));
        $lehrende = $em->getRepository('FHBingenMHBBundle:Lehrende');

        $moduleZuMHB = array();
        $pruef = array();
        $veranstaltung = array();
        $vorlp = array();
        foreach ($angebote as $valueA) {
            foreach ($module as $valueM) {
                if ($valueA->getVeranstaltung()->getModulID() == $valueM->getModulID()) {
                    $moduleZuMHB[] = $valueM;
                }
            }
        }

        foreach ($moduleZuMHB as $entry) {
            $pruef[] = $decode->decode($entry->getPruefungsformen(), 'json');
            $veranstaltung[] = $decode->decode($entry->getLehrveranstaltungen(), 'json');
            $vorlp[] = $decode->decode($entry->getVoraussetzungLP(), 'json');
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
            $tmp = $em->getRepository('FHBingenMHBBundle:Studienplan')->findBy(array('veranstaltung' => $modul->getModulID(), 'studiengang' => 2));
            foreach ($tmp as $studienplan) {
                $name[] = $studienplan;
            }
            $regelsemester[] = $name;
        }

        return array('moduleZuMHB' => $moduleZuMHB, 'angebote' => $angebote, 'studiengaenge' => $stgZuModul, 'semester' => $regelsemester,
            "lehrende" => $lehrendeZuModul, "voraussetzung" => $voraussetzungZuModul, "pruef" => $pruef, "veranst" => $veranstaltung, "vorlp" => $vorlp);
    }

    /**
     * @Route("/restricted/sgl/modulDeaktivierung", name="modulDeaktivierung")
     */
    public function modulDeaktivierungAction()
    {

    }

}