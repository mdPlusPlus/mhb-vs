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
        $dummyAngebote = $em->getRepository('FHBingenMHBBundle:Angebot')
            ->findBy(array('Code' => 'DUMMY', 'studiengang' => $studiengang));
        uasort($dummyAngebote, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'angebotSort'));

        //Filtert die Angebote mit DummyModul und aus anderen Studiengängen herraus
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findAll();
        $angeboteOhneDummy = array();
        foreach ($angebote as $value) {
            if ($value->getCode() != 'DUMMY' && $value->getStudiengang()->getStudiengangID() == $studiengang->getStudiengangID()) {
                $angeboteOhneDummy[] = $value;
            }
        }
        uasort($angeboteOhneDummy, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'angebotSort'));

        return array('angebote' => $angeboteOhneDummy, 'dummyAngebote' => $dummyAngebote, 'studiengang' => $studiengang, 'pageTitle' => 'Modulcodes');
    }


    /**
     * @Route("/restricted/sgl/modulCodeErstellung/{id}/{studiengangid}", name="modulCodeErstellung")
     * @Template("FHBingenMHBBundle:SGL:modulCodeErstellung.html.twig")
     */
    public function modulCodeErstellungAction($id, $studiengangid)
    {
        $em = $this->getDoctrine()->getManager();
        $angebot = $em->getRepository('FHBingenMHBBundle:Angebot')->findOneBy(array('veranstaltung' => $id, 'studiengang' => $studiengangid));
        $modul = $angebot->getVeranstaltung();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('Studiengang_ID' => $studiengangid));
        $form = $this->createForm(new Form\CodeType(), $angebot);

        $request = $this->get('request');
        $form->handleRequest($request);
        //Speichert den neuen Modulcode in der Angebotstabelle
        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $angebot->setCode($form->get('code')->getData());
                $em->persist($angebot);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Der Code wurde erfolgreich bearbeitet.');

                return $this->redirect($this->generateUrl('modulCodeUebersicht'));
            }

        }

        return array('form' => $form->createView(), 'modul' => $modul,'studiengang' => $studiengang, 'pageTitle' => 'Modulcodeerstellung');
    }


    /**
     * @Route("/restricted/sgl/mhbUebersicht", name="mhbUebersicht")
     * @Template("FHBingenMHBBundle:SGL:mhbUebersicht.html.twig")
     */
    public function mhbUebersichtAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mhbs = $em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findAll();

        return array('mhb' => $mhbs, 'pageTitle' => 'Modulhandbücher');
    }


    /**
     * @Route("/restricted/sgl/modulAenderungen", name="modulAenderungen")
     * @Template("FHBingenMHBBundle:SGL:modulAenderungen.html.twig")
     */
    public function modulAenderungenAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $dozent->getDozentenID()));

        $datum = $this->getNewestMHBDateForMyCourse();

        $veranstaltungenBearbeitet = $em->createQuery('SELECT v.Modul_ID,v.Name,v.Kuerzel,v.Erstellungsdatum,v.Autor
                                  FROM  FHBingenMHBBundle:Veranstaltung v
                                  JOIN  FHBingenMHBBundle:Angebot a WITH a.studiengang='.$studiengang->getStudiengangID().' And v.Modul_ID = a.veranstaltung
                                  WHERE v.Erstellungsdatum > :mhbDatum'
                                 .' ORDER BY v.Name ASC')->setParameter('mhbDatum', $datum) ;
        $resultModul = $veranstaltungenBearbeitet->getResult();

        return array('module' => $resultModul, 'pageTitle' => 'Geänderte Module', 'dateTime' => $datum);
    }

    private function getNewestMHBDateForMyCourse()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $dozent->getDozentenID()));
        $em = $this->getDoctrine()->getManager();

        $mhbs = $em->createQuery(
            'SELECT Max(m.Erstellungsdatum) as Erstellungsdatum
            FROM  FHBingenMHBBundle:Modulhandbuch m
            WHERE m.gehoertZu='.$studiengang->getStudiengangID()
        );
        $resultMHB =$mhbs->getResult();

        //TODO: kommentieren!
        $datum = '01.01.1970';
        foreach ($resultMHB as $value) {
            foreach ($value as $v) {
                $datum = $v;
            }
        }

        return new \DateTime($datum);
    }


    /**
     * @Route("/restricted/sgl/mhbModulListe/{id}", name="mhbModulListe")
     * @Template("FHBingenMHBBundle:SGL:mhbModulListe.html.twig")
     */
    public function mhbModulListe($id)
    {
        $em = $this->getDoctrine()->getManager();
        //findet alle Veranstaltungen die dem MHB zugeordnet sind
        $mhbEintraege = $em->getRepository('FHBingenMHBBundle:ModulhandbuchZuweisung')->findBy(array('mhb' => $id));
        //findet die Beschreibung des MHB um MHB-Kontext im Twig anzeigen zulassen
        $mhb =$em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findOneBy(array('MHB_ID' => $id));

        return array('mhbEintraege' => $mhbEintraege, 'mhb' => $mhb, 'pageTitle' => 'Module des Modulhandbuchs');
    }


    private function createModulBeschreibungen($mhbID)
    {
        $em = $this->getDoctrine()->getManager();
        $encoder = new JsonEncoder();

        $mhb = $em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findOneBy(array('MHB_ID' => $mhbID));
        $zuweisungen = $mhb->getZuweisung();
        $studiengang = $mhb->getGehoertZu();

        $modulBeschreibungen = array();

        foreach ($zuweisungen as $zuweisung) {
            $angebot = $zuweisung->getAngebot();
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
            //hole ALLE Angebote, in denen das Modul steckt und hole davon die jeweiligen Studiengänge
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


        $previousFachgebiet = "";
        foreach ($modulBeschreibungen as $modulBeschreibung) {
            $currentFachgebiet = $modulBeschreibung->getAngebot()->getFachgebiet()->getTitel();
            if ($currentFachgebiet != $previousFachgebiet) {
                $fachgebietHasChanged = true;
            } else {
                $fachgebietHasChanged = false;
            }
            $previousFachgebiet = $currentFachgebiet;

            $htmlArr[] = $this->renderView('FHBingenMHBBundle:SGL:mhbModul.html.twig', array('modulBeschreibung' => $modulBeschreibung, 'fachgebietHasChanged' => $fachgebietHasChanged));
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
            'header-right' => date('d.m.Y'), //'[date]',
            'header-spacing' => 5, //in mm
            'footer-font-size' => 10,
            'footer-left' => 'Fachhochschule Bingen',
            'footer-center' => $footerText,
            'footer-right' => '[page]/[toPage]',
            'title' => $mhb->getBeschreibung(), //TODO: Ändern auf $studiengang + $versionsnummer?
            'disable-javascript' => true,
            'no-outline' => true,
            //'cover' => 'cover.html',
            //'toc' => true,
            //'xsl-style-sheet' => 'toc.xsl'
            //'dump-outline' => 'outline.xml',
        ));

        return new Response($pdf, 200, array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $mhb->getBeschreibung() . '.pdf"' //TODO: Ändern auf $studiengang + $versionsnummer?
        ));
    }


    /**
     * @Route("/restricted/sgl/deaktivierungAlleModule", name="deaktivierungAlleModule")
     * @Template("FHBingenMHBBundle:SGL:modulDeaktivierung.html.twig")
     */
    public function deaktivierungModuleAction()
    {
        //TODO: Abfrage ja/nein "wollen sie das wirklich?"
        //TODO: Unterscheidung in ALLEN studiengängen deaktiveren oder nur in eigenem Studiengang
        //TODO: Vorsortierung (aus DB) der Module des Studiengangs
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $user));

        $deaktiv = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('Status' => "expired"), array("Name" => 'asc'));

        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('studiengang' => $studiengang));


        $module = array();
        foreach ($angebote as $angebot) {
            $module[] = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $angebot->getVeranstaltung()));
        }
        asort($module, SORT_STRING);

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
        $form = $this->createForm(new Form\ModulhandbuchType(), new Entity\Modulhandbuch());

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

        return array('form' => $form->createView(), 'pageTitle' => 'Modulhandbuch-Erstellung');
    }


    /**
     * @Route("/restricted/sgl/mhbZusammenstellung/{mhbGueltigAb}/{mhbBeschreibung}", name="mhbZusammenstellung")
     * @Template("FHBingenMHBBundle:SGL:mhbZusammenstellung.html.twig")
     */
    public function mhbZusammenstellungAction($mhbGueltigAb, $mhbBeschreibung)
    {
        //TODO: Button "Alle zu MHB hinzufügen"
        //TODO: Doku: Reihenfolge der ins MHB aufgenommen Module egal
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

        //sortieren
        foreach ($zuordnung as $key => $value) {
            uasort($zuordnung[$key], array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'angebotSort'));
        }

        $datum = $this->getNewestMHBDateForMyCourse();

        return array(
            'neuestesMHBDateTime' => $datum,
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
        $request = $this->get('request');

        if (!empty($_POST)) {
            $em = $this->getDoctrine()->getManager();

            $sgl = $this->get('security.context')->getToken()->getUser();
            $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $sgl));

            $mhb = new Entity\Modulhandbuch();
            $mhb->setErstellungsdatum(new \DateTime());
            $mhb->setGehoertZu($studiengang);

            $version = $em
                ->createQuery('SELECT MAX(m.Versionsnummer) AS V
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
                        $mhbGueltigAb = $em->getRepository('FHBingenMHBBundle:Semester')->findOneBy(array('Semester' => $value));
                        $mhb->setGueltigAb($mhbGueltigAb);
                        break;
                    case 'mhbBeschreibung':
                        $mhbBeschreibung = $value;
                        $mhb->setBeschreibung($mhbBeschreibung); //TODO: automatisch generieren lassen?
                        break;
                    default:
                        $angebote[] = $em->getRepository('FHBingenMHBBundle:Angebot')->findOneBy(array('Angebots_ID' =>$value));
                        break;
                }
            }

            if (!empty($angebote)) {
                $em->persist($mhb);
                $em->flush(); //hier notwending!

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
                $this->get('session')->getFlashBag()->add('info', 'Es wurden keine Angebote übergeben. Bitte ziehen Sie die gewünschten Angebote in das Feld MHB.');

                return $this->redirect($this->generateUrl('mhbZusammenstellung', array('mhbGueltigAb' => $mhbGueltigAb, 'mhbBeschreibung' => $mhbBeschreibung)));
            }

        } else {
            return new Response('$_POST was empty');
        }
    }

}