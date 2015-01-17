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
                $name[] = (string) $lehrend->getDozent();
            }
            $mLehrende[] = $name;
        }

        $entries = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('dozent' => $dozent->getDozentenID()));

        $modullehrend = array();
        foreach ($entries as $modul) {
            $modullehrend[] = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $modul->getVeranstaltung()));
        }

        $stgZuModul = array();
        foreach ($modulverantwortung as $modul) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('veranstaltung' => $modul->getModulID()));
            foreach ($tmp as $studiengang) {
                $name[] = (string) $studiengang->getStudiengang();
            }
            asort($name, SORT_STRING);

            $stgZuModul[] = $name;
        }

        $stgZuModullehrend = array();
        foreach ($modullehrend as $modul) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('veranstaltung' => $modul->getModulID()));
            foreach ($tmp as $studiengang) {
                $name[] = (string) $studiengang->getStudiengang();
            }
            asort($name, SORT_STRING);
            $stgZuModul[] = $name;
        }

        asort($modullehrend, SORT_STRING);

        return array('modulverantwortung' => $modulverantwortung, 'stgZuModullehrend' => $stgZuModullehrend, 'stgZuModul' => $stgZuModul, 'modullehrend' => $modullehrend, 'mLehrende' => $mLehrende, 'pageTitle' => 'Eigene Module');
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
     */
    public function planungErstellenAction()
    {
        return $this->redirect($this->generateUrl('planungBearbeiten', array('id' => -1)));
    }


    /**
     * @Route("/restricted/dozent/planungBearbeiten/{id}", name="planungBearbeiten")
     * @Template("FHBingenMHBBundle:Dozent:planungBearbeiten.html.twig")
     */
    public function planungAction($id)
    {
        $modulID = $id; //keine Lust alle Zugriffe in den Templates von $id auf $modulID zu ändern
        $encoder = new JsonEncoder();
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        if ($modulID == -1) {
            $modul = new Entity\Veranstaltung();
        } else {
            $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $modulID, 'beauftragter' => $user->getDozentenID(), 'Status' => 'in Planung'));
        }

        $form = $this->createForm(new Form\PlanungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $modul->setStatus('in Planung');
                $modul->setErstellungsdatum(new \DateTime());
                $modul->setVersionsnummer(0);
                $modul->setBeauftragter($user);
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setName($form->get('name')->getData());
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $modul->setDauer($form->get('dauer')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
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
                $modul->setPruefungsformSonstiges($form->get('PruefungsformSonstiges')->getData());
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));
                $modul->setAutor((string) $user);
                $modul->setPruefungsleistungSonstiges($form->get('PruefungsleistungSonstiges')->getData());
                $modul->setStudienleistungSonstiges($form->get('StudienleistungSonstiges')->getData());

                //Berechnung des Selbststudiums: LP*30 - Kontaktzeit VL - Kontaktzeit sonstige
                $ms = $form->get('leistungspunkte')->getData()*30 - ($form->get('kontaktzeitVL')->getData() + $form->get('kontaktzeitSonstige')->getData());

                if ($ms >= 0) {
                    $modul->setSelbststudium($ms);
                } else {
                    $modul->setSelbststudium(0);
                }

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

        return array('form' => $form->createView(), 'pageTitle' => 'Modulplanung');
    }

    /**
     * @Route("/restricted/dozent/modulBearbeiten/{id}", name="modulBearbeiten")
     * @Template("FHBingenMHBBundle:Dozent:modulBearbeiten.html.twig")
     */
    public function modulBearbeitenAction($id)
    {
        //TODO modulBearbeitenAction + planungFreigebenAction zusammenführen (geht das überhaupt?)
        $encoder = new JsonEncoder();
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id, 'Status' => "freigegeben"));
        $modulHistory= new Entity\VeranstaltungHistory();

        $form = $this->createForm(new Form\VeranstaltungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                //schreibt den Veranstaltungs Inhalt vor der änderung in die History Tabelle
                $modulHistory->setAutor($modul->getAutor());
                $modulHistory->setModulID($modul->getModulID());
                $modulHistory->setVersionsnummer($modul->getVersionsnummer());
                $modulHistory->setDauer($modul->getDauer());
                $modulHistory->setName($modul->getName());
                $modulHistory->setNameEN($modul->getNameEN());
                $modulHistory->setKuerzel($modul->getKuerzel());
                $modulHistory->setErstellungsdatum($modul->getErstellungsdatum());
                $modulHistory->setGruppengroesse($modul->getGruppengroesse());
                $modulHistory->setHaeufigkeit($modul->getHaeufigkeit());
                $modulHistory->setInhalte($modul->getInhalte());
                $modulHistory->setKontaktzeitSonstige($modul->getKontaktzeitSonstige());
                $modulHistory->setKontaktzeitVL($modul->getKontaktzeitVL());
                $modulHistory->setSelbststudium($modul->getSelbststudium());
                $modulHistory->setLernergebnisse($modul->getLernergebnisse());
                $modulHistory->setSprache($modul->getSprache());
                $modulHistory->setSpracheSonstiges($modul->getSpracheSonstiges());
                $modulHistory->setLiteratur($modul->getLiteratur());
                $modulHistory->setLeistungspunkte($modul->getLeistungspunkte());
                $modulHistory->setVoraussetzungInh($modul->getVoraussetzungInh());
                $modulHistory->setPruefungsformSonstiges($modul->getPruefungsformSonstiges());
                $modulHistory->setVoraussetzungLP($encoder->encode($modul->getVoraussetzungLP(), 'json'));
                $modulHistory->setPruefungsformen($encoder->encode($modul->getPruefungsformen(), 'json'));
                $modulHistory->setLehrveranstaltungen($encoder->encode($modul->getLehrveranstaltungen(), 'json'));


                $em->persist($modulHistory);


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

                //Berechnung des Selbststudiums: LP*30 - Kontaktzeit VL - Kontaktzeit sonstige
                $ms = $form->get('leistungspunkte')->getData()*30 - $form->get('kontaktzeitVL')->getData() - $form->get('kontaktzeitSonstige')->getData();

                if ($ms >= 0) {
                    $modul->setSelbststudium($ms);
                } else {
                    $modul->setSelbststudium(0);
                }

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
                $modul->setPruefungsformSonstiges($form->get('PruefungsformSonstiges')->getData());
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));
                $modul->setAutor($user->__toString());
                $modul->setVersionsnummer($modul->getVersionsnummer()+1);
                $modul->setPruefungsleistungSonstiges($form->get('PruefungsleistungSonstiges')->getData());
                $modul->setStudienleistungSonstiges($form->get('StudienleistungSonstiges')->getData());



                $lehrendeArr = $form->get('lehrende')->getData()->toArray();
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
        //TODO modulBearbeitenAction + planungFreigebenAction zusammenführen (geht das überhaupt?)
        $encoder = new JsonEncoder();
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id, 'Status' => array('in Planung', 'expired')));

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

                //Berechnung des Selbststudiums: LP*30 - Kontaktzeit VL - Kontaktzeit sonstige
                $ms = $form->get('leistungspunkte')->getData()*30 - $form->get('kontaktzeitVL')->getData() - $form->get('kontaktzeitSonstige')->getData();

                if ($ms >= 0) {
                    $modul->setSelbststudium($ms);
                } else {
                    $modul->setSelbststudium(0);
                }


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
                $modul->setPruefungsformSonstiges($form->get('PruefungsformSonstiges')->getData());
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));


                $lehrendeArr = $form->get('lehrende')->getData()->toArray();


                $lehrendeArr = $form->get('lehrende')->getData()->toArray();



                $lehrendeRepository = $em->getRepository('FHBingenMHBBundle:Lehrende');


                if (!empty($lehrendeArr)) {

//                    foreach ($lehrendeArr as $lehrend) {
//                        // Modul mit Lehrenden verketten
//                        $modul->addLehrende($lehrend->getDozent());
//                        // Lehrende mit Veranstaltung verketten
//                        $lehrend->setVeranstaltung($modul);
//                        // passenden Dozenten aus dem Lehrenden Entity finden
//                        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $lehrend->getDozent()->getDozentenID()));
//                        // Dozent mit Lehrenden verketten
//                        $dozent->addLehrende($lehrend);
//                        // Lehrenden mit Dozent verketten
//                        $lehrend->setDozent($dozent);
//                        $em->persist($dozent);
//                        $em->persist($lehrend);
//                    }
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
/*                    $dbLehrendeArr = $lehrendeRepository->findby(array('veranstaltung' => $id));

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
                        }*/

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
     * @Route("/restricted/dozent/angebot/{studiengangID}/{modulID}/{angebotsart}/{encSS}/{encWS}", name="angebot")
     * @Template("FHBingenMHBBundle:Dozent:angebot.html.twig")
     */
    public function angebotAction($studiengangID, $modulID, $angebotsart, $encSS, $encWS)
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

                $studienplanSS = new Entity\Studienplan();
                $studienplanSS->setStartsemester('SS');
                $studienplanSS->setVeranstaltung($modul);
                $studienplanSS->setStudiengang($studiengang);
                $studienplanSS->setRegelSemester($encSS);

                $studienplanWS = new Entity\Studienplan();
                $studienplanWS->setStartsemester('WS');
                $studienplanWS->setVeranstaltung($modul);
                $studienplanWS->setStudiengang($studiengang);
                $studienplanWS->setRegelSemester($encWS);

                $modul->setStatus('Freigegeben');

                $em->persist($studienplanSS);
                $em->persist($studienplanWS);
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
                        'angebotsart' => $angeotsart,
                        'encSS' => $ssEncodedData,
                        'encWS' => $wsEncodedData)));
                } else {
                    //TODO: Fehlermeldung fehlt
                    return new Response('false');
                }

            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Angebot erstellen', 'modul' => $modul);
    }
}