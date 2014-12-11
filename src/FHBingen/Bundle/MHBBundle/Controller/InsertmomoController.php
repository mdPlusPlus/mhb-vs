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
                $angebot->setAngebotsart ($form->get('angebotsart')->getData());
                $angebot->setCode ($form->get('code')->getData());
                $angebot->setAbweichenderTitelDE ($form->get('abweichender_Titel_DE')->getData());
                $angebot->setAbweichenderTitelEN ($form->get('abweichender_Titel_EN')->getData());

                $em = $this->getDoctrine()->getManager();
                $table = $em->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
                $entry = $table->findOneBy(array('Name' => $form->get('module')->getData()));
                $angebot->setModule($entry->getModulID());//schauen

                $table1 = $em->getRepository ( 'FHBingenMHBBundle:Modulhandbuch' );
                $entry1 = $table1->findOneBy(array('Beschreibung' => $form->get('mhb')->getData()));
                $angebot->setMhb($entry1->getMHBID());//schauen

                $table2 = $em->getRepository ( 'FHBingenMHBBundle:Fachgebiet' );
                $entry2 = $table2->findOneBy(array('Titel' => $form->get('fachgebiet')->getData()));
                $angebot->setFachgebiet($entry2->getFachgebietsID());//schauen

                $table3 = $em->getRepository ( 'FHBingenMHBBundle:Studiengang' );
                $entry3 = $table3->findOneBy(array('Titel' => $form->get('studiengang')->getData()));
                $angebot->setStudiengang($entry3->getStudiengangID());//schauen

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
                $fachgebiet->setTitel($form->get('Titel')->getData());

                $em = $this->getDoctrine()->getManager();
                $table = $em->getRepository ( 'FHBingenMHBBundle:Studiengang' );
                $entry = $table->findOneBy(array('Titel' => $form->get('hat')->getData()));
                $fachgebiet->setHat($entry->getStudiengang_ID);//schauen

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

                $em = $this->getDoctrine()->getManager();
                $table = $em->getRepository ( 'FHBingenMHBBundle:Vertiefung' );
                $entry = $table->findOneBy(array('Vertiefungsrichtung' => $form->get('vertiefung')->getData()));
                $kernfach->setVertiefung($entry);//schauen

                $table1 = $em->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
                $entry1 = $table1->findOneBy(array('Name' => $form->get('modul')->getData()));
                $kernfach->setModul($entry1);//schauen

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

                $lehr->setLehrender($form->get('lehrender')->getData());
                $lehr->setModule($form->get('module')->getData());

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
                $mhb->setErstellungsdatum(new \DateTime());
                $mhb->setMHBVersionsnummer(1);

                $em = $this->getDoctrine()->getManager();
                $table = $em->getRepository ( 'FHBingenMHBBundle:Semester' );
                $entry = $table->findOneBy(array('Semester' => $form->get('gueltig_ab')->getData()));
                $mhb->setGueltigAb($entry);//schauen

                $table1 = $em->getRepository ( 'FHBingenMHBBundle:Studiengang' );
                $entry1 = $table1->findOneBy(array('Titel' => $form->get('gehoert_zu')->getData()));
                $mhb->setGehoertZu($entry1);//schauen

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

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $semesterplan->setSwsUebung($form->get('sws_uebung')->getData());
                $semesterplan->setSwsVorlesung($form->get('sws_vorlesung')->getData());
                $semesterplan->setAnzahlUebungsgruppen($form->get('anzahl_uebungsgruppen')->getData());
                $semesterplan->setGroesseUebungsgruppen($form->get('groesse_uebungsgruppen')->getData());

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
     * @Route("/creation/studieng")
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
                $studienplan->setRegSem($form->get('regalsemester')->getData());

                $em = $this->getDoctrine()->getManager();
                $table = $em->getRepository ( 'FHBingenMHBBundle:Semester' );
                $entry = $table->findOneBy(array('Semester' => $form->get('start_sem')->getData()));
                $studienplan->setStartSem($entry);//schauen

                $table1 = $em->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
                $entry1 = $table1->findOneBy(array('Name' => $form->get('modul')->getData()));
                $studienplan->setModul($entry1);//schauen

                $table2 = $em->getRepository ( 'FHBingenMHBBundle:Studiengang' );
                $entry2 = $table2->findOneBy(array('Titel' => $form->get('studiengang')->getData()));
                $studienplan->setStudiengang($entry2);//schauen

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
                $vertiefung->setVertiefungsrichtung($form->get('vertiefungsrichtung')->getData());

                $em = $this->getDoctrine()->getManager();

                $table1 = $em->getRepository ( 'FHBingenMHBBundle:Studiengang' );
                $entry1 = $table1->findOneBy(array('Titel' => $form->get('stgang')->getData()));
                $vertiefung->setStgang($entry1);//schauen

                $em->persist( $vertiefung);
                $em->flush();

                return new Response('Vertiefung wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form'=>$form->createView()));
    }

} 