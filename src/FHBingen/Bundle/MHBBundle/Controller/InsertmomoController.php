<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 08.12.2014
 * Time: 17:10
 */

namespace FHBingen\Bundle\MHBBundle\Controller;


use FHBingen\Bundle\MHBBundle\Entity\Fachgebiet;
use FHBingen\Bundle\MHBBundle\Entity\Kernfach;
use FHBingen\Bundle\MHBBundle\Entity\Lehrende;
use FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch;
use FHBingen\Bundle\MHBBundle\Entity\Semester;
use FHBingen\Bundle\MHBBundle\Entity\Semesterplan;
use FHBingen\Bundle\MHBBundle\Entity\Studiengang;
use FHBingen\Bundle\MHBBundle\Entity\Studienplan;
use FHBingen\Bundle\MHBBundle\Entity\Vertiefung;
use FHBingen\Bundle\MHBBundle\Form\FachgebietType;
use FHBingen\Bundle\MHBBundle\Form\KernfachType;
use FHBingen\Bundle\MHBBundle\Form\LehrendeType;
use FHBingen\Bundle\MHBBundle\Form\ModulhandbuchType;
use FHBingen\Bundle\MHBBundle\Form\SemesterplanType;
use FHBingen\Bundle\MHBBundle\Form\SemesterType;
use FHBingen\Bundle\MHBBundle\Form\StudiengangType;
use FHBingen\Bundle\MHBBundle\Form\StudienplanType;
use FHBingen\Bundle\MHBBundle\Form\VertiefungType;
use Proxies\__CG__\FHBingen\Bundle\MHBBundle\Entity\Dozent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FHBingen\Bundle\MHBBundle\Entity\Angebot;
use FHBingen\Bundle\MHBBundle\Form\AngebotType;
use Symfony\Component\HttpFoundation\Response;


class InsertmomoController extends Controller
{
    /**
     * @Route("/creation/angeb")
     * TODO überarbeiten
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

                $angebot->setStudiengang($form->get('studiengang')->getData());
                $angebot->setFachgebiet($form->get('fachgebiet')->getData());
                $angebot->setMhb($form->get('mhb')->getData());
                $angebot->setVeranstaltung($form->get('module')->getData());


                $em = $this->getDoctrine()->getManager();
                $em->persist($angebot);
                $em->flush();

                return new Response('Angebot wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/creation/fachgeb")
     * TODO überarbeiten
     */
    public function FachgebietAction()
    {
        $fachgebiet = new Fachgebiet();
        $form = $this->createForm(new FachgebietType(), $fachgebiet);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $fachgebiet->setTitel($form->get('titel')->getData());
                $fachgebiet->setStudiengang($form->get('hat')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($fachgebiet);
                $em->flush();

                return new Response('Fachgebiet wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:Fachgebiet.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:Fachgebiet.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/creation/kernf")
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
     * @Route("/creation/lehrende")
     */
    public function LehrendeAction()
    {
        $lehr = new Lehrende();

        $form = $this->createForm(new LehrendeType(), $lehr);
        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {

                $lehr->setDozent($form->get('lehrender')->getData());
                $lehr->setVeranstaltung($form->get('module')->getData());

                $em = $this->getDoctrine()->getManager();

                $em->persist($lehr);
                $em->flush();

                return new Response('Lehrender wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:lehrender.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:lehrender.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/creation/mhb")
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
     * @Route("/creation/semester")
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
     * @Route("/creation/semesterp")
     */

    public function SemesterplanAction()
    {
        $semesterplan = new Semesterplan();
        $dozent = new Dozent();
        $formData['erstellt'] = $dozent;

        $form = $this->createForm(new SemesterplanType(), $semesterplan);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $semesterplan->setSwsUebungen($form->get('sws_uebung')->getData());
                $semesterplan->setSwsVorlesung($form->get('sws_vorlesung')->getData());
                $semesterplan->setAnzahlUebungsgruppen($form->get('anzahl_uebungsgruppen')->getData());
                $semesterplan->setGroesseUebungsgruppen($form->get('groesse_uebungsgruppen')->getData());

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
     * @Route("/creation/studieng")
     */
    public function StudiengangAction()
    {
        $studiengang = new Studiengang();
        $form = $this->createForm(new StudiengangType(), $studiengang);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $studiengang->setFachbereich($form->get('fachbereich')->getData());
                $studiengang->setBeschreibung($form->get('beschreibung')->getData());
                $studiengang->setGrad($form->get('grad')->getData());
                $studiengang->setKuerzel($form->get('kuerzel')->getData());
                $studiengang->setTitel($form->get('titel')->getData());

                $studiengang->setSgl($form->get('sgl')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($studiengang);
                $em->flush();

                return new Response('Studiengang wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:studiengang.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:studiengang.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/creation/studienp")
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
     * @Route("/creation/vertief")
     */
    public function VertiefungAction()
    {
        $vertiefung = new Vertiefung();
        $form = $this->createForm(new VertiefungType(), $vertiefung);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $vertiefung->setVertiefungsrichtung($form->get('vertiefungsrichtung')->getData());

                $vertiefung->setStudiengang($form->get('stgang')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($vertiefung);
                $em->flush();

                return new Response('Vertiefung wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form' => $form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form' => $form->createView()));
    }

} 