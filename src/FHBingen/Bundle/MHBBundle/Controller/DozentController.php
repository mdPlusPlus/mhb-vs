<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 17.12.2014
 * Time: 03:00
 */

namespace FHBingen\Bundle\MHBBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use FHBingen\Bundle\MHBBundle\Entity;
use FHBingen\Bundle\MHBBundle\Form;
use Symfony\Component\Validator\Constraints\Null;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

class DozentController extends Controller
{
    /**
     * @Route("/restricted/dozent/eigeneModule", name="eigeneModule")
     * @Template("FHBingenMHBBundle:Dozent:eigeneModule.html.twig")
     */
    public function eigeneModuleAction()
    {
        //TODO: Filter auf Versionsnummer
        //TODO: Abfangen falls keine Module vorhanden sind

        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $modulverantwortung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID(), 'Status' => 'Freigegeben'),
            array("Name" => 'asc'));

        $mLehrende = array();
        foreach ($modulverantwortung as $m) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('veranstaltung' => $m->getModulID()));

            foreach ($tmp as $lehrend) {
                $name[] = (string)$lehrend->getDozent();
            }
            $mLehrende[] = $name;
        }

        $entries = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('dozent' => $dozent->getDozentenID()));

        $modullehrend = array();
        foreach ($entries as $modul) {
            $modullehrend[] = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $modul->getVeranstaltung()));
        }

        asort($modullehrend, SORT_STRING);

        return array('modulverantwortung' => $modulverantwortung, 'modullehrend' => $modullehrend, 'mLehrende' => $mLehrende, 'pageTitle' => 'Eigene Module');
    }


    /**
     * @Route("/restricted/dozent/planungAnzeigen", name="planungAnzeigen")
     * @Template("FHBingenMHBBundle:Dozent:planungUebersicht.html.twig")
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
     * @Route("/restricted/dozent/planungLoeschen/{id}", name="planungLoeschen")
     */
    public function planungLoeschenAction($id)
    {
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
     * @Template("FHBingenMHBBundle:Dozent:planungErstellen.html.twig")
     */
    public function planungErstellenAction()
    {
        $encoder = new JsonEncoder();
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));

        $modul = new Entity\Veranstaltung();
        $form = $this->createForm(new Form\PlanungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                //notwendige Einträge
                $modul->setStatus('in Planung');
                $modul->setErstellungsdatum(new \DateTime());
                $modul->setVersionsnummer(0);
                $modul->setBeauftragter($dozent);
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setName($form->get('name')->getData());

                //optionale Einträge
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $modul->setDauer($form->get('dauer')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $modul->setSelbststudium($form->get('selbststudium')->getData());
                $modul->setGruppengroesse($form->get('gruppengroesse')->getData());
                $modul->setLernergebnisse($form->get('lernergebnisse')->getData());
                $modul->setInhalte($form->get('inhalte')->getData());
                $modul->setSprache($form->get('sprache')->getData());
                $modul->setSpracheSonstiges($form->get('SpracheSonstiges')->getData());
                $modul->setLiteratur($form->get('literatur')->getData());
                $modul->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $modul->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $modul->setVoraussetzungLP($encoder->encode($form->get('voraussetzungLP')->getData(), 'json'));
                $modul->setPruefungsformen($encoder->encode($form->get('pruefungsformen')->getData(), 'json'));
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));
                $modul->setAutor($user->__toString());
                $em->persist($modul);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich angelegt.');

                return $this->redirect($this->generateUrl('planungAnzeigen'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Planungserstellung');
    }


    /**
     * @Route("/restricted/dozent/planungBearbeiten/{id}", name="planungBearbeiten")
     * @Template("FHBingenMHBBundle:Dozent:planungBearbeiten.html.twig")
     */
    public function planungBearbeitenAction($id)
    {
        $encoder = new JsonEncoder();
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id, 'beauftragter' => $dozent->getDozentenID(), 'Status' => 'in Planung'));

        $form = $this->createForm(new Form\PlanungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                //notwendige Einträge
                $modul->setErstellungsdatum(new \DateTime());

                //Änderungen an Einträgen
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setName($form->get('name')->getData());
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $modul->setDauer($form->get('dauer')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $modul->setSelbststudium($form->get('selbststudium')->getData());
                $modul->setGruppengroesse($form->get('gruppengroesse')->getData());
                $modul->setLernergebnisse($form->get('lernergebnisse')->getData());
                $modul->setInhalte($form->get('inhalte')->getData());
                $modul->setSprache($form->get('sprache')->getData());
                $modul->setSpracheSonstiges($form->get('SpracheSonstiges')->getData());
                $modul->setLiteratur($form->get('literatur')->getData());
                $modul->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $modul->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $modul->setVoraussetzungLP($encoder->encode($form->get('voraussetzungLP')->getData(), 'json'));
                $modul->setPruefungsformen($encoder->encode($form->get('pruefungsformen')->getData(), 'json'));
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));
                $modul->setAutor($user->__toString());

                $em->persist($modul);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich bearbeitet.');

                return $this->redirect($this->generateUrl('planungAnzeigen'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Modulplanung');
    }

    /**
     * @Route("/restricted/dozent/modulBearbeiten/{id}", name="modulBearbeiten")
     * @Template("FHBingenMHBBundle:Dozent:modulBearbeiten.html.twig")
     */
    public function modulBearbeitenAction($id)
    {
        $encoder = new JsonEncoder();
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id, 'Status' => 'Freigegeben'));

        $form = $this->createForm(new Form\VeranstaltungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                //notwendige Einträge
                $modul->setErstellungsdatum(new \DateTime());

                //Änderungen an Einträgen
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setName($form->get('name')->getData());
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setBeauftragter($form->get('beauftragter')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                //TODO  $modul->setDauer($form->get('dauer')->getData().' '.$form->get('dauer_wahl')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $modul->setSelbststudium($form->get('selbststudium')->getData());
                $modul->setGruppengroesse($form->get('gruppengroesse')->getData());
                $modul->setLernergebnisse($form->get('lernergebnisse')->getData());
                $modul->setInhalte($form->get('inhalte')->getData());
                $modul->setSprache($form->get('sprache')->getData());
                $modul->setSpracheSonstiges($form->get('SpracheSonstiges')->getData());
                $modul->setLiteratur($form->get('literatur')->getData());
                $modul->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $modul->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $modul->setVoraussetzungLP($encoder->encode($form->get('voraussetzungLP')->getData(), 'json'));
                $modul->setPruefungsformen($encoder->encode($form->get('pruefungsformen')->getData(), 'json'));
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));
                $modul->setAutor($user->__toString());

                //TODO: Testen hier ist unklarheit ob addModul() und addLehrende() benötigt wird
                //TODO: Scheint zu klappen auch wenn Lehrende vertauscht werden. bzw. Neue hinzu Reihenfolge getauscht usw.
                $lehrendeArr = $form->get('modul')->getData()->toArray();
                foreach ($lehrendeArr as $lehrend) {
                    // Modul mit Lehrenden verketten
                    $modul->addModul($lehrend);
                    // Lehrende mit Veranstaltung verketten
                    $lehrend->setVeranstaltung($modul);
                    // passenden Dozenten aus dem Lehrenden Entity finden
                    $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $lehrend->getDozent()->getDozentenID()));
                    // Dozent mit Lehrenden verketten
                    $dozent->addLehrende($lehrend);
                    // Lehrenden mit Dozent verketten
                    $lehrend->setDozent($dozent);
                    $em->persist($dozent);
                    $em->persist($lehrend);
                }

                $lehrendeRepository = $em->getRepository('FHBingenMHBBundle:Lehrende');
                $dbLehrendeArr = $lehrendeRepository->findby(array('veranstaltung' => $id));

                //TODO: Testen hier ist nicht klar ob vorher Verbindungen zu Veranstaltung und Dozenten gekappt werden müssen
                //TODO: Doppelte?
                foreach ($dbLehrendeArr as $dbEntry) {
                    if (!in_array($dbEntry, $lehrendeArr)) {
                        // link von Modul auf Lehrenden löschen
                        $modul->removeModul($dbEntry);
                        // passenden Dozenten zu dem Lehrenden Etity finden
                        $dozentTmp = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $dbEntry->getDozent()->getDozentenID()));
                        // link von Dozenten zu Lehrenden Entity löschen
                        $dozentTmp->removeLehrende($dbEntry);
                        // Lehrenden entfernen
                        $em->remove($dbEntry);
                        $em->persist($dozentTmp);
                    }
                }

                $em->persist($modul);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Das Modul wurde erfolgreich bearbeitet.');

                return $this->redirect($this->generateUrl('eigeneModule'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Modulbearbeitung');
    }


    /**
     * @Route("/restricted/dozent/planungFreigeben/{id}", name="planungFreigeben")
     * @Template("FHBingenMHBBundle:Dozent:modulBearbeiten.html.twig")
     */
    public function planungFreigebenAction($id)
    {
        $encoder = new JsonEncoder();
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id, 'Status' => 'in Planung'));

        $form = $this->createForm(new Form\VeranstaltungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {

                $valid = true;
                if ($encoder->encode($form->get('voraussetzungLP')->getData(), 'json') == '[]') {
                    $this->get('session')->getFlashBag()->add('info', 'Es muss mindestens eine Voraussetzung für die Vergabe von leistungspunkten gesetzt sein.');
                    $valid = false;
                }
                if ($encoder->encode($form->get('pruefungsformen')->getData(), 'json') == '[]') {
                    $this->get('session')->getFlashBag()->add('info', 'Es muss mindestens eine Prüfungsform gesetzt sein.');
                    $valid = false;
                }
                if ($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json') == '[]') {
                    $this->get('session')->getFlashBag()->add('info', 'Es muss mindestens eine Lehrveranstaltungsform gesetzt sein.');
                    $valid = false;
                }

                if (!$valid) {
                    return array('form' => $form->createView(), 'pageTitle' => 'Modulbearbeitung');
                }


                //notwendige Einträge
                $modul->setErstellungsdatum(new \DateTime());


                //Änderungen an Einträgen
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setName($form->get('name')->getData());
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setBeauftragter($form->get('beauftragter')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $modul->setDauer($form->get('dauer')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $modul->setSelbststudium($form->get('selbststudium')->getData());
                $modul->setGruppengroesse($form->get('gruppengroesse')->getData());
                $modul->setLernergebnisse($form->get('lernergebnisse')->getData());
                $modul->setInhalte($form->get('inhalte')->getData());
                $modul->setSprache($form->get('sprache')->getData());
                $modul->setSpracheSonstiges($form->get('SpracheSonstiges')->getData());
                $modul->setLiteratur($form->get('literatur')->getData());
                $modul->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $modul->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $modul->setVoraussetzungLP($encoder->encode($form->get('voraussetzungLP')->getData(), 'json'));
                $modul->setPruefungsformen($encoder->encode($form->get('pruefungsformen')->getData(), 'json'));
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));


                $lehrendeArr = $form->get('modul')->getData()->toArray();

                if (!empty($lehrendeArr)) {

                    foreach ($lehrendeArr as $lehrend) {
                        // Modul mit Lehrenden verketten
                        $modul->addModul($lehrend);
                        // Lehrende mit Veranstaltung verketten
                        $lehrend->setVeranstaltung($modul);
                        // passenden Dozenten aus dem Lehrenden Entity finden
                        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $lehrend->getDozent()->getDozentenID()));
                        // Dozent mit Lehrenden verketten
                        $dozent->addLehrende($lehrend);
                        // Lehrenden mit Dozent verketten
                        $lehrend->setDozent($dozent);
                        $em->persist($dozent);
                        $em->persist($lehrend);
                    }

                    $lehrendeRepository = $em->getRepository('FHBingenMHBBundle:Lehrende');
                    $dbLehrendeArr = $lehrendeRepository->findby(array('veranstaltung' => $id));

                    foreach ($dbLehrendeArr as $dbEntry) {
                        if (!in_array($dbEntry, $lehrendeArr)) {
                            // link von Modul auf Lehrenden löschen
                            $modul->removeModul($dbEntry);
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
                    $lehr = new Entity\Lehrende();
                    $modul->addModul($lehr);
                    $lehr->setVeranstaltung($modul);
                    $doz = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $modul->getBeauftragter()->getDozentenID()));
                    $doz->addLehrende($lehr);
                    $lehr->setDozent($doz);
                    $em->persist($lehr);
                    $em->persist($doz);
                }
                $em->persist($modul);
                $em->flush();

                //$this->get('session')->getFlashBag()->add('info', 'Das Modul wurde erfolgreich freigegeben.');

                return $this->redirect($this->generateUrl('vorAngebot', array('modulID' => $id)));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Modulbearbeitung');
    }

    /**
     * @Route("/restricted/dozent/angebot/{studiengangID}/{modulID}/{angebotsart}", name="angebot")
     * @Template("FHBingenMHBBundle:Dozent:angebot.html.twig")
     */
    public function angebotAction($studiengangID, $modulID, $angebotsart)
    {
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->find($modulID);
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->find($studiengangID);

        $isWahl = false;
        if ($angebotsart == 'Wahlpflichtfach') {
            $isWahl = true;
        }

        $angebot = new Entity\Angebot();
        $form = $this->createForm(new Form\AngebotType($studiengangID, $isWahl) /*, $angebot*/);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $angebot->setCode('DUMMY');
                $angebot->setVeranstaltung($modul);
                $angebot->setStudiengang($studiengang);
                $angebot->setAngebotsart($angebotsart);
                $angebot->setAbweichenderNameDE($form->get('abweichenderNameDE')->getData());
                $angebot->setAbweichenderNameEN($form->get('abweichenderNameEN')->getData());
                $angebot->setFachgebiet($form->get('fachgebiet')->getData());

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

                //TODO: Erfolgsmeldung fehlt

                $em->persist($angebot);

                $modul->setStatus('Freigegeben');
                $em->persist($modul);

                $em->flush();
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Angebot erstellen', 'modul' => $modul, 'studiengang' => $studiengang, 'wahlpflichtfach' => $isWahl);
    }

    /**
     * @Route("/restricted/dozent/vorAngebot/{modulID}", name="vorAngebot")
     * @Template("FHBingenMHBBundle:Dozent:vorAngebot.html.twig")
     *
     * dient der Auswahl des Studiengangs für die eigentliche angebotAction
     */
    public function vorAngebotAction($modulID)
    {
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->find($modulID);

        $form = $this->createForm(new Form\VorAngebotType());

        $request = $this->get('request');
        $form->handleRequest($request);


        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $encoder = new JsonEncoder();
                $studiengang = $form->get('studiengang')->getData();
                $angeotsart = $form->get('angebotsart')->getData();

                $valid = true;

                $ssEncodedData = $encoder->encode($form->get('studienplan_ss')->getData(), 'json');
                if ($ssEncodedData != '[]') {
                    $studienplan_ss = new Entity\Studienplan();
                    $studienplan_ss->setStartsemester('SS');
                    $studienplan_ss->setVeranstaltung($modul);
                    $studienplan_ss->setStudiengang($studiengang);
                    $studienplan_ss->setRegelSemester($ssEncodedData);
                    //TODO: persist erst in Anbgebotaction persisten!
                    $em->persist($studienplan_ss);
                } else {
                    $valid = false;
                }

                $wsEncodedData = $encoder->encode($form->get('studienplan_ws')->getData(), 'json');
                if ($wsEncodedData != '[]') {
                    $studienplan_ws = new Entity\Studienplan();
                    $studienplan_ws->setStartsemester('WS');
                    $studienplan_ws->setVeranstaltung($modul);
                    $studienplan_ws->setStudiengang($studiengang);
                    $studienplan_ws->setRegelSemester($wsEncodedData);
                    //TODO: persist erst in Anbgebotaction persisten!
                    $em->persist($studienplan_ws);
                } else {
                    $valid = false;
                }


                if ($valid) {
                    $em->flush();

                    return $this->redirect($this->generateUrl('angebot', array('modulID' => $modulID, 'studiengangID' => $studiengang->getStudiengangID(), 'angebotsart' => $angeotsart)));
                } else {
                    //TODO: Fehlermeldung
                    return new Response('false');
                }

            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Angebot erstellen', 'modul' => $modul);
    }
}