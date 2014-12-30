<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 07.12.2014
 * Time: 14:23
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use FHBingen\Bundle\MHBBundle\Entity\Angebot;
use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use FHBingen\Bundle\MHBBundle\Entity\Fachgebiet;
use FHBingen\Bundle\MHBBundle\Entity\Kernfach;
use FHBingen\Bundle\MHBBundle\Entity\Lehrende;
use FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch;
use FHBingen\Bundle\MHBBundle\Entity\Role;
use FHBingen\Bundle\MHBBundle\Entity\Semester;
use FHBingen\Bundle\MHBBundle\Entity\Semesterplan;
use FHBingen\Bundle\MHBBundle\Entity\Studiengang;
use FHBingen\Bundle\MHBBundle\Entity\Studienplan;
use FHBingen\Bundle\MHBBundle\Entity\Veranstaltung;
use FHBingen\Bundle\MHBBundle\Entity\Vertiefung;

use FHBingen\Bundle\MHBBundle\Form\AngebotType;
use FHBingen\Bundle\MHBBundle\Form\DozentType;
use FHBingen\Bundle\MHBBundle\Form\FachgebietType;
use FHBingen\Bundle\MHBBundle\Form\KernfachType;
use FHBingen\Bundle\MHBBundle\Form\LehrendeType;
use FHBingen\Bundle\MHBBundle\Form\ModulhandbuchType;
use FHBingen\Bundle\MHBBundle\Form\SemesterType;
use FHBingen\Bundle\MHBBundle\Form\SemesterplanType;
use FHBingen\Bundle\MHBBundle\Form\StudiengangType;
use FHBingen\Bundle\MHBBundle\Form\StudienplanType;
use FHBingen\Bundle\MHBBundle\Form\VeranstaltungType;
use FHBingen\Bundle\MHBBundle\Form\VertiefungType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;

//TODO: Controller löschen
class InsertFormController extends Controller
{
    /**
     * Reihenfolge:
     * Dozent, Semester (nix)
     * Module (Dozent)
     * Angebot (Modul; Modulhandbuch; Fachgebiet; Studiengang)
     * Fachgebiet (Studiengang)
     * Kernfach (Modul; Vertiefung)
     * Lehrende (Modul; Dozent)
     * Modulhandbuch (Semester, Studiengang)
     * Semesterplan (Modul; Dozent; Semester)
     * Studiengang (Dozent)
     * Studienplan(Semester; Modul; Studiengang)
     * Vertiefung (Studiengang)
     * Vorraussetztung (Modul?)
     */


    /**
     * @Route("/creation/Angebot")
     */

    public function AngebotAction()
    {
        $angebot = new Angebot();
        $form = $this->createForm(new AngebotType(), $angebot);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $angebot->setAngebotsart($form->get('angebotsart')->getData());
                $angebot->setCode($form->get('code')->getData());
                $angebot->setTitelDE($form->get('abweichender_Titel_DE')->getData());
                $angebot->setTitelEN($form->get('abweichender_Titel_EN')->getData());

                $em = $this->getDoctrine()->getManager();
                $angebot->setStudiengang($form->get('studiengang')->getData());
                $angebot->setFachgebiet($form->get('fachgebiet')->getData());
                $angebot->setMhb($form->get('mhb')->getData());
                $angebot->setVeranstaltung($form->get('module')->getData());

                $validator = $this->get('validator');
                $errors = $validator->validate($angebot);

                if (count($errors) > 0) {
                    $errorsString = (string)$errors;

                    return new Response("Fail");
                }

                $em->persist($angebot);
                $em->flush();


                return new Response('Angebot wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/creation/Kernfach")
     */

    public function KernfachAction()
    {
        $kernfach = new Kernfach();
        $form = $this->createForm(new KernfachType(), $kernfach);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {

                $kernfach->setVeranstaltung($form->get('modul')->getData());
                $kernfach->setVertiefung($form->get('vertiefung')->getData());
                $em = $this->getDoctrine()->getManager();

                $em->persist($kernfach);
                $em->flush();

                return new Response('Kernfach wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:kernfach.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:kernfach.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/creation/MHB")
     */

    public function MHBAction()
    {
        $mhb = new Modulhandbuch();
        $form = $this->createForm(new ModulhandbuchType(), $mhb);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {

                $mhb->setBeschreibung($form->get('beschreibung')->getData());
                $mhb->setErstellungsdatum(new \DateTime());
                $mhb->setVersionsnummer(1);
                $mhb->setGehoertZu($form->get('gehoert_zu')->getData());
                $mhb->setGueltigAb($form->get('gueltig_ab')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($mhb);
                $em->flush();

                return new Response('MHB wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:modulhandbuch.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:modulhandbuch.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/creation/Semester")
     */
    public function SemesterAction()
    {
        $semester = new Semester();
        $form = $this->createForm(new SemesterType(), $semester);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $semester->setSemester($form->get('semester')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($semester);
                $em->flush();

                return new Response('Semester wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:semester.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:semester.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/creation/semesterplan")
     */
    public function SemesterplanAction()
    {
        $semesterplan = new Semesterplan();
        $form = $this->createForm(new SemesterplanType(), $semesterplan);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $semesterplan->setGroesseUebungsgruppen($form->get('groesse_uebungsgruppen')->getData());
                $semesterplan->setAnzahlUebungsgruppen($form->get('anzahl_uebungsgruppen')->getData());
                $semesterplan->setSwsVorlesung($form->get('sws_vorlesung')->getData());
                $semesterplan->setSwsUebungen($form->get('sws_uebung')->getData());

                $semesterplan->setSemester($form->get('semester')->getData());
                $semesterplan->setDozent($form->get('lehrender')->getData());
                $semesterplan->setVeranstaltung($form->get('module')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($semesterplan);
                $em->flush();

                return new Response('Semesterplan wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:semesterplan.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:semesterplan.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/creation/Studienplan")
     */
    public function StudienplanAction()
    {
        $studienplan = new Studienplan();
        $form = $this->createForm(new StudienplanType(), $studienplan);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $studienplan->setRegelSemester($form->get('reg_sem')->getData());

                $studienplan->setStartSemester($form->get('start_sem_')->getData());
                $studienplan->setVeranstaltung($form->get('modul')->getData());
                $studienplan->setStudiengang($form->get('studiengang')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($studienplan);
                $em->flush();

                return new Response('Studienplan wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:studienplan.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:studienplan.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/creation/Modul")
     */
    public function VeranstaltungAction()
    {
        $em = $this->getDoctrine()->getManager();
        //$veranstaltung = new Veranstaltung();
        $veranstaltung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => 127));

        $form = $this->createForm(new VeranstaltungType(), $veranstaltung);

        $data = $form->getData();
        $data['voraussetzungLP'] = unserialize($veranstaltung->getVoraussetzungenLP());

        $form->setData($data);


        //$form = $form->setData(array('voraussetzungLP' => unserialize($veranstaltung->getVoraussetzungenLP())));


        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $veranstaltung->setErstellungsdatum(new \DateTime());
                $veranstaltung->setVersionsnummer(1);
                //$veranstaltung->setStatus($form->get('Status')->getData());
                $veranstaltung->setStatus('freigegeben');
                $veranstaltung->setKuerzel($form->get('kuerzel')->getData());
                $veranstaltung->setName($form->get('name')->getData());
                $veranstaltung->setNameEn($form->get('nameEN')->getData());
                $veranstaltung->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $veranstaltung->setDauer($form->get('dauer')->getData());
                $veranstaltung->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $veranstaltung->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $veranstaltung->setSelbststudium($form->get('selbststudium')->getData());
                $veranstaltung->setGruppengroesse($form->get('gruppengroesse')->getData());
                $veranstaltung->setLernergebnisse($form->get('lernergebnisse')->getData());
                $veranstaltung->setInhalte($form->get('inhalte')->getData());;
                $veranstaltung->setSprache($form->get('sprache')->getData());
                $veranstaltung->setLiteratur($form->get('literatur')->getData());
                $veranstaltung->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $veranstaltung->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $veranstaltung->setBeauftragter($form->get('beauftragter')->getData());

                /*$string1 = '';
                $array = ($form->get('Pruefungsformen')->getData());
                foreach ($array as $entry) {
                    $string1 = $string1 . $entry . ';;';
                }*/

                //$veranstaltung->setPruefungsformen($string1);

                //$string2 = '';
                //$array = ($form->get('Voraussetzung_LP')->getData());
                //foreach ($array as $entry) {
                  //  $string2 = $string2 . $entry . ';;';
                //}

                //$veranstaltung->setVoraussetzungLP(serialize($form->get('voraussetzungLP')->getData()));

                /*
                $string3 = '';
                $array = ($form->get('Lehrveranstaltungen')->getData());
                foreach ($array as $entry) {
                    $string3 = $string3 . $entry . ';;';
                }

                $veranstaltung->setLehrveranstaltungen($string3);
                */

                $em->persist($veranstaltung);
                $em->flush();

                return new Response('Modul erfolgreich erstellt ');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:veranstaltung.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:veranstaltung.html.twig', array('form' => $form->createView()));
    }

}