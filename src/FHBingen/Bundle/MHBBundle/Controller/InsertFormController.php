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

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $angebot->setAngebotsart($form->get('angebotsart')->getData());
                $angebot->setCode($form->get('code')->getData());
                $angebot->setAbweichenderTitelDE($form->get('abweichender_Titel_DE')->getData());
                $angebot->setAbweichenderTitelEN($form->get('abweichender_Titel_EN')->getData());

                $em = $this->getDoctrine()->getManager();
                $angebot->setStudiengang($form->get('studiengang')->getData());
                $angebot->setFachgebiet($form->get('fachgebiet')->getData());
                $angebot->setMhb($form->get('mhb')->getData());
                $angebot->setModule($form->get('module')->getData());

                $validator = $this->get('validator');
                $errors = $validator->validate($angebot);

                if (count($errors) > 0){
                    $errorsString = (string) $errors;

                    return new Response("Fail");
                }

                $em->persist($angebot);
                $em->flush();



                return new Response('Angebot wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/creation/Dozent")
     */

    public function DozentAction()
    {
        $dozent = new Dozent();
        $form = $this->createForm(new DozentType(), $dozent);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $dozent->setAnrede($form->get('anrede')->getData());
                $dozent->setTitel($form->get('titel')->getData());
                $dozent->setName($form->get('name')->getData());
                $dozent->setNachname($form->get('nachname')->getData());
                $dozent->setEmail($form->get('email')->getData());
                $dozent->setPassword('password');
                $dozent->setRole($form->get('roles')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($dozent);
                $em->flush();

                return new Response('Dozent wurde erfolgreich erstellt');
            }

            return $this->render('@FHBingenMHB/InsertForm/dozent.html.twig', array('form'=>$form->createView()));
        }

        return $this->render('@FHBingenMHB/InsertForm/dozent.html.twig', array('form'=>$form->createView()));
    }

    /**
 * @Route("/creation/Fachgebiet")
 */

    public function FachgebietAction()
    {
        $fachgebiet = new Fachgebiet();
        $form = $this->createForm(new FachgebietType(), $fachgebiet);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $fachgebiet->setTitel($form->get('titel')->getData());
                $fachgebiet->setHat($form->get('hat')->getData());


                $em = $this->getDoctrine()->getManager();
                $em->persist($fachgebiet);
                $em->flush();

                return new Response('Fachgebiet wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:Fachgebiet.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:Fachgebiet.html.twig', array('form'=>$form->createView()));
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

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {

                $kernfach->setModul($form->get('modul')->getData());
                $kernfach->setVertiefung($form->get('vertiefung')->getData());
                $em = $this->getDoctrine()->getManager();

                $em->persist($kernfach);
                $em->flush();

                return new Response('Kernfach wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:kernfach.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:kernfach.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/creation/Lehrende")
     */

    public function LehrendeAction()
    {
        $lehrende = new Lehrende();
        $form = $this->createForm(new LehrendeType(), $lehrende);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $lehrende->setLehrender($form->get('lehrender')->getData());
                $lehrende->setModule($form->get('module')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($lehrende);
                $em->flush();

                return new Response('Lehrender wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:lehrender.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:lehrender.html.twig', array('form'=>$form->createView()));
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

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {

                $mhb->setBeschreibung($form->get('beschreibung')->getData());
                $mhb->setErstellungsdatum(new \DateTime());
                $mhb->setMHBVersionsnummer(1);
                $mhb->setGehoertZu($form->get('gehoert_zu')->getData());
                $mhb->setGueltigAb($form->get('gueltig_ab')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($mhb);
                $em->flush();

                return new Response('MHB wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:modulhandbuch.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:modulhandbuch.html.twig', array('form'=>$form->createView()));
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

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $semester->setSemester($form->get('semester')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($semester);
                $em->flush();

                return new Response('Semester wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:semester.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:semester.html.twig', array('form'=>$form->createView()));
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

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $semesterplan->setGroesseUebungsgruppen($form->get('groesse_uebungsgruppen')->getData());
                $semesterplan->setAnzahlUebungsgruppen($form->get('anzahl_uebungsgruppen')->getData());
                $semesterplan->setSwsVorlesung($form->get('sws_vorlesung')->getData());
                $semesterplan->setSwsUebung($form->get('sws_uebung')->getData());

                $semesterplan->setSemester($form->get('semester')->getData());
                $semesterplan->setLehrender($form->get('lehrender')->getData());
                $semesterplan->setModule($form->get('module')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($semesterplan);
                $em->flush();

                return new Response('Semesterplan wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:semesterplan.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:semesterplan.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/creation/Studiengang")
     */
    public function StudiengangAction()
    {
        $studiengang = new Studiengang();
        $form = $this->createForm(new StudiengangType(), $studiengang);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $studiengang->setFachbereich($form->get('fachbereich')->getData());
                $studiengang->setGrad($form->get('grad')->getData());
                $studiengang->setTitel($form->get('titel')->getData());
                $studiengang->setKuerzel($form->get('kuerzel')->getData());
                $studiengang->setBeschreibung($form->get('beschreibung')->getData());

                $studiengang->setSgl($form->get('sgl')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($studiengang);
                $em->flush();

                return new Response('Studiengang wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:studiengang.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:studiengang.html.twig', array('form'=>$form->createView()));
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

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $studienplan->setRegSem($form->get('reg_sem')->getData());

                $studienplan->setStartSem($form->get('start_sem_')->getData());
                $studienplan->setModul($form->get('modul')->getData());
                $studienplan->setStudiengang($form->get('studiengang')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($studienplan);
                $em->flush();

                return new Response('Studienplan wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:studienplan.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:studienplan.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/creation/Modul")
     */
    public function VeranstaltungAction()
    {
        $veranstaltung =new Veranstaltung();

        $form = $this->createForm(new VeranstaltungType(),$veranstaltung);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $veranstaltung->setErstellungsdatum(new \DateTime());
                $veranstaltung->setVersionsnummerModul(1);
                $veranstaltung->setStatus($form->get('Status')->getData());
                $veranstaltung->setKuerzel($form->get('Kuerzel')->getData());
                $veranstaltung->setName($form->get('Name')->getData());
                $veranstaltung->setNameEn($form->get('Name_en')->getData());
                $veranstaltung->setHaeufigkeit($form->get('Haeufigkeit')->getData());
                $veranstaltung->setDauer($form->get('Dauer')->getData());
                $veranstaltung->setKontaktzeitVL($form->get('Kontaktzeit_VL')->getData());
                $veranstaltung->setKontaktzeitSonstige($form->get('Kontaktzeit_sonstige')->getData());
                $veranstaltung->setSelbststudium($form->get('Selbststudium')->getData());
                $veranstaltung->setGruppengroesse($form->get('Gruppengroesse')->getData());
                $veranstaltung->setLernergebnisse($form->get('Lernergebnisse')->getData());
                $veranstaltung->setInhalte($form->get('Inhalte')->getData());;
                $veranstaltung->setSprache($form->get('Sprache')->getData());
                $veranstaltung->setLiteratur($form->get('Literatur')->getData());
                $veranstaltung->setLeistungspunkte($form->get('Leistungspunkte')->getData());
                $veranstaltung->setVoraussetzungInh($form->get('Voraussetzung_inh')->getData());
                $veranstaltung->setBeauftragter($form->get('beauftragter')->getData());

                $string1='';
                $array = ($form->get('Pruefungsformen')->getData());
                foreach($array as $entry){
                    $string1 = $string1.$entry.';;';
                }

                $veranstaltung->setPruefungsformen($string1);

                $string2='';
                $array = ($form->get('Voraussetzung_LP')->getData());
                foreach($array as $entry){
                    $string2 = $string2.$entry.';;';
                }

                $veranstaltung->setVoraussetzungLP($string2);

                $string3='';
                $array = ($form->get('Lehrveranstaltungen')->getData());
                foreach($array as $entry){
                    $string3 = $string3.$entry.';;';
                }

                $veranstaltung->setLehrveranstaltungen($string3);

                $em = $this->getDoctrine()->getManager();
                $em->persist($veranstaltung);
                $em->flush();

                return new Response('Modul erfolgreich erstellt ');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:veranstaltung.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:veranstaltung.html.twig', array('form'=>$form->createView()));
    }



    /**
     * @Route("/creation/Vertiefung")
     * Vertiefung (Studiengang)
     */
    public function VertiefungAction()
    {
        $vertiefung = new Vertiefung();
        $form = $this->createForm(new VertiefungType(), $vertiefung);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $vertiefung->setStgang($form->get('stgang')->getData());
                $vertiefung->setVertiefungsrichtung($form->get('vertiefungsrichtung')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($vertiefung);
                $em->flush();

                return new Response('Vertiefungsrichtung wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form'=>$form->createView()));
    }
}