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
use FHBingen\Bundle\MHBBundle\PHP\ModulBeschreibung;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class SglController extends Controller
{
    /**
     * @Route("/restricted/sgl/alleModule", name="alleModule")
     * @Template("FHBingenMHBBundle:SGL:alleModule.html.twig")
     */
    public function alleModuleAction()//Sortierung? nach Studiengang?
    {
        $em = $this->getDoctrine()->getManager();
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();

        //filtert die Module die in Planung sind herraus
        $nichtInPlanung = array();
        foreach ($module as $value) {
            if ($value->getStatus() != 'in Planung' && $value->getStatus() != 'expired') {
                $nichtInPlanung[] = $value;
            }
        }
        asort($nichtInPlanung, SORT_STRING);//Sortiert die Veranstaltungen nach name

        //Sucht die Studeingänge für die Module herraus
        $stgZuModul = array();
        foreach ($nichtInPlanung as $modul) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('veranstaltung' => $modul->getModulID()));
            foreach ($tmp as $studiengang) {
                $name[] = (string) $studiengang->getStudiengang();
            }
            asort($name, SORT_STRING);//Sortiert die Studiengänge nach name
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
        //findet die Angebote mit Dummy Modulcode
        $dummyAngebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('Code' => 'DUMMY'), array("Code" => 'asc'));
        asort($dummyAngebote, SORT_STRING);//sortiert die Angebote
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findAll();
        $angeboteOhneDummy = array();
        //Filtert die Angebote mit DummyModul und aus anderen Studiengängen herraus
        foreach ($angebote as $value) {
            if ($value->getCode() != 'DUMMY' && $value->getStudiengang()->getStudiengangID() == $studiengang->getStudiengangID()) {
                $angeboteOhneDummy[] = $value;
            }
        }
        asort($angeboteOhneDummy, SORT_STRING);//Sortiert nach Veranstaltungen name

        return array('angebote' => $angeboteOhneDummy, 'dummyAngebote' => $dummyAngebote, 'studiengang' => $studiengang, 'pageTitle' => 'Modulcodes');
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
        //Spiechert den neune Modulcode in der Angebots Tabelle
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

        //findet alle Veranstaltungen die dem MHB zugeordnet sind
        $mhb = $em
            ->createQuery('SELECT v.Modul_ID, v.Name , v.Kuerzel ,a.Code, v.Haeufigkeit, v.Versionsnummer, d.Titel, d.Nachname, v.Autor
                           FROM  FHBingenMHBBundle:Angebot a
                           JOIN  FHBingenMHBBundle:Veranstaltung v WITH  a.veranstaltung = v.Modul_ID
                           JOIN  FHBingenMHBBundle:Dozent d WITH  v.beauftragter = d.Dozenten_ID
                           AND a.mhb = ' . $id . ' ORDER BY v.Name ASC')
            ->getResult();

        //findet den Namen des MHB um MHB-Kontext im Twig anzeigen zulassen
        $mhbBeschreibung = $em
            ->createQuery('SELECT DISTINCT m.Beschreibung
                           FROM  FHBingenMHBBundle:Modulhandbuch m
                           WHERE m.MHB_ID =' . $id)
            ->getResult();

        return array('mhb' => $mhb, 'beschreibung' => $mhbBeschreibung, 'pageTitle' => 'Module des Modulhandbuchs');
    }


    /**
     * @Route("/restricted/sgl/mhbErstellung", name="mhbErstellung")
     * @Template("FHBingenMHBBundle:SGL:mhbErstellung.html.twig")
     */
    public function mhbErstellungAction()
    {
        //TODO: schön machen und auch die angebote mit MHB anzeigen
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

        return array('angebote' => $angeboteOhneMHB, 'pageTitle' => 'Modulhandbucherstellung');
    }

    /**
     * PDF-Export Test
     * @Route("/restricted/sgl/pdf/{mhbID}", name="pdf")
     */
    public function pdfAction($mhbID)
    {
        //TODO: Code ist Kot, neu schreiben!
        $decode = new JsonEncoder();
        $em = $this->getDoctrine()->getManager();

        $currentUser = $this->get('security.context')->getToken()->getUser();
        $currentStudiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $currentUser));
        $mhb = $em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findOneBy(array('MHB_ID' => $mhbID));

        if ($mhb->getGehoertZu() == $currentStudiengang) {
            $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();

            $mhbBeschreibung = $mhb->getBeschreibung();
            $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('mhb' => $mhbID));

            $moduleZuMHB = array();
            $pruef = array();
            $veranstaltung = array();
            $vorlp = array();
            foreach ($angebote as $valueA) {
                //TODO: What the actual fuck?
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
                        $name[] = $studiengang->getStudiengang();
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
                        $name[] = $lehrend->getDozent();
                    }
                }
                $lehrendeZuModul[] = $name;
            }

            $voraussetzungZuModul = array();
            foreach ($moduleZuMHB as $modul) {
                $name = array();
                $vorArr = $modul->getModulVoraussetzung();
                foreach ($vorArr as $vor) {
                    $name[] = $vor;
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

            $htmlArr = array();
            $size = sizeof($moduleZuMHB);

            $modulBeschreibungen = array();

            for ($i = 0; $i < $size; $i++) {
                $modulbeschreibung = new ModulBeschreibung();
                $modulbeschreibung->setAngebot($angebote[$i]);
                $modulbeschreibung->setLehrende($lehrendeZuModul[$i]);
                $modulbeschreibung->setLehrveranstaltungen($veranstaltung[$i]);
                $modulbeschreibung->setModul($moduleZuMHB[$i]);
                $modulbeschreibung->setPruefungsformen($pruef[$i]);
                $modulbeschreibung->setStudienplaene($regelsemester[$i]);
                $modulbeschreibung->setStudiengaenge($stgZuModul[$i]);
                $modulbeschreibung->setVoraussetzungen($voraussetzungZuModul[$i]);
                $modulbeschreibung->setVoraussetzungenLP($vorlp[$i]);

                $modulBeschreibungen[] = $modulbeschreibung;

            }

            uasort($modulBeschreibungen, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'modulBeschreibungSort'));

            foreach ($modulBeschreibungen as $modulbeschreibung) {
                $htmlArr[] = $this->renderView('FHBingenMHBBundle:SGL:mhbModul.html.twig', array('modulbeschreibung' => $modulbeschreibung));
            }

            $footerText = "";

            if ($currentStudiengang->getFachbereich() == 1) {
                $footerText = 'Fachbereich 1 - Life Sciences and Engineering';
            }
            if ($currentStudiengang->getFachbereich() == 2) {
                $footerText = 'Fachbereich 2 - Technik, Informatik und Wirtschaft';
            }

            $pdf = $this->get('knp_snappy.pdf')->getOutputFromHtml($htmlArr, array(
                'lowquality' => false,
                'orientation' => 'Portrait',
                'encoding' => 'utf8',
                'header-font-size' => 10,
                'header-left' => $currentUser,
                'header-center' => 'Modulhandbuch ' . $currentStudiengang,
                'header-right' => '[date]',
                'header-spacing' => 5, //in mm
                'footer-font-size' => 10,
                'footer-left' => 'Fachhochschule Bingen',
                'footer-center' => $footerText,
                'footer-right' => '[page]/[toPage]',
                'title' => $mhbBeschreibung,
                'disable-javascript' => true,
                //'cover' => 'cover.html',
                //'toc' => true,
                //'xsl-style-sheet' => 'toc.xsl'
                //'dump-outline' => 'outline.xml',
                //'dump-default-toc-xsl' => 'toc.xsl',

            ));


            return new Response($pdf, 200, array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $mhbBeschreibung . '.pdf"'
            ));
        }

        return new Response('Nicht der eigene Studiengang');
    }

    /**
     * @Route("/restricted/sgl/modulDeaktivierung", name="modulDeaktivierung")
     */
    public function modulDeaktivierungAction()
    {

    }



}