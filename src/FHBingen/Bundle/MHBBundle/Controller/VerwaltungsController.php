<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 15.12.2014
 * Time: 16:57
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use FHBingen\Bundle\MHBBundle\Entity;
use FHBingen\Bundle\MHBBundle\Form;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class VerwaltungsController extends Controller
{
    /**
     * @Route("/restricted/sgl/showUsers", name="benutzerVerwaltung")
     * @Template("FHBingenMHBBundle:Verwaltung:benutzerVerwaltung.html.twig")
     *
     * Unterscheidet zwischen SGL und Dozent und gibt diese jeweils sortiert in einem Array zurück
     */
    public function SglShowUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entries = $em->getRepository('FHBingenMHBBundle:Dozent')->findBy(array('isActive'=>1));
        $deaktivierteNutzer = $em->getRepository('FHBingenMHBBundle:Dozent')->findBy(array('isActive'=>0));
        $dozent = array();
        $sgl = array();

        foreach ($entries as $e) {
            //wenn nicht "Alle" oder "N.N." wird zwischen SGL und Dozent unterschieden und sortiert
            if ($e->getName()!='Dummy') {
                if (in_array('ROLE_SGL', $e->getRoles())) {
                    $sgl[] = $e;
                } else {
                    if (in_array('ROLE_DOZENT', $e->getRoles())) {
                        $dozent[] = $e;
                    }
                }
            }
        }

        uasort($sgl, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions', 'dozentSort'));
        uasort($dozent, array('FHBingen\Bundle\MHBBundle\PHP\SortFunctions','dozentSort'));

        return array('sgl' => $sgl, 'dozent' => $dozent,'deaktivierteNutzer'=>$deaktivierteNutzer, 'pageTitle' => 'Nutzerverwaltung');
    }

    /**
     * @Route("/restricted/sgl/passwordReset", name="passwdReset")
     *
     * setzt das Passwort bei Dozenten auf "Autor"
     * setzt das Passwort bei SQL auf "Editor"
     */
    public function resetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dozenten = $em->getRepository('FHBingenMHBBundle:Dozent')->findAll();

        foreach ($dozenten as $doz) {
            if (in_array('ROLE_SGL', $doz->getRoles())) {
                $doz->setPassword('Editor');
            }
            if (in_array('ROLE_DOZENT', $doz->getRoles())) {
                $doz->setPassword('Autor');
            }
            $em->persist($doz);
            $em->flush();
        }

        $this->get('session')->getFlashBag()->add('info', 'Alle Passwörter wurden zurückgesetzt.');

        return $this->redirect($this->generateUrl('benutzerVerwaltung'));
    }

    /**
     * @Route("/restricted/sgl/createUsers", name="benutzerErstellen")
     *
     * Legt einen neuen Dozenten mit den eingegebenen Daten an
     */

    public function SglCreateUserAction()
    {
        return $this->redirect($this->generateUrl('benutzerBearbeiten', array('userid' => -1)));
    }

    /**
     * @Route("/restricted/sgl/updateUsers/{userid}", name="benutzerBearbeiten")
     * @Template("FHBingenMHBBundle:Verwaltung:benutzerErstellen.html.twig")
     *
     * updatet einen bestimmten Dozent anhand der angegebenen Daten
     */

    public function SglUpdateUserAction($userid)
    {
        $em = $this->getDoctrine()->getManager();
        if ($userid == -1) {
            $dozent = new Entity\Dozent();
        } else {
            $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $userid));
        }
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
                if (in_array('ROLE_SGL', $dozent->getRoles())) {
                    $dozent->setPassword('Editor');
                }
                if (in_array('ROLE_DOZENT', $dozent->getRoles())) {
                    $dozent->setPassword('Autor');
                }
                /*
                 * TODO:trigger?
                 * Doku: Wenn SGL auf Dozent abgestuft wird, besitzt er immernoch den Studiengang, den er vorher hatte,
                 * aber da er die rolle ROLE_SGL nicht mehr ausübt, kann er nicht mehr auf die SGl-Funktionen zugreifen,
                 * da sich diese hinter der /restricted/sgl firewall befinden
                 */

                $em->persist($dozent);
                $em->flush();
                if ($userid == -1 ) {
                    $this->get('session')->getFlashBag()->add('info', 'Der neue Nutzer wurde erfolgreich angelegt.');
                } else {
                    $this->get('session')->getFlashBag()->add('info', 'Der Nutzer wurde erfolgreich bearbeitet.');
                }

                return $this->redirect($this->generateUrl('benutzerVerwaltung'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Nutzerverwaltung');
    }

    /**
     * @Route("/restricted/sgl/showAllCourses", name="studiengangVerwaltung")
     * @Template("FHBingenMHBBundle:Verwaltung:alleStudiengaenge.html.twig")
     *
     * Sucht alle angelegten Studiengänge und gibt diese sortiert aus
     */

    public function SglShowAllCoursesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mhb = $em->createQuery(
            'SELECT s.Studiengang_ID, s.Titel AS studiengangTitel, s.Grad, s.Kuerzel, d.Titel AS dozentTitel, d.Nachname
            FROM  FHBingenMHBBundle:Studiengang s
            JOIN  FHBingenMHBBundle:Dozent d WITH  s.sgl =  d.Dozenten_ID
            ORDER BY studiengangTitel ASC'
        );
        $result = $mhb->getResult();

        return array('courses' => $result, 'pageTitle' => 'Studiengangverwaltung');
    }

    /**
     * @Route("/restricted/sgl/createCourse", name="studiengangErstellen")
     *
     * Legt einen Studiengang anhand der angegebenen Daten an. Dazu gehören auch Fachgebiete und Vertiefungsrichtungen
     */
    public function SglCreateCourseAction()
    {
        return $this->redirect($this->generateUrl('studiengangBearbeiten', array('courseID' => -1)));
    }

    /**
     * @Route("/restricted/sgl/updateCourse/{courseID}", name="studiengangBearbeiten")
     * @Template("FHBingenMHBBundle:Verwaltung:studiengangAnzeigen.html.twig")
     *
     * Updatet einen Studiengang nach den angegebenen Daten
     */
    public function SglShowCourseAction($courseID)
    {
        $em = $this->getDoctrine()->getManager();
        if ($courseID == -1) {
            $studiengang = new Entity\Studiengang();
        } else {
            $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('Studiengang_ID' => $courseID));
        }
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

                //benötigt, sonst Fehler
                if ($courseID == -1) {
                    $vertiefungArr = $form->get('richtung')->getData();
                    $fachgebietArr = $form->get('fachgebiete')->getData();
                } else {
                    $vertiefungArr = $form->get('richtung')->getData()->toArray();
                    $fachgebietArr = $form->get('fachgebiete')->getData()->toArray();
                }

                foreach ($vertiefungArr as $vertiefung) {
                    $studiengang->addRichtung($vertiefung);
                    $vertiefung->setStudiengang($studiengang);
                    $em->persist($vertiefung);
                }

                foreach ($fachgebietArr as $fachgebiet) {
                    $studiengang->addFachgebiete($fachgebiet);
                    $fachgebiet->setStudiengang($studiengang);
                    $em->persist($fachgebiet);
                }

                $em->persist($studiengang);
                // hier notwendig da weiter unten alle Eintrage mit den aktuell gesetzten verglichen werden
                $em->flush();

                //hier ungleich -1
                if ($courseID != -1) {
                    //$studiengang->getRichtung() holt sich die infos NICHT aus der db....
                    //also:
                    $vertiefungRepository = $em->getRepository('FHBingenMHBBundle:Vertiefung');
                    $dbVertiefungArr = $vertiefungRepository->findby(array('studiengang' => $courseID));

                    $fachgebietRepository = $em->getRepository('FHBingenMHBBundle:Fachgebiet');
                    $dbFachgebietArr = $fachgebietRepository->findby(array('studiengang' => $courseID));


                    //löscht alle Vertiefungsrichtungen aus der DB, die nicht angegeben/gelöscht wurden
                    foreach ($dbVertiefungArr as $dbEntry) {
                        if (!in_array($dbEntry, $vertiefungArr)) {
                            $em->remove($dbEntry);
                        }
                    }

                    //löscht alle Fachgebiete aus der DB, die nicht angegeben/gelöscht wurden
                    foreach ($dbFachgebietArr as $dbEntry) {
                        if (!in_array($dbEntry, $fachgebietArr)) {
                            $em->remove($dbEntry);
                        }
                    }
                    $em->flush();
                }

                if ($courseID == -1) {
                    $this->get('session')->getFlashBag()->add('info', 'Der Studiengang wurde erfolgreich angelegt.');
                } else {
                    $this->get('session')->getFlashBag()->add('info', 'Der Studiengang wurde erfolgreich bearbeitet.');
                }

                return $this->redirect($this->generateUrl('studiengangVerwaltung'));
            }
        }

        return array('form' => $form->createView(),'studiengang'=>$studiengang, 'pageTitle' => 'Studiengangverwaltung');
    }


    /**
     * @Route("/restricted/sgl/SglUserDeactivation/{userid}", name="SglUserDeactivation")
     *
     * Deaktiviert den User
     */
    public function SglUserDeactivationAction($userid)
    {
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $userid));
        $dozent->setIsActive(0);
        $em->persist($dozent);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'Der User wurde Deaktiviert');

        return $this->redirect($this->generateUrl('benutzerVerwaltung'));
    }

    /**
     * @Route("/restricted/sgl/SglUserActivation/{userid}", name="SglUserActivation")
     *
     * Aktiviert den User
     */
    public function SglUserActivationAction($userid)
    {
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => $userid));
        $dozent->setIsActive(1);
        $em->persist($dozent);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'Der User wurde Aktiviert');

        return $this->redirect($this->generateUrl('benutzerVerwaltung'));
    }



}
