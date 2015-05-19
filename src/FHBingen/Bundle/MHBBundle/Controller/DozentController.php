<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 17.12.2014
 * Time: 03:00
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use FHBingen\Bundle\MHBBundle\Entity;
use FHBingen\Bundle\MHBBundle\Form;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

/**
 * Class DozentController
 *
 * @package FHBingen\Bundle\MHBBundle\Controller
 */
class DozentController extends Controller
{
    /**
     * @Route("/restricted/dozent/eigeneModule", name="eigeneModule")
     * @Template("FHBingenMHBBundle:Dozent:eigeneModule.html.twig")
     *
     * Hier werden alle Module als Tabelle ausgegeben, welche der aktuell eingeloggte Benutzer
     * verwaltet, bzw. unterrichtet.
     * Die Vorgehensweise ist hier spaltenweise. Im Template werden dann die Spalten-Arrays mit Zeilen-Index aufgerufen.
     *
     * @return array
     */
    public function eigeneModuleAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $beauftragteModule = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID(), 'Status' => 'Freigegeben'),
            array("Name" => 'asc'));

        //$mLehrende bekommt jeweils ein Array $name mit allen Lehrenden des aktuellen Moduls übergeben
        $mLehrende = array();
        foreach ($beauftragteModule as $modul) {
            $name = array();
            $lehrende = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('veranstaltung' => $modul->getModulID()));
            foreach ($lehrende as $lehrend) {
                $name[] = (string) $lehrend->getDozent();
            }
            $mLehrende[] = $name;
        }

        //Studiengänge zu Modulen für den aktuellen Benutzer in der Rolle des Modulverantwortlichen
        $stgZuModul = array();
        foreach ($beauftragteModule as $modul) {
            $name = array();
            $angebote = $modul->getAngebot();
            foreach ($angebote as $angebot) {
                $name[] = (string) $angebot->getStudiengang();
            }
            asort($name, SORT_STRING);
            $stgZuModul[] = $name;
        }


        $lehrendeVonDozent = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('dozent' => $dozent->getDozentenID()));
        //$dozentLehrt ist ein Array mit allen Modulen, welche der aktuelle Benutzer unterrichtet
        $dozentLehrt = array();
        foreach ($lehrendeVonDozent as $lehrende) {
            $dozentLehrt[] = $lehrende->getVeranstaltung();
        }
        asort($dozentLehrt, SORT_STRING);

        //Studiengänge zu Modulen für den aktuellen Benutzer in der Rolle des Lehrenden
        $stgZuModullehrend = array();
        foreach ($dozentLehrt as $modul) {
            $name = array();
            $angebote = $modul->getAngebot();

            if (empty($angebote)) {
                $name[] =" ";
            }
            foreach ($angebote as $angebot) {
                $name[] = (string) $angebot->getStudiengang();
            }
            asort($name, SORT_STRING);
            $stgZuModullehrend[] = $name;
        }



        return array('modulverantwortung' => $beauftragteModule, 'stgZuModullehrend' => $stgZuModullehrend, 'stgZuModul' => $stgZuModul, 'modullehrend' => $dozentLehrt, 'mLehrende' => $mLehrende, 'pageTitle' => 'Eigene Module');
    }



    /**
     * @Route("/restricted/dozent/planungAnzeigen", name="planungAnzeigen")
     * @Template("FHBingenMHBBundle:Dozent:planungUebersicht.html.twig")
     *
     * Hier werden alle aktuellen Planungen des aktuellen Benutzers ausgegeben
     *
     * @return array
     */
    public function planungAnzeigenAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID(), 'Status' => 'in Planung'), array('Name' => 'asc'));

        return array('planungen' => $module, 'pageTitle' => 'Modulplanung');
    }


    /**
     * @param int $id
     *
     * @Route("/restricted/dozent/planungLoeschen/{id}", name="planungLoeschen")
     *
     * Hier wird eine Planung anhand von der ID gelöscht
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function planungLoeschenAction($id)
    {
        //TODO: Abfrage: "Wollen Sie das wirklich tun?"
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $dbEntry = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id, 'beauftragter' => $dozent->getDozentenID(), 'Status' => 'in Planung'));

        $em->remove($dbEntry);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich gelöscht.');

        return $this->redirect($this->generateUrl('planungAnzeigen'));
    }


    /**
     * @Route("/restricted/dozent/planungErstellen", name="planungErstellen")
     *
     * Hier erfolgt eine Weiterleitung auf die planungAction mit der ID = -1 um eine neue Planung anzulegen
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function planungErstellenAction()
    {
        return $this->redirect($this->generateUrl('planungBearbeiten', array('id' => -1)));
    }


    /**
     * @param int $id
     *
     * @Route("/restricted/dozent/planungBearbeiten/{id}", name="planungBearbeiten")
     * @Template("FHBingenMHBBundle:Dozent:planungBearbeiten.html.twig")
     *
     * Hier wird eine Planung angelegt, bzw. bearbeitet.
     * Ausschlaggebend hierfür ist der Wert des übergebenen Parameters ID:
     * Ist die ID = -1 wir eine neue Planung angelegt
     * Ist die ID = positiver Wert wird eine Planung bearbeitet
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function planungAction($id)
    {
        //TODO: auf Beauftragter, Lehrende oder SGl prüfen (?)
        $modulID = $id; //keine Lust alle Zugriffe in den Templates von $id auf $modulID zu ändern
        $encoder = new JsonEncoder();
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        if ($modulID == -1) {
            $modul = new Entity\Veranstaltung();
            $einheit = 'Semester';
        } else {
            $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $modulID, 'beauftragter' => $user->getDozentenID(), 'Status' => 'in Planung'));
            $einheit = explode(' ', $modul->getDauer())[1]; //z.B. '1 Semester' -> ['1', 'Semester']
        }

        $form = $this->createForm(new Form\PlanungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $modul->setAutor($user);
                $modul->setBeauftragter($user);
                $modul->setDauer($form->get('dauer')->getData() . ' ' . $_POST['einheit']); // wird von Template gesetzt
                $modul->setErlaeuterungenLP($form->get('erlaeuterungenLP')->getData());
                $modul->setErstellungsdatum(new \DateTime());
                $modul->setGruppengroesse($form->get('gruppengroesse')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $modul->setLehrform($form->get('lehrform')->getData());
                $modul->setInhalte($form->get('inhalte')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));
                $modul->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $modul->setLernergebnisse($form->get('lernergebnisse')->getData());
                $modul->setLiteratur($form->get('literatur')->getData());
                $modul->setName($form->get('name')->getData());
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setPruefungsformen($encoder->encode($form->get('pruefungsformen')->getData(), 'json'));
                $modul->setPruefungsformSonstiges($form->get('PruefungsformSonstiges')->getData());



                //Berechnung des Selbststudiums: LP*30 - Kontaktzeit VL - Kontaktzeit sonstige
                $ms = $form->get('leistungspunkte')->getData()*30 - ($form->get('kontaktzeitVL')->getData() + $form->get('kontaktzeitSonstige')->getData());
                if ($ms >= 0) {
                    $modul->setSelbststudium($ms);
                } else {
                    $modul->setSelbststudium(0);
                }

                $modul->setSprache($form->get('sprache')->getData());
                $modul->setSpracheSonstiges($form->get('SpracheSonstiges')->getData());
                $modul->setStatus('in Planung');
               // $modul->setStudienleistungSonstiges($form->get('StudienleistungSonstiges')->getData());
                $modul->setVersionsnummer(0);
                $modul->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $modul->setVoraussetzungLP($encoder->encode($form->get('voraussetzungLP')->getData(), 'json'));

                $em->persist($modul);

                $em->flush();

                if ($modulID == -1) {
                    $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich angelegt.');
                } else {
                    $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich bearbeitet.');
                }

                return $this->redirect($this->generateUrl('planungAnzeigen'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Modulplanung', 'einheit' => $einheit);
    }

    /**
     * @param int $id
     *
     * @Route("/restricted/dozent/modulBearbeiten/{id}/{modus}", defaults={"modus" = "bearbeiten"}, name="modulBearbeiten")
     * @Template("FHBingenMHBBundle:Dozent:modulBearbeiten.html.twig")
     *
     * Hier wird ein bereits freigegebenes Modul bearbeitet und eine Schattenkopie in die VeranstaltungsHistory eingepflegt
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function modulBearbeitenAction($id, $modus)
    {
        //$modus ist entweder "bearbeiten" (Modul) oder "freigeben" (Planung, deaktiviertes Modul)

        $encoder = new JsonEncoder();
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        //TODO: auf Beauftragter, Lehrende oder SGl prüfen
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id));

        $einheit = explode(' ', $modul->getDauer())[1]; //z.B. '1 Semester' -> ['1', 'Semester']

        if ($modus == "bearbeiten") {
            //TODO: History muss noch überarbeitet werden: Wenn nicht valides Formular abgeschickt wird, werden History-Daten mit angepassten Daten überschrieben - stimmt das überhaupt? testen!
            $modulHistory = new Entity\VeranstaltungHistory();

            //schreibt den Veranstaltungsinhalt vor der Änderung in die Historytabelle
            $modulHistory->setAutor($modul->getAutor());
            $modulHistory->setDauer($modul->getDauer());
            $modulHistory->setErstellungsdatum($modul->getErstellungsdatum());
            $modulHistory->setGruppengroesse($modul->getGruppengroesse());
            $modulHistory->setHaeufigkeit($modul->getHaeufigkeit());
            $modulHistory->setInhalte($modul->getInhalte());
            $modulHistory->setKontaktzeitSonstige($modul->getKontaktzeitSonstige());
            $modulHistory->setKontaktzeitVL($modul->getKontaktzeitVL());
            $modulHistory->setKuerzel($modul->getKuerzel());
            $modulHistory->setLehrveranstaltungen($encoder->encode($modul->getLehrveranstaltungen(), 'json'));
            $modulHistory->setLeistungspunkte($modul->getLeistungspunkte());
            $modulHistory->setLernergebnisse($modul->getLernergebnisse());
            $modulHistory->setLiteratur($modul->getLiteratur());
            $modulHistory->setModulID($modul->getModulID());
            $modulHistory->setName($modul->getName());
            $modulHistory->setNameEN($modul->getNameEN());
            $modulHistory->setPruefungsformen($encoder->encode($modul->getPruefungsformen(), 'json'));
            $modulHistory->setPruefungsformSonstiges($modul->getPruefungsformSonstiges());
            $modulHistory->setSelbststudium($modul->getSelbststudium());
            $modulHistory->setSprache($modul->getSprache());
            $modulHistory->setSpracheSonstiges($modul->getSpracheSonstiges());
            $modulHistory->setVersionsnummer($modul->getVersionsnummer());
            $modulHistory->setVoraussetzungInh($modul->getVoraussetzungInh());
            $modulHistory->setLehrform($modul->getLehrform());
            $modulHistory->setVoraussetzungLP($encoder->encode($modul->getVoraussetzungLP(), 'json'));
            $modulHistory->setErlaeuterungenLP($modul->getErlaueterungenLP());
        }


        //ab hier beginnt das eigentliche Formular mit Validierung
        $form = $this->createForm(new Form\VeranstaltungType($id), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                //Validierung für Checkboxen
                $valid = true;
                if ($form->get('leistungspunkte')->getData()*30 - $form->get('kontaktzeitVL')->getData() - $form->get('kontaktzeitSonstige')->getData() <=0) {
                    $this->get('session')->getFlashBag()->add('info', 'Ihre Angaben zu den Kontaktzeiten lassen keine Zeiten für das Selbststudium zu.');
                    $valid = false;
                }
                if ($encoder->encode($form->get('voraussetzungLP')->getData(), 'json') == '[]') {
                    $this->get('session')->getFlashBag()->add('info', 'Es muss mindestens eine Voraussetzung für die Vergabe von Leistungspunkten gesetzt sein.');
                    $valid = false;
                }
                if ($encoder->encode($form->get('pruefungsformen')->getData(), 'json') == '[]' AND $form->get('PruefungsformSonstiges')->getData() == "") {
                    $this->get('session')->getFlashBag()->add('info', 'Es muss mindestens eine Prüfungsform gesetzt sein.');
                    $valid = false;
                }
                if ($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json') == '[]') {
                    $this->get('session')->getFlashBag()->add('info', 'Es muss mindestens eine Lehrveranstaltungsform gesetzt sein.');
                    $valid = false;
                }

                if (!$valid) {
                    if ($modus == "bearbeiten") {
                        return array('form' => $form->createView(), 'pageTitle' => 'Modulbearbeitung', 'einheit' => $einheit);
                    } else {
                        return array('form' => $form->createView(), 'pageTitle' => 'Planung freigeben', 'einheit' => $einheit);
                    }
                }

                //ab hier, wenn valide

                if ($modus == "bearbeiten") {
                    //persist erst NACH der Validierung!
                    $em->persist($modulHistory);
                }

                $modul->setAutor($user);
                $modul->setBeauftragter($form->get('beauftragter')->getData());
                $modul->setDauer($form->get('dauer')->getData() . ' ' . $_POST['einheit']); // wird von Template gesetzt
                $modul->setErlaeuterungenLP($form->get('erlaeuterungenLP')->getData());
                $modul->setErstellungsdatum(new \DateTime());
                $modul->setGruppengroesse($form->get('gruppengroesse')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $modul->setInhalte($form->get('inhalte')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));
                $modul->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $modul->setLernergebnisse($form->get('lernergebnisse')->getData());
                $modul->setLiteratur($form->get('literatur')->getData());
                $modul->setName($form->get('name')->getData());
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setPruefungsformen($encoder->encode($form->get('pruefungsformen')->getData(), 'json'));
                $modul->setPruefungsformSonstiges($form->get('PruefungsformSonstiges')->getData());

                //Berechnung des Selbststudiums: LP*30 - Kontaktzeit VL - Kontaktzeit sonstige
                $ms = $form->get('leistungspunkte')->getData()*30 - $form->get('kontaktzeitVL')->getData() - $form->get('kontaktzeitSonstige')->getData();
                $modul->setSelbststudium($ms);
                $modul->setSprache($form->get('sprache')->getData());
                $modul->setSpracheSonstiges($form->get('SpracheSonstiges')->getData());
                //$modul->setStatus kommt hier nicht vor, weil "bearbeiten" auf bereits freigegebenen Modulen arbeitetet und "freigeben" den Status in angebotAction setzt

                if (!is_null($modul->getVersionsnummer())) {
                    $modul->setVersionsnummer($modul->getVersionsnummer() + 1);
                } else {
                    $modul->setVersionsnummer(1);
                }

                $modul->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $modul->setVoraussetzungLP($encoder->encode($form->get('voraussetzungLP')->getData(), 'json'));

                $lehrendeArr = $form->get('lehrende')->getData()->toArray();

                if (!empty($lehrendeArr)) {

                    foreach ($lehrendeArr as $lehrend) {
                        // Lehrende mit Veranstaltung verketten
                        $lehrend->setVeranstaltung($modul);
                        // passenden Dozenten aus dem Lehrenden Entity finden
                        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $lehrend->getDozent()->getDozentenID()));
                        // Lehrenden mit Dozent verketten
                        $lehrend->setDozent($dozent);
                        $em->persist($dozent);
                        $em->persist($lehrend);
                    }


                    $lehrendeRepository = $em->getRepository('FHBingenMHBBundle:Lehrende');
                    $dbLehrendeArr = $lehrendeRepository->findby(array('veranstaltung' => $id));

                    foreach ($dbLehrendeArr as $dbEntry) {
                        if (!in_array($dbEntry, $lehrendeArr)) {
                            // passenden Dozenten zu dem Lehrenden Etity finden
                            $dozentTmp = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $dbEntry->getDozent()->getDozentenID()));
                            // link von Dozenten zu Lehrenden Entity löschen
                            $dozentTmp->removeLehrende($dbEntry);
                            // Lehrenden entfernen
                            $em->remove($dbEntry);
                            $em->persist($dozentTmp);
                        }
                    }
                } else {
                    //falls kein Lehrender ausgewählt wurde wird der Modulbeauftragte zum Lehrenden
                    $lehr = new Entity\Lehrende();
                    $lehr->setVeranstaltung($modul);
                    $doz = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $modul->getBeauftragter()->getDozentenID()));
                    $doz->addLehrende($lehr);
                    $lehr->setDozent($doz);
                    $em->persist($lehr);
                    $em->persist($doz);
                }

                $voraussetzungArr = $form->get('grundmodul')->getData()->toArray();
                foreach ($voraussetzungArr as $vor) {
                    $vor->setModul($modul);
                    $em->persist($vor);
                }

                $vorRepository = $em->getRepository('FHBingenMHBBundle:Modulvoraussetzung');
                $dbVorArr = $vorRepository->findby(array('modul' => $id));

                foreach ($dbVorArr as $dbEntry) {
                    if (!in_array($dbEntry, $voraussetzungArr)) {
                        // Voraussetzung identifizieren
                        $modulTmp = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $dbEntry->getVoraussetzung()->getModulID()));
                        // link zur Veranstaltung löschen
                        $modulTmp->removeForderung($dbEntry);
                        // Lehrenden entfernen
                        $em->remove($dbEntry);
                        $em->persist($modulTmp);
                    }

                }

                $em->persist($modul);

                try {
                    $em->flush();
                } catch (UniqueConstraintViolationException $e) {
                    $this->get('session')->getFlashBag()->add('info', 'Bitte nicht zweimal den gleichen Lehrenden bzw. die gleiche Veranstaltung auswählen.');

                    return array('form' => $form->createView(), 'pageTitle' => 'Modulbearbeitung', 'einheit' => $einheit);
                }

                if ($modus == "bearbeiten") {
                    $this->get('session')->getFlashBag()->add('info', 'Das Modul wurde erfolgreich bearbeitet.');

                    return $this->redirect($this->generateUrl('eigeneModule'));
                } else {
                    return $this->redirect($this->generateUrl('vorAngebot', array('modulID' => $id)));
                }
            }
        }

        if ($modus == "bearbeiten") {
            $pTitle = 'Modulbearbeitung';
        } else {
            $pTitle = 'Freigabe';
        }

        return array('form' => $form->createView(), 'pageTitle' => $pTitle, 'einheit' => $einheit);
    }


    /**
     * @param int $id
     *
     * @Route("/restricted/dozent/planungFreigeben/{id}", name="planungFreigeben")
     *
     * Hier wird eine bereits vorhandene Planung um alle notwendigen angaben ergänzt und freigegeben
     * Die Freigabe erfolgt erst in der weitergeleiteten angebotAction
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function planungFreigebenAction($id)
    {
        return $this->redirect($this->generateUrl('modulBearbeiten', array('id' => $id, 'modus' => 'freigeben')));
    }

    /**
     * @param int    $studiengangID
     * @param int    $modulID
     * @param string $angebotsart
     * @param string $encSS
     * @param string $encWS
     *
     * @Route("/restricted/dozent/angebot/{studiengangID}/{modulID}/{angebotsart}/{encSS}/{encWS}", name="angebot")
     * @Template("FHBingenMHBBundle:Dozent:angebot.html.twig")
     *
     * Hier wird ein Initialangebot für einen Studiengang erstellt und das freizugebende Modul endgültig freigegeben
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function angebotAction($studiengangID, $modulID, $angebotsart, $encSS, $encWS)
    {
        //TODO: auf Beauftragter, Lehrende oder SGl prüfen (?)
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->find($modulID);
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->find($studiengangID);

        $isWahl = false;
        if ($angebotsart == 'Wahlpflichtfach') {
            $isWahl = true;
        }

        $angebot = new Entity\Angebot();
        $form = $this->createForm(new Form\AngebotType($studiengangID, $isWahl) /*, $angebot*/); //was ist hier mit $angebot?

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {

                //wenn Pflichtfach, dann Fachgebietszuweisung notwendig
                if (!$isWahl) {
                    $fachgebiet = $form->get('fachgebiet')->getData();
                    if (is_null($fachgebiet)) {
                        //TODO: testen!
                        $this->get('session')->getFlashBag()->add('info', 'Pflichtfächer müssen einem Fachgebiet zugeordnet werden!');

                        return array('form' => $form->createView(), 'pageTitle' => 'Angebot erstellen', 'modul' => $modul, 'studiengang' => $studiengang, 'wahlpflichtfach' => $isWahl);
                    }
                }

                $angebot->setCode(null);
                $angebot->setVeranstaltung($modul);
                $angebot->setStudiengang($studiengang);
                $angebot->setAngebotsart($angebotsart);
                $angebot->setAbweichenderNameDE($form->get('abweichenderNameDE')->getData());
                $angebot->setAbweichenderNameEN($form->get('abweichenderNameEN')->getData());
                $angebot->setFachgebiet($form->get('fachgebiet')->getData());

                //falls es sich um ein Wahlpflichtfach handelt und es Kernfächer gibt
                if ($isWahl) {
                    $kernfachData = $form->get('kernfach')->getData()->toArray();
                    if (!empty($kernfachData)) {
                        foreach ($kernfachData as $kernfachEntry) {
                            $kernfach = new Entity\Kernfach();
                            $kernfach->setVertiefung($kernfachEntry);
                            $kernfach->setVeranstaltung($modul);

                            $em->persist($kernfach);
                            //$em->flush();
                        }

                    }
                }

                $angebot->setRegelsemesterSS($encSS);

                $angebot->setRegelsemesterWS($encWS);

                $modul->setStatus('Freigegeben');

                $em->persist($modul);
                $em->persist($angebot);

                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Das Modul wurde erfolgreich freigegeben.');

                return $this->redirect($this->generateUrl('eigeneModule'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Angebot erstellen', 'modul' => $modul, 'studiengang' => $studiengang, 'wahlpflichtfach' => $isWahl);
    }

    /**
     * @param int $modulID
     *
     * @Route("/restricted/dozent/vorAngebot/{modulID}", name="vorAngebot")
     * @Template("FHBingenMHBBundle:Dozent:vorAngebot.html.twig")
     *
     * dient der Auswahl des Studiengangs für die eigentliche angebotAction
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function vorAngebotAction($modulID)
    {
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $modulID));

        $studiengaengeZuModul = array();
        $angebote = $modul->getAngebot();
        foreach ($angebote as $angebot) {
            $studiengaengeZuModul[] = $angebot->getStudiengang();
        }

        $alleStudiengaenge = $em->getRepository('FHBingenMHBBundle:Studiengang')->findALL();
        $anzuzeigendeStudiengaenge = array_diff($alleStudiengaenge, $studiengaengeZuModul);

        $studiengangIDs = array();
        foreach ($anzuzeigendeStudiengaenge as $anzeige) {
            $studiengangIDs[] = $anzeige->getStudiengangID();
        }

        $form = $this->createForm(new Form\VorAngebotType($studiengangIDs));

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $encoder = new JsonEncoder();
                $studiengang = $form->get('studiengang')->getData();
                $angebotsart = $form->get('angebotsart')->getData();


                $valid = true;

                $ssEncodedData = $encoder->encode($form->get('studienplan_ss')->getData(), 'json');
                if (!$ssEncodedData == '[]') {
                    $valid = false;
                }

                $wsEncodedData = $encoder->encode($form->get('studienplan_ws')->getData(), 'json');
                if ($wsEncodedData == '[]') {
                    $valid = false;
                }

                if ($valid) {
                    return $this->redirect($this->generateUrl('angebot', array(
                        'modulID' => $modulID,
                        'studiengangID' => $studiengang->getStudiengangID(),
                        'angebotsart' => $angebotsart,
                        'encSS' => $ssEncodedData,
                        'encWS' => $wsEncodedData)));
                } else {
                    $this->get('session')->getFlashBag()->add('info', 'Bitte geben Sie die Regelsemester an.');
                }

            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Angebot erstellen', 'modul' => $modul);
    }
}