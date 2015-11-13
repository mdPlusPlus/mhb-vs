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
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

/**
 * Class SglController
 *
 * Beinhaltet alle Funktionen für Studiengangleiter
 *
 * @package FHBingen\Bundle\MHBBundle\Controller
 */
class SglController extends Controller
{
    /**
     * legt fest wo die Modulhandbücher als PDF gespeichert werden
     */
    const MHB_PATH = 'mhb';

    /**
     * Pfad zur Windows-Binary von wkhtmltopdf
     */
    const WKHTMLTOPDF_BIN_WIN = '"C:\\Program Files\\wkhtmltopdf\\bin\\wkhtmltopdf.exe"';

    /**
     * Pfad zur Linux-Binary von wkhtmltopdf
     */
    const WKHTMLTOPDF_BIN_LIN = '../vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64';
    //const WKHTMLTOPDF_BIN_LIN = '/usr/bin/wkhtmltopdf';
    //const WKHTMLTOPDF_BIN_LIN = '/usr/local/bin/wkhtmltopdf';



    /**
     * @Route("/restricted/sgl/alleModule", name="alleModule")
     * @Template("FHBingenMHBBundle:SGL:alleModule.html.twig")
     *
     * Sucht alle Module die nicht in Planung oder Expired sind.
     * Zusätzlich werden die Studiengänge angezeigt in denen sie Angeboten werden
     *
     * @return array
     */
    public function alleModuleAction()//Sortierung? nach Studiengang?
    {
        $em = $this->getDoctrine()->getManager();
        $freigegebeneModule = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('Status' => 'Freigegeben'), array('Name' => 'ASC'));

        //Sucht die Studiengänge für die Module herraus
        $stgZuModul = array();
        foreach ($freigegebeneModule as $modul) {
            $studiengaenge = array();
            $angebote = $modul->getAngebot();
            foreach ($angebote as $angebot) {
                $studiengaenge[] = $angebot->getStudiengang();
            }
            asort($studiengaenge, SORT_STRING);//Sortiert die Studiengänge nach Name
            $stgZuModul[] = $studiengaenge;
        }

//        $loader = $this->get('twig.loader');
//        $filter = new \Twig_SimpleFilter('toStringSort', function ($arr) {
//                return asort($arr, SORT_STRING);
//        });
//        $twig = new \Twig_Environment($loader);
//        $twig->addFilter($filter);

        return array('module' => $freigegebeneModule, 'stgZuModul' => $stgZuModul, 'pageTitle' => 'Alle Module');
    }


    /**
     * @Route("/restricted/sgl/modulCodeUebersicht", name="modulCodeUebersicht")
     * @Template("FHBingenMHBBundle:SGL:modulCodeUebersicht.html.twig")
     *
     * Zeigt alle Angebote ohne Modulcode aus dem Studiengangs des Angemeldeten SGLs an.
     * Zeigt zusätzlich die Angebote, die einen sinnvollen vom SGL vergebenen Modulcode haben.
     * @return array
     */
    public function modulCodeUebersichtAction()
    {
        $em = $this->getDoctrine()->getManager();
        //$user = $this->get('security.context')->getToken()->getUser();
        //$userMail = $user->getUsername();
        //$dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $dozent = $this->get('security.context')->getToken()->getUser();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $dozent->getDozentenID()));

        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('studiengang' => $studiengang));
        $angeboteOhneCode = array();
        $angeboteMitCode = array();
        foreach ($angebote as $angebot) {
            $modulcodezuweisung = $em->getRepository('FHBingenMHBBundle:Modulcodezuweisung')->findOneBy(array(
                'studiengang'   => $angebot->getStudiengang(),
                'fachgebiet'    => $angebot->getFachgebiet(),
                'veranstaltung' => $angebot->getVeranstaltung()
            ));
            if (is_null($modulcodezuweisung)) {
                $angeboteOhneCode[] = $angebot;
            } else {
                $angeboteMitCode[] = $angebot;
            }
        }
        uasort($angeboteOhneCode, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'angebotSort'));
        uasort($angeboteMitCode, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'angebotSort'));

        return array('angeboteOhneCode' => $angeboteOhneCode, 'angeboteMitCode' => $angeboteMitCode, 'studiengang' => $studiengang, 'pageTitle' => 'Modulcodes');
    }


    /**
     * @param int $studiengangID
     * @param int $veranstaltungID
     *
     * @Route("/restricted/sgl/modulCodeErstellung/{studiengangID}/{veranstaltungID}", name="modulCodeErstellung")
     * @Template("FHBingenMHBBundle:SGL:modulCodeErstellung.html.twig")
     *
     * updatet einen bestimmten Modulcode anhand der angegebenen Daten
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function modulCodeErstellungAction($studiengangID, $veranstaltungID)
    {
        $em = $this->getDoctrine()->getManager();

        $angebot = $em->getRepository('FHBingenMHBBundle:Angebot')->findOneBy(array('studiengang' => $studiengangID, 'veranstaltung' => $veranstaltungID));

        if (!is_null($angebot)) {
            $modulcodezuweisung = $em->getRepository('FHBingenMHBBundle:Modulcodezuweisung')->findOneBy(array(
                'studiengang' => $angebot->getStudiengang(),
                'fachgebiet' => $angebot->getFachgebiet(),
                'veranstaltung' => $angebot->getVeranstaltung(),
            ));

            if (is_null($modulcodezuweisung)) {
                $modulcodezuweisung = new Entity\Modulcodezuweisung();
                $modulcodezuweisung->setStudiengang($angebot->getStudiengang());
                $modulcodezuweisung->setFachgebiet($angebot->getFachgebiet());
                $modulcodezuweisung->setVeranstaltung($angebot->getVeranstaltung());
            }

            $form = $this->createForm(new Form\CodeType(), $modulcodezuweisung);

            $request = $this->get('request');
            $form->handleRequest($request);
            //Speichert den neuen Modulcode in der Angebotstabelle
            if ($request->getMethod() == 'POST') {
                if ($form->isValid()) {
                    $em->persist($modulcodezuweisung);
                    $em->flush();

                    $this->get('session')->getFlashBag()->add('info', 'Der Code wurde erfolgreich bearbeitet.');

                    return $this->redirect($this->generateUrl('modulCodeUebersicht'));
                }

            }

            return array('form' => $form->createView(), 'angebot' => $angebot, 'pageTitle' => 'Modulcodeerstellung');
        } else {
            return new Response('Fehler: Es wurde kein Angebot-Entity mit dem Studiengang ' . $studiengangID . ' und der Veranstaltung ' . $veranstaltungID . ' gefunden.');
        }


    }


    /**
     * @Route("/restricted/sgl/mhbUebersicht", name="mhbUebersicht")
     * @Template("FHBingenMHBBundle:SGL:mhbUebersicht.html.twig")
     *
     * Zeigt alle Modulhandbücher an
     * @return array
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
     *
     * Zeigt die Veranstaltungen die sich seit anlegen des letzten MHBs in dem Studiengang des SGLs geändert haben
     *
     * @return array
     */
    public function modulAenderungenAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $user));
        //Sucht das neuste Erstelldatum der MHBs des Studiengangs heraus
        $datum = $this->getNewestMHBDateForMyCourse();

        //prüft welche Veranstaltungen ein Änderungsdatum haben, das aktueller als das des neusten MHBs ist
        $geaenderteVeranstaltungenQuery = $em->createQuery(
            'SELECT v
            FROM  FHBingenMHBBundle:Veranstaltung v
            JOIN  FHBingenMHBBundle:Angebot a WITH a.studiengang=' . $studiengang->getStudiengangID() . ' AND v.Modul_ID = a.veranstaltung
            WHERE v.Erstellungsdatum > :mhbDatum ORDER BY v.Name ASC')
            ->setParameter('mhbDatum', $datum);
        $geaenderteVeranstaltungen = $geaenderteVeranstaltungenQuery->getResult();

        return array('module' => $geaenderteVeranstaltungen, 'pageTitle' => 'Geänderte Module aus ' . (string) $studiengang, 'dateTime' => $datum);
    }


    /**
     * @return \DateTime
     */
    private function getNewestMHBDateForMyCourse()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $user));
        //Sucht das neuste Erstelldatum der MHBs des Studiengangs herraus
        $mhbs = $em->createQuery(
            'SELECT MAX(m.Erstellungsdatum) AS Erstellungsdatum
            FROM  FHBingenMHBBundle:Modulhandbuch m
            WHERE m.gehoertZu=' . $studiengang->getStudiengangID()
        );
        $resultMHB = $mhbs->getResult();

        //Da das return Value des QueryBuilers ein zweifach verschachteltes Array ist und wir das Ergebnis weiter verwenden wollen,
        //macht es Sinn, das Datum direkt als String in einer Variable zu speichern
        //TODO: so wie bei Versionsnummer ändern getSingleResult und  ['Erstellungsdatum']
        $datum = '01.01.1970';
        foreach ($resultMHB as $value) {
            foreach ($value as $v) {
                if ($v != null) {
                    $datum = $v;
                }
            }
        }

        return new \DateTime($datum);
    }


    /**
     * Erstellt die Modulbeschreibungen für das Modulhandbuch
     *
     * @param Entity\Modulhandbuch $mhb
     * @param array                $angebote
     *
     * @return array
     */
    private function createModulBeschreibungen(Entity\Modulhandbuch $mhb, array $angebote)
    {
        $encoder = new JsonEncoder();
        $studiengang = $mhb->getGehoertZu();
        $modulBeschreibungen = array();



        foreach ($angebote as $angebot) {
            $veranstaltung = $angebot->getVeranstaltung();

            $modulBeschreibung = new ModulBeschreibung();
            $modulBeschreibung->setAngebot($angebot);
            $modulBeschreibung->setVoraussetzungen($veranstaltung->getGrundmodul());
            $modulBeschreibung->setPruefungsformen($encoder->decode($veranstaltung->getPruefungsformen(), 'json'));
            $modulBeschreibung->setLehrveranstaltungen($encoder->decode($veranstaltung->getLehrveranstaltungen(), 'json'));
            $modulBeschreibung->setVoraussetzungenLP($encoder->decode($veranstaltung->getVoraussetzungLP(), 'json'));

            //TODO: Frage ans Team: Bei Studienplänen statt Modul+Studiengang lieber Angebot?
/*          $modulBeschreibung->setStudienplaene($veranstaltung->getStudienplanModul());
            $studienplaene = $veranstaltung->getStudienplanModul();
            $studienplaeneZuStudiengang = array();
            foreach ($studienplaene as $studienplan) {
                if ($studienplan->getStudiengang() == $studiengang) {
                    $studienplaeneZuStudiengang[] = $studienplan;
                }
            }
            uasort($studienplaeneZuStudiengang, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'studienplanSort'));
            $modulBeschreibung->setStudienplaene($studienplaeneZuStudiengang);
*/
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
     * PDF-Download
     *
     * @param int $mhbID
     *
     * @return BinaryFileResponse
     *
     * @Route("/restricted/sgl/pdfDownload/{mhbID}", name="pdfDownload")
     */
    public function pdfDownloadAction($mhbID)
    {
        $em = $this->getDoctrine()->getManager();
        $mhb = $em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findOneBy(array('MHB_ID' => $mhbID));

        $pdfPath = self::MHB_PATH . DIRECTORY_SEPARATOR . $mhb->getMhbTitel() . '.pdf';

        //return new BinaryFileResponse($pdfPath);
        return new BinaryFileResponse(
            $pdfPath,
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="'. $mhb->getMhbTitel() .'.pdf"',
            )
        );
    }


    /**
     * PDF-Export
     *
     * Erstellt das Modulhanbduch mit Hilfe der Daten aus der Datenbank und erstellt das MHB-PDF
     *
     * @param Entity\Modulhandbuch $mhb
     * @param array                $angebote
     */
    private function pdfErstellenAction(Entity\Modulhandbuch $mhb, array $angebote)
    {
        $em = $this->getDoctrine()->getManager();

        $studiengang = $mhb->getGehoertZu();
        $modulBeschreibungen = $this->createModulBeschreibungen($mhb, $angebote);


        //create temporary file for the cover
        $pathToCover = $mhb->getGehoertZu()->getKuerzel() . '_' . rand(10000, 65536) . '.html';
        file_put_contents($pathToCover, $this->getMHBCoverHTML($mhb));


        $footerText = '';

        if ($studiengang->getFachbereich() == 1) {
            $footerText = 'Fachbereich 1 - Life Sciences and Engineering';
        }
        if ($studiengang->getFachbereich() == 2) {
            $footerText = 'Fachbereich 2 - Technik, Informatik und Wirtschaft';
        }

        $pfad = self::MHB_PATH . DIRECTORY_SEPARATOR; //Konstante
        //$pfad = 'mhb' . DIRECTORY_SEPARATOR;
        $titel = $mhb->getMhbTitel(); //TODO: Wichtig! Studiengangkürzel darf nicht mehr änderbar sein, sonst findet man den DL-Link nicht mehr!
        $output =  $pfad . $titel. '.pdf';

        $wkthmltopdfOptions = array(
            'lowquality' => false,
            'orientation' => 'Portrait',
            'encoding' => 'utf8',
            'header-font-size' => 10,
            'header-left' => $studiengang->getKuerzel(),
            'header-center' => 'Modulhandbuch ' . $studiengang,
            'header-right' => 'Stand vom ' . date('d.m.Y'),
            'header-spacing' => 5, //in mm
            'footer-font-size' => 10,
            'footer-left' => 'Fachhochschule Bingen',
            'footer-center' => $footerText,
            'footer-right' => '[page]/[toPage]',
            'footer-spacing' => 5, //in mm
            'title' => $titel,
            'disable-javascript' => true,
            //'no-outline' => true,
            //'dump-outline' => 'outline.xml',
            'cover' => $pathToCover,
            //'load-error-handling' => 'ignore',    //nur testweise
        );

        //OS check
        if (strpos(php_uname(), 'Windows') === false) {
            //not windows
            $this->get('knp_snappy.pdf')->getInternalGenerator()->setBinary(self::WKHTMLTOPDF_BIN_LIN);

            //funktioniert unter windows nicht
            $wkthmltopdfOptions['toc'] = true;
            $wkthmltopdfOptions['xsl-style-sheet'] = 'bundles/fhbingenmhb/xsl/toc.xsl';
        } else {
            //windows
            $this->get('knp_snappy.pdf')->getInternalGenerator()->setBinary(self::WKHTMLTOPDF_BIN_WIN);
        }

        $html = $this->renderView('FHBingenMHBBundle:SGL:mhbModul.html.twig', array('modulBeschreibungen' => $modulBeschreibungen));

        $this->get('knp_snappy.pdf')->getInternalGenerator()->generateFromHtml($html, $output, $wkthmltopdfOptions, true); //overwrite

        $em->persist($mhb);
        $em->flush();

        //removes the temporary file;
        unlink($pathToCover);
    }


    /**
     * @param Entity\Modulhandbuch $mhb
     *
     * @return string
     */
    private function getMHBCoverHTML(Entity\Modulhandbuch $mhb)
    {
        $html = $this->render('@FHBingenMHB/SGL/mhbCover.html.twig', array(
            'studiengang' => $mhb->getGehoertZu(),
            'mhb' => $mhb,
            'datum' => date('d.m.Y', time()),
        ))->getContent();

        return $html;
    }


    /**
     * @Route("/restricted/sgl/deaktivierungAlleModule", name="deaktivierungAlleModule")
     * @Template("FHBingenMHBBundle:SGL:modulDeaktivierung.html.twig")
     *
     * Zeigt die Veranstaltung aus dem eigenen Studiengang und gibt die Möglichkeit diese zu deaktivieren.
     *
     * @return array
     */
    public function modulDeaktivierungUebersichtAction()
    {
        //TODO: Abfrage ja/nein "wollen sie das wirklich?"
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $user));

        $deaktiv = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('Status' => "expired"), array("Name" => 'asc'));

        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('studiengang' => $studiengang));


        $module = array();
        foreach ($angebote as $angebot) {
            $module[] = $angebot->getVeranstaltung();
        }
        uasort($module, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions','veranstaltungSort'));

        $stgZuModul = array();
        foreach ($module as $modul) {
            $name = array();
            $angebote = $modul->getAngebot();
            foreach ($angebote as $angebot) {
                $name[] = $angebot->getStudiengang();
            }
            asort($name, SORT_STRING);


            $stgZuModul[] = $name;
        }

        return array('deaktiv' => $deaktiv, 'module' => $module, 'stgZuModul' => $stgZuModul, 'studiengang' => $studiengang, 'pageTitle' => 'Moduldeaktiverung');
    }


    /**
     * @param int $modulID
     *
     * @Route("/restricted/sgl/modulDeaktivierung/{modulID}", name="modulDeaktivierung")
     *
     * Deaktiviert eine Veranstalltung komplett.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function modulDeaktivierungAction($modulID)
    {
        //[mdPlusPlus]: von mir neu geschrieben
        $em = $this->getDoctrine()->getManager();
        $veranstaltung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $modulID));
        $angebote = $veranstaltung->getAngebot();
        foreach ($angebote as $angebot) {
            $em->remove($angebot);
            $em->flush(); //hier in Schleife notwendig
        }
        //alles andere erledigt die preRemove()-Funktion des AngebotListeners
        //

        $this->get('session')->getFlashBag()->add('info', 'Das Modul wurde erfolgreich deaktiviert.');

        return $this->redirect($this->generateUrl('deaktivierungAlleModule'));
    }


    /**
     * @param int $modulID
     * @param int $studiengangID
     *
     * @Route("/restricted/sgl/modulDeaktivierungStg/{modulID}/{studiengangID}", name="modulDeaktivierungStg")
     *
     * Deaktiviert eine Veranstaltung nur für bestimmte Studiengänge.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function modulDeaktivierungStgAction($modulID, $studiengangID)
    {
        //[mdPlusPlus]: von mir neu geschrieben
        $em = $this->getDoctrine()->getManager();
        $angebot = $em->getRepository('FHBingenMHBBundle:Angebot')->findOneBy(array('veranstaltung' => $modulID, 'studiengang' => $studiengangID));
        $em->remove($angebot);
        $em->flush();
        //alles andere erledigt die preRemove()-Funktion des AngebotListeners
        //

        $this->get('session')->getFlashBag()->add('info', 'Das Modul wurde erfolgreich deaktiviert.');

        return $this->redirect($this->generateUrl('deaktivierungAlleModule'));
    }


    /**
     * @Route("/restricted/sgl/mhbErstellung", name="mhbErstellung")
     * @Template("FHBingenMHBBundle:SGL:mhbErstellung.html.twig")
     *
     * Erstellt ein Modulhandbuch
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function mhbErstellungAction()
    {
        $form = $this->createForm(new Form\ModulhandbuchType(), new Entity\Modulhandbuch()); //TODO: Warum neues Entity übergeben?

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
     * @param Entity\Semester $mhbGueltigAb
     * @param string          $mhbBeschreibung
     *
     * @Route("/restricted/sgl/mhbZusammenstellung/{mhbGueltigAb}/{mhbBeschreibung}", name="mhbZusammenstellung")
     * @Template("FHBingenMHBBundle:SGL:mhbZusammenstellung.html.twig")
     *
     * Ermöglicht dem User das hinzufügen von Angeboten in ein Modulhandbuch
     *
     * @return array
     */
    public function mhbZusammenstellungAction(Entity\Semester $mhbGueltigAb, $mhbBeschreibung)
    {
        //TODO: Doku: Reihenfolge der ins MHB aufgenommen Module egal
        $em = $this->getDoctrine()->getManager();
        $sgl = $this->get('security.context')->getToken()->getUser();

        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $sgl));
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('studiengang' => $studiengang));

        $angeboteMitCode = array();
        foreach ($angebote as $an) {
            if (!is_null($an->getCode())) {
                $angeboteMitCode[] = $an;
            }
        }
        $angebote = $angeboteMitCode;

        $zuordnung = array();
        $zuordnung[null] = array(); //ohne Fachgebiet (kann nur Wahlpflichtfach sein)
        $fachgebiete = $em->getRepository('FHBingenMHBBundle:Fachgebiet')->findBy(array('studiengang' => $studiengang));

        foreach ($fachgebiete as $fachgebiet) {
            $zuordnung[$fachgebiet->getTitel()] = array();
        }

        foreach ($angebote as $angebot) {
            if (!is_null($angebot->getFachgebiet())) {
                $zuordnung[$angebot->getFachgebiet()->getTitel()][] = $angebot;
            } else {
                $zuordnung[null][] = $angebot;
            }

        }

        //sortieren
        ksort($zuordnung);
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
     *
     * Speichert die Angebote in ein Modulhandbuch
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function mhbErstellungParseAction()
    {
        $request = $this->get('request');

        if (!empty($request->request)) {
            $em = $this->getDoctrine()->getManager();

            $sgl = $this->get('security.context')->getToken()->getUser();
            $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $sgl));

            $mhb = new Entity\Modulhandbuch();
            $mhb->setErstellungsdatum(new \DateTime());
            $mhb->setGehoertZu($studiengang);

            $alteVersion = $em->createQuery(
                'SELECT MAX(m.Versionsnummer) AS V
                FROM  FHBingenMHBBundle:Modulhandbuch m
                WHERE m.gehoertZu=' . $studiengang->getStudiengangID())
                ->getSingleResult();
            $mhb->setVersionsnummer($alteVersion['V'] + 1);
            $mhb->setAutor($sgl);

            $angebote = array();

            foreach ($request->request as $key => $value) {
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
                $this->pdfErstellenAction($mhb, $angebote); //schreibt das PDF

                $this->get('session')->getFlashBag()->add('info', 'Das Modulhandbuch wurde erfolgreich angelegt.');

                return $this->redirect($this->generateUrl('mhbUebersicht'));
            } else {
                $this->get('session')->getFlashBag()->add('info', 'Es wurden keine Angebote übergeben. Bitte ziehen Sie die gewünschten Angebote in das Feld MHB.');

                return $this->redirect($this->generateUrl('mhbZusammenstellung', array('mhbGueltigAb' => $mhbGueltigAb, 'mhbBeschreibung' => $mhbBeschreibung)));
            }

        } else {
            return new Response('request was empty');
        }
    }

    /**
     * @Route("/restricted/sgl/semesterListe", name="semesterListe")
     * @Template("@FHBingenMHB/SGL/semesterListe.html.twig")
     *
     * @return array
     */
    public function semesterListeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $semesterListe = $em->getRepository('FHBingenMHBBundle:Semester')->findAll();
        uasort($semesterListe, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'semesterSort'));

        return array('semesterListe' => $semesterListe, 'pageTitle' => 'Semesterliste');
    }

    /**
     * @param string $semesterString
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/restricted/sgl/semesterPlan/{semesterString}", name="semesterPlan")
     * @Template("@FHBingenMHB/SGL/semesterPlanListe.html.twig")
     */
    public function semesterPlanAction($semesterString)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $userid = $user->getDozentenID();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('sgl' => $userid));
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('studiengang' => $studiengang->getStudiengangID()));
        uasort($angebote, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'angebotSort'));

        $semester = $em->getRepository('FHBingenMHBBundle:Semester')->findOneBy(array('Semester' => $semesterString));

        foreach ($angebote as $angebot) {
            $semesterplaene = $em->getRepository('FHBingenMHBBundle:Semesterplan')->findOneBy(array('semester' => $semester, 'angebot' => $angebot));

            if (is_null($semesterplaene)) {
                $semesterplan = new Entity\Semesterplan();
                $semesterplan->setAngebot($angebot);
                $semesterplan->setAnzahlUebungsgruppen(0);
                $semesterplan->setDozent($angebot->getVeranstaltung()->getBeauftragter());

                if ($angebot->getVeranstaltung()->getHaeufigkeit() == 'Sommersemester' && stristr($semesterString, 'SS') === false) {
                    //WS-Semesterplan für SS-Veranstaltung
                    $semesterplan->setFindetStatt(false);
                } elseif ($angebot->getVeranstaltung()->getHaeufigkeit() == 'Wintersemester' && stristr($semesterString, 'WS') === false) {
                    //SS-Semesterplan für WS-Veranstaltung
                    $semesterplan->setFindetStatt(false);
                } else {
                    $semesterplan->setFindetStatt(true);
                }

                $semesterplan->setGroesseUebungsgruppen($angebot->getVeranstaltung()->getGruppengroesse());
                $semesterplan->setIstLehrbeauftragter(false);
                $semesterplan->setSemester($semester);
                $semesterplan->setSWSUebung($angebot->getVeranstaltung()->getKontaktzeitSonstige() / 15);
                $semesterplan->setSWSVorlesung($angebot->getVeranstaltung()->getKontaktzeitVL() / 15);

                $semester->addSemesterplan($semesterplan);
                $em->persist($semesterplan);
                $em->flush();
            }
        }

        $form = $this->createForm(new Form\SemesterplanListeType(), $semester);

        //Filterung nach Studiengängen (eher unschön, aber geht scheinbar nicht anders) und Sortierung
        $semesterplanliste = $form->get('semesterplan')->getData();
        foreach ($semesterplanliste as $sp) {
            if ($sp->getAngebot()->getStudiengang() != $studiengang) {
                $semesterplanliste->removeElement($sp);
            }
        }
        $semesterplanliste = $semesterplanliste->toArray();
        uasort($semesterplanliste, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'semesterplanSort'));
        $form->get('semesterplan')->setData($semesterplanliste);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $semesterplaene = $form->get('semesterplan')->getData();

                foreach ($semesterplaene as $semesterplan) {
                    $em->persist($semesterplan);
                }

                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Semesterplan erfolgreich gespeichert.');

                return $this->redirect($this->generateUrl('semesterListe'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Semesterpläne');

    }

}