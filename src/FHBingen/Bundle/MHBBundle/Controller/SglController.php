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
use Symfony\Component\Validator\Constraints\Date;

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
        uasort($dummyAngebote, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'angebotSort'));

        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findAll();
        $angeboteOhneDummy = array();
        //Filtert die Angebote mit DummyModul und aus anderen Studiengängen herraus
        foreach ($angebote as $value) {
            if ($value->getCode() != 'DUMMY' && $value->getStudiengang()->getStudiengangID() == $studiengang->getStudiengangID()) {
                $angeboteOhneDummy[] = $value;
            }
        }
        uasort($angeboteOhneDummy, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'angebotSort'));

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

        return array('form' => $form->createView(), 'modul' => $modul, 'pageTitle' => 'Modulcodeerstellung');
    }

    /**
     * @Route("/restricted/sgl/mhbUebersicht", name="mhbUebersicht")
     * @Template("FHBingenMHBBundle:SGL:mhbUebersicht.html.twig")
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
        //TODO: Warum nicht über die ModulhandbuchZuweisung gehen?
        $mhbEintraege = $em
            ->createQuery('SELECT v.Modul_ID, v.Name , v.Kuerzel ,a.Code, v.Haeufigkeit, v.Versionsnummer, d.Titel, d.Nachname, v.Autor
                           FROM  FHBingenMHBBundle:Angebot a
                           JOIN  FHBingenMHBBundle:Veranstaltung v WITH  a.veranstaltung = v.Modul_ID
                            JOIN  FHBingenMHBBundle:ModulhandbuchZuweisung z WITH  z.angebot = a.Angebots_ID
                           JOIN  FHBingenMHBBundle:Dozent d WITH  v.beauftragter = d.Dozenten_ID
                           AND z.mhb = ' . $id . ' ORDER BY v.Name ASC')
            ->getResult();

        //findet die Beschreibung des MHB um MHB-Kontext im Twig anzeigen zulassen
        $mhbBeschreibung = $em
            ->createQuery('SELECT DISTINCT m.Beschreibung
                           FROM  FHBingenMHBBundle:Modulhandbuch m
                           WHERE m.MHB_ID = ' . $id)
            ->getResult();

        //TODO: Anzeigen welches MHB angezeigt wird (Studiengang, Versionsnummer, Beschreibung)

        return array('mhb' => $mhbEintraege, 'beschreibung' => $mhbBeschreibung, 'pageTitle' => 'Module des Modulhandbuchs');
    }





    private function createModulBeschreibungen($mhbID)
    {
        $em = $this->getDoctrine()->getManager();
        $encoder = new JsonEncoder();

        $mhb = $em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findOneBy(array('MHB_ID' => $mhbID));
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('mhb' => $mhbID));
        $studiengang = $mhb->getGehoertZu();

        $modulBeschreibungen = array();

        foreach ($angebote as $angebot) {
            $veranstaltung = $angebot->getVeranstaltung();

            $modulBeschreibung = new ModulBeschreibung();
            $modulBeschreibung->setAngebot($angebot);
            $modulBeschreibung->setVoraussetzungen($veranstaltung->getModulVoraussetzung());
            $modulBeschreibung->setPruefungsformen($encoder->decode($veranstaltung->getPruefungsformen(), 'json'));
            $modulBeschreibung->setLehrveranstaltungen($encoder->decode($veranstaltung->getLehrveranstaltungen(), 'json'));
            $modulBeschreibung->setVoraussetzungenLP($encoder->decode($veranstaltung->getVoraussetzungLP(), 'json'));

            //TODO: Frage ans Team: Bei Studienplänen statt Modul+Studiengang lieber Angebot?
            //$modulBeschreibung->setStudienplaene($veranstaltung->getStudienplanModul());
            $studienplaene = $veranstaltung->getStudienplanModul();
            $studienplaeneZuStudiengang = array();
            foreach ($studienplaene as $studienplan) {
                if ($studienplan->getStudiengang() == $studiengang) {
                    $studienplaeneZuStudiengang[] = $studienplan;
                }
            }
            uasort($studienplaeneZuStudiengang, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'studienplanSort'));
            $modulBeschreibung->setStudienplaene($studienplaeneZuStudiengang);

            $fremdeStudiengaenge = array();
            //hole ALLE angebote, in denen das Modul steckt und hole davon die jeweiligen Studiengänge
            $modulAngebote = $veranstaltung->getAngebot();
            foreach ($modulAngebote as $modulAngebot) {
                if ($modulAngebot->getStudiengang() != $studiengang) {
                    $fremdeStudiengaenge[] = $modulAngebot->getStudiengang();
                }
            }
            array_unique($fremdeStudiengaenge); //wenn es später mehrere Modulhandbücher für einen Studiengang gibt -> neue Angebote -> Dopplungen bei Studiengängen
            $modulBeschreibung->setFremdeStudiengaenge($fremdeStudiengaenge);


            $modulBeschreibungen[] = $modulBeschreibung;
        }

        uasort($modulBeschreibungen, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'modulBeschreibungSort'));

        return $modulBeschreibungen;
    }

    /**
     * PDF-Export Test
     * @Route("/restricted/sgl/pdfErstellen/{mhbID}", name="pdfErstellen")
     */
    public function pdfErstellenAction($mhbID)
    {
        $em = $this->getDoctrine()->getManager();

        $mhb = $em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findOneBy(array('MHB_ID' => $mhbID));
        $studiengang = $mhb->getGehoertZu();
        $sgl = $studiengang->getSgl();

        $modulBeschreibungen = $this->createModulBeschreibungen($mhbID);
        $htmlArr = array();

        foreach ($modulBeschreibungen as $modulBeschreibung) {
            $htmlArr[] = $this->renderView('FHBingenMHBBundle:SGL:mhbModul.html.twig', array('modulBeschreibung' => $modulBeschreibung));
        }

        $footerText = "";

        if ($studiengang->getFachbereich() == 1) {
            $footerText = 'Fachbereich 1 - Life Sciences and Engineering';
        }
        if ($studiengang->getFachbereich() == 2) {
            $footerText = 'Fachbereich 2 - Technik, Informatik und Wirtschaft';
        }

        $pdf = $this->get('knp_snappy.pdf')->getOutputFromHtml($htmlArr, array(
            'lowquality' => false,
            'orientation' => 'Portrait',
            'encoding' => 'utf8',
            'header-font-size' => 10,
            'header-left' => $sgl,
            'header-center' => 'Modulhandbuch ' . $studiengang,
            'header-right' => '[date]',
            'header-spacing' => 5, //in mm
            'footer-font-size' => 10,
            'footer-left' => 'Fachhochschule Bingen',
            'footer-center' => $footerText,
            'footer-right' => '[page]/[toPage]',
            'title' => $mhb->getBeschreibung(),
            'disable-javascript' => true,
            //'cover' => 'cover.html',
            //'toc' => true,
            //'xsl-style-sheet' => 'toc.xsl'
            //'dump-outline' => 'outline.xml',
            //'dump-default-toc-xsl' => 'toc.xsl',

        ));


        return new Response($pdf, 200, array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $mhb->getBeschreibung() . '.pdf"'
        ));
    }




    /**
     * @Route("/restricted/sgl/deaktivierungAlleModule", name="deaktivierungAlleModule")
     * @Template("FHBingenMHBBundle:SGL:modulDeaktivierung.html.twig")
     */
    public function eigeneModuleAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $user));

        $deaktiv = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('Status' => "expired"), array("Name" => 'asc'));

        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('studiengang' => $studiengang));



        $module = array();
        foreach ($angebote as $angebot) {
            $module[] = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $angebot->getVeranstaltung()));
        }


        $stgZuModul = array();
        foreach ($module as $modul) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('veranstaltung' => $modul->getModulID()));
            foreach ($tmp as $stgang) {
                $name[] = (string) $stgang->getStudiengang();
            }
            asort($name, SORT_STRING);

            $stgZuModul[] = $name;
        }

        return array('deaktiv' => $deaktiv, 'module' => $module, 'stgZuModul' => $stgZuModul, 'studiengang' => $studiengang);
    }

    /**
     * @Route("/restricted/sgl/modulDeaktivierung/{modulID}", name="modulDeaktivierung")
     */
    public function modulDeaktivierungAction($modulID)
    {
        $em = $this->getDoctrine()->getManager();

        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $modulID));

        $modul->setStatus('expired');
        $modul->setBeauftragter(null);
        $modul->setErstellungsdatum(new \DateTime());
        $em->persist($modul);

        $angebot = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('veranstaltung' => $modulID));


        foreach ($angebot as $del) {
            $em->remove($del);
        }

        $kernfach = $em->getRepository('FHBingenMHBBundle:Kernfach')->findBy(array('veranstaltung' => $modulID));


        foreach ($kernfach as $del) {
            $em->remove($del);
        }

        $studienplan = $em->getRepository('FHBingenMHBBundle:Studienplan')->findBy(array('veranstaltung' => $modulID));

        foreach ($studienplan as $del) {
            $em->remove($del);
        }

        $lehrende = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('veranstaltung' => $modulID));

        foreach ($lehrende as $del) {
            $em->remove($del);
        }

        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'Das Modul wurde erfolgreich deaktiviert.');

        return $this->redirect($this->generateUrl('deaktivierungAlleModule'));
    }


    /**
     * @Route("/restricted/sgl/mhbErstellung", name="mhbErstellung")
     * @Template("FHBingenMHBBundle:SGL:mhbErstellung.html.twig")
     */
    public function mhbErstellungAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sgl = $this->get('security.context')->getToken()->getUser();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $sgl));
        $mhb = new Entity\Modulhandbuch();
        $form = $this->createForm(new Form\ModulhandbuchType(), $mhb);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $mhbGueltigAb = $form->get('gueltigAb')->getData();
                $mhbBeschreibung = $form->get('beschreibung')->getData(); //TODO: automatisch generieren lassen?
                //$mhbErstellungsdatum wird automatisch gesetzt
                //$mhbGehoertZu wid automatisch gesetzt

                return $this->redirect($this->generateUrl('mhbZusammenstellung', array(
                    'mhbGueltigAb' => $mhbGueltigAb,
                    'mhbBeschreibung' => $mhbBeschreibung, //TODO: automatisch generieren lassen?
                )));

            }

        }

        return array('form' => $form->createView(), 'mhb' => $mhb, 'pageTitle' => 'Modulhandbuch-Erstellung');
    }


    /**
     * @Route("/restricted/sgl/mhbZusammenstellung/{mhbGueltigAb}/{mhbBeschreibung}", name="mhbZusammenstellung")
     * @Template("FHBingenMHBBundle:SGL:mhbZusammenstellung.html.twig")
     */
    public function mhbZusammenstellungAction($mhbGueltigAb, $mhbBeschreibung)
    {
        $em = $this->getDoctrine()->getManager();
        $sgl = $this->get('security.context')->getToken()->getUser();

        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $sgl));
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('studiengang' => $studiengang));

        $zuordnung = array();
        $fachgebiete = $em->getRepository('FHBingenMHBBundle:Fachgebiet')->findBy(array('studiengang' => $studiengang));

        foreach ($fachgebiete as $fachgebiet) {
            $zuordnung[$fachgebiet->getTitel()] = array();
        }

        foreach ($angebote as $angebot) {
            $zuordnung[$angebot->getFachgebiet()->getTitel()][] = $angebot;
        }

        //return array('zuordnung' => $zuordnung, 'mhbID' => $mhbID, 'pageTitle' => 'Modulhandbuch-Zusammenstellung');
        return array(
            'zuordnung' => $zuordnung,
            'mhbGueltigAb' => $mhbGueltigAb,
            'mhbBeschreibung' => $mhbBeschreibung, //TODO: automatisch generieren lassen?
            'pageTitle' => 'Modulhandbuch-Zusammenstellung',
        );
    }


    /**
     * @Route("/restricted/sgl/mhbEstellungParsen", name="mhbErstellungParsen")
     */
    public function mhbErstellungParseAction()
    {
        if (!empty($_POST)) {
            $em = $this->getDoctrine()->getManager();

            $sgl = $this->get('security.context')->getToken()->getUser();
            $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $sgl));

            $mhb = new Entity\Modulhandbuch();
            $mhb->setErstellungsdatum(new \DateTime());
            $mhb->setGehoertZu($studiengang);

            $version = $em
                    ->createQuery('SELECT MAX(m.Versionsnummer )AS V
                           FROM  FHBingenMHBBundle:Modulhandbuch m
                           WHERE m.gehoertZu=' . $studiengang->getStudiengangID())
                    ->getSingleResult();
            $version['V']++;
            $mhb->setVersionsnummer($version['V']);

            $angebote = array();

            foreach ($_POST as $key => $value) {
                //break statements richtig?
                switch ($key) {
                    case 'mhbGueltigAb':
                        $mhb->setGueltigAb($em->getRepository('FHBingenMHBBundle:Semester')->findOneBy(array('Semester' => $value)));
                        break;
                    case 'mhbBeschreibung':
                        $mhb->setBeschreibung($value); //TODO: automatisch generieren lassen?
                        break;
                    default:
                        $angebote[] = $em->getRepository('FHBingenMHBBundle:Angebot')->findOneById($value);
                        break;
                }
            }

            $em->persist($mhb);

            foreach ($angebote as $angebot) {
                $zuweisung = new Entity\ModulhandbuchZuweisung();
                $zuweisung->setMhb($mhb);
                $zuweisung->setAngebot($angebot);
                $em->persist($zuweisung);
            }

            $em->flush();

            $this->get('session')->getFlashBag()->add('info', 'Das Modulhandbuch wurde erfolgreich angelegt.');

            return $this->redirect($this->generateUrl('mhbUebersicht'));

        } else {
            return new Response('$_POST was empty');
        }



    }


}