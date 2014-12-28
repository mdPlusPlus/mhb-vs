<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 15.12.2014
 * Time: 16:57
 */

namespace FHBingen\Bundle\MHBBundle\Controller;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;

use FHBingen\Bundle\MHBBundle\Entity;
use FHBingen\Bundle\MHBBundle\Form;

class VerwaltungsController extends Controller
{
    /**
     * @Route("/restricted/sgl/showUsers", name="benutzerverwaltung")
     * @Template("FHBingenMHBBundle:Verwaltung:userverwaltung.html.twig")
     */
    public function SglShowUsersAction()
    {
        //alle Nutzer sortieren

        $em = $this->getDoctrine()->getManager();
        $entries = $em->getRepository('FHBingenMHBBundle:Dozent')->findALL();

        $dozent = array();
        $sgl = array();

        foreach ($entries as $e) {
            if ($e->getRoles()[0] == 'ROLE_SGL') {
                $sgl[] = $e;
            } else {
                if ($e->getRoles()[0] == 'ROLE_DOZENT') {
                    $dozent[] = $e;
                }
            }
        }

        return array('sgl' => $sgl, 'dozent' => $dozent, 'pageTitle' => 'Nutzerverwaltung');
    }


    /**
     * @Route("/restricted/sgl/passwordReset", name="passwdReset")
     * @Template("FHBingenMHBBundle:Verwaltung:userverwaltung.html.twig")
     */
    public function resetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dozenten = $em->getRepository('FHBingenMHBBundle:Dozent')->findAll();

        foreach ($dozenten as $doz) {
            $doz->setPassword('testpass');
            $em->persist($doz);
            $em->flush();
        }

        $this->get('session')->getFlashBag()->add('info', 'Alle Passwörter wurden zurückgesetzt.');

        return $this->redirect($this->generateUrl('benutzerverwaltung'));
    }


    /**
     * @Route("/restricted/sgl/createUsers")
     * @Template("FHBingenMHBBundle:Verwaltung:userCreate.html.twig")
     */
    public function SglCreateUserAction()
    {
        $dozent = new Entity\Dozent();
        $form = $this->createForm(new Form\DozentType(), $dozent);

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

                $this->get('session')->getFlashBag()->add('info', 'Der neue Nutzer wurde erfolgreich angelegt.');

                return $this->redirect($this->generateUrl('benutzerverwaltung'));
            }
        }
        return array('form' => $form->createView(), 'pageTitle' => 'Nutzerverwaltung');
    }


    /**
     * @Route("/restricted/sgl/updateUsers/{userid}")
     * @Template("FHBingenMHBBundle:Verwaltung:userCreate.html.twig")
     */
    public function SglUpdateUserAction($userid)
    {
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $userid));
        $form = $this->createForm(new Form\DozentType(), $dozent);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $dozent->setAnrede($form->get('anrede')->getData());
                $dozent->setTitel($form->get('titel')->getData());
                $dozent->setName($form->get('name')->getData());
                $dozent->setNachname($form->get('nachname')->getData());
                $dozent->setEmail($form->get('email')->getData());
                $dozent->setRole($form->get('roles')->getData());

                $em->persist($dozent);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Der Nutzer wurde erfolgreich bearbeitet.');

                return $this->redirect($this->generateUrl('benutzerverwaltung'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Nutzerverwaltung');
    }


    /**
     * @Route("/restricted/sgl/showAllCourses", name="studiengangverwaltung")
     * @Template("FHBingenMHBBundle:Verwaltung:alleStudien.html.twig")
     */
    public function SglShowAllCoursesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entries = $em->getRepository('FHBingenMHBBundle:Studiengang')->findALL();

        return array('courses' => $entries, 'pageTitle' => 'Studiengangverwaltung');
    }


    /**
     * @Route("/restricted/sgl/createCourse", name="studiengangErstellen")
     * @Template("FHBingenMHBBundle:Verwaltung:studiengangAnzeigen.html.twig")
     */
    public function SglCreateCourseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $studiengang = new Entity\Studiengang();
        $form = $this->createForm(new Form\StudiengangType(), $studiengang);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                /*
                 * TODO:
                 * - überprüfen ob Vertiefungsrichtung oder Fachgebeiet doppelt in Feldern steht
                 * - vllt sollte man Vertiefungen + Fachgebeiete nicht umbenennen können (oder nur über spezielle Maske)
                 */
                $studiengang->setFachbereich($form->get('fachbereich')->getData());     //choice
                $studiengang->setGrad($form->get('grad')->getData());                   //choice
                $studiengang->setTitel($form->get('titel')->getData());                 //text
                $studiengang->setKuerzel($form->get('kuerzel')->getData());             //text
                $studiengang->setBeschreibung($form->get('beschreibung')->getData());   //text
                $studiengang->setSgl($form->get('sgl')->getData());                     //entity

                //ohne ->toArray() gibt sizeof das doppelte aus O.o
                $vertiefungArr = $form->get('richtung')->getData()->toArray();
                foreach ($vertiefungArr as $vertiefung) {
                    $studiengang->addRichtung($vertiefung);
                    $vertiefung->setStudiengang($studiengang);
                    $em->persist($vertiefung);
                }

                //ohne ->toArray() gibt sizeof das doppelte aus O.o
                $fachgebietArr = $form->get('fachgebiete')->getData()->toArray();
                foreach ($fachgebietArr as $fachgebiet) {
                    $studiengang->addFachgebiete($fachgebiet);
                    $fachgebiet->setStudiengang($studiengang);
                    $em->persist($fachgebiet);
                }

                $em->persist($studiengang);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Der Studiengang wurde erfolgreich angelegt.');

                return $this->redirect($this->generateUrl('studiengangverwaltung'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Studiengangverwaltung');

    }


    /**
     * @Route("/restricted/sgl/updateCourse/{courseID}", name="studiengangBearbeiten")
     * @Template("FHBingenMHBBundle:Verwaltung:studiengangAnzeigen.html.twig")
     */
    public function SglShowCourseAction($courseID)
    {

        $em = $this->getDoctrine()->getManager();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('Studiengang_ID' => $courseID));
        $form = $this->createForm(new Form\StudiengangType(), $studiengang);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                /*
                 * TODO:
                 * - überprüfen ob Vertiefungsrichtung oder Fachgebeiet doppelt in Feldern steht
                 * - vllt sollte man Vertiefungen + Fachgebeiete nicht umbenennen können (oder nur über spezielle Maske)
                 */
                $studiengang->setFachbereich($form->get('fachbereich')->getData());     //choice
                $studiengang->setGrad($form->get('grad')->getData());                   //choice
                $studiengang->setTitel($form->get('titel')->getData());                 //text
                $studiengang->setKuerzel($form->get('kuerzel')->getData());             //text
                $studiengang->setBeschreibung($form->get('beschreibung')->getData());   //text
                $studiengang->setSgl($form->get('sgl')->getData());                     //entity

                //ohne ->toArray() gibt sizeof das doppelte aus O.o
                $vertiefungArr = $form->get('richtung')->getData()->toArray();
                foreach ($vertiefungArr as $vertiefung) {
                    $studiengang->addRichtung($vertiefung);
                    $vertiefung->setStudiengang($studiengang);
                    $em->persist($vertiefung);
                }

                //ohne ->toArray() gibt sizeof das doppelte aus O.o
                $fachgebietArr = $form->get('fachgebiete')->getData()->toArray();
                foreach ($fachgebietArr as $fachgebiet) {
                    $studiengang->addFachgebiete($fachgebiet);
                    $fachgebiet->setStudiengang($studiengang);
                    $em->persist($fachgebiet);
                }

                $em->persist($studiengang);
                $em->flush();
                //flush() hier vermutlich notwendig, hab' vergessen warum... eventuell mal ohne testen?

                //$studiengang->getRichtung() holt sich die infos NICHT aus der db....
                //also:
                $vertiefungRepository = $em->getRepository('FHBingenMHBBundle:Vertiefung');
                $dbVertiefungArr = $vertiefungRepository->findby(array('studiengang' => $courseID));

                $fachgebietRepository = $em->getRepository('FHBingenMHBBundle:Fachgebiet');
                $dbFachgebietArr = $fachgebietRepository->findby(array('studiengang' => $courseID));

                foreach ($dbVertiefungArr as $dbEntry) {
                    if (!in_array($dbEntry, $vertiefungArr)) {
                        $em->remove($dbEntry);
                    }
                }
                foreach ($dbFachgebietArr as $dbEntry) {
                    if (!in_array($dbEntry, $fachgebietArr)) {
                        $em->remove($dbEntry);
                    }
                }
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Der Studiengang wurde erfolgreich bearbeitet.');

                return $this->redirect($this->generateUrl('studiengangverwaltung'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Studiengangverwaltung');

    }

}
