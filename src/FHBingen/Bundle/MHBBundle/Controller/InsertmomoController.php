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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FHBingen\Bundle\MHBBundle\Entity\Angebot;
use FHBingen\Bundle\MHBBundle\Form\AngebotType;
use Symfony\Component\HttpFoundation\Response;


class InsertmomoController extends Controller
{
    /**
     * @Route("/creation/angebot")
     * TODO überarbeiten
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
                $angebot->setModule ($form->get('module')->getData());
                $angebot->setMhb ($form->get('mhb')->getData());
                $angebot->setFachgebiet ($form->get('fachgebiet')->getData());
                $angebot->setStudiengang ($form->get('studiengang')->getData());
                $angebot->setAngebotsart ($form->get('angebotsart')->getData());
                $angebot->setCode ($form->get('code')->getData());
                $angebot->setAbweichender_Titel_DE ($form->get('abweichender_Titel_DE')->getData());
                $angebot->setAbweichender_Titel_EN ($form->get('abweichender_Titel_EN')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($angebot);
                $em->flush();

                return new Response('Angebot wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/creation/fachgebiet")
     * TODO überarbeiten
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
                $fachgebiet->setTitel($form->get('title')->getData());
                $fachgebiet->setHat ($form->get('hat')->getData());

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
     * @Route("/creation/kernfach")
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
                $kernfach->setVertiefung ($form->get('vertiefung')->getData());

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
     * @Route("/creation/lehrende")
     */
    public function LehrendeAction()
    {
        $lehr = new Lehrende();
        $form = $this->createForm(new LehrendeType(), $lehr);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $lehr->setModule($form->get('module')->getData());
                $lehr->setLehrender($form->get('lehrender')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($lehr);
                $em->flush();

                return new Response('Lehrender wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:lehrender.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:lehrender.html.twig', array('form'=>$form->createView()));
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

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $mhb->setBeschreibung($form->get('beschreibung')->getData());
                $mhb->setGueltigAb($form->get('gueltig_ab')->getData());
                $mhb->setGehoertZu($form->get('gehoert_zu')->getData());
                $mhb->setErstellungsdatum(new \DateTime());
                $mhb->setMHBVersionsnummer(1);

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
     * @Route("/creation/semester")
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
                $semesterplan->setSemester($form->get('semester')->getData());
                $semesterplan->setLehrender($form->get('dozent')->getData());
                $semesterplan->setModule($form->get('veranstaltung')->getData());
                $semesterplan->setSwsUebung($form->get('swsUebung')->getData());
                $semesterplan->setSwsVorlesung($form->get('swsVorlesung')->getData());
                $semesterplan->setAnzahlUebungsgruppen($form->get('anzahl_Uebungsgruppen')->getData());
                $semesterplan->setGroesseUebungsgruppen($form->get('groesse_uebungsgruppen')->getData());

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
     * @Route("/creation/studiengang")
     */
    public function StudiengangSemesterplanAction()
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
                $studiengang->setBeschreibung($form->get('beschreibung')->getData());
                $studiengang->setGrad($form->get('grad')->getData());
                $studiengang->setKuerzel($form->get('kuerzel')->getData());
                $studiengang->setSgl($form->get('sgl')->getData());
                $studiengang->setTitel($form->get('titel')->getData());

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
     * @Route("/creation/studienplan")
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
                $studienplan->setModul($form->get('modul')->getData());
                $studienplan->setRegSem($form->get('regalsemester')->getData());
                $studienplan->setStartSem($form->get('startsemester')->getData());
                $studienplan->setStudiengang($form->get('studiengang')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist( $studienplan);
                $em->flush();

                return new Response('Studienplan wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:studienplan.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:studienplan.html.twig', array('form'=>$form->createView()));
    }


    /**
     * @Route("/creation/vertiefung")
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
                $vertiefung->setStgang($form->get('studiengang')->getData());
                $vertiefung->setVertiefungsrichtung($form->get('vertiefungsrichtung')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist( $vertiefung);
                $em->flush();

                return new Response('Vertiefung wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form'=>$form->createView()));
    }

} 