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
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Nutzerverwaltung');
    }


    /**
     * @Route("/restricted/sgl/showCourse", name="studiengangverwaltung")
     * @Template("FHBingenMHBBundle:Verwaltung:studiengangAnzeigen.html.twig")
     */
    public function SglShowCourseAction()
    {
        //TODO: das ist NICHT die studiengangverwaltung (übersicht)
        $em = $this->getDoctrine()->getManager();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('Studiengang_ID' => 10));
        //$studiengang = new Entity\Studiengang();
        $form = $this->createForm(new Form\StudiengangType(), $studiengang);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                /*
                 * TODO:
                 * - Menge von Vertiefungsrichtungen und Fachgebieten mit DB vergleichen
                 * - alle DB-Einträge, die in neuem Set nicht mehr enthalten sind dereferenzieren und löschen
                 */
                $studiengang->setFachbereich($form->get('fachbereich')->getData());     //choice
                $studiengang->setGrad($form->get('grad')->getData());                   //choice
                $studiengang->setTitel($form->get('titel')->getData());                 //text
                $studiengang->setKuerzel($form->get('kuerzel')->getData());             //text
                $studiengang->setBeschreibung($form->get('beschreibung')->getData());   //text
                $studiengang->setSgl($form->get('sgl')->getData());                     //entity

                $vertiefungCollection = $form->get('richtung')->getData();      //collection
                foreach ($vertiefungCollection as $vertiefung) {
                    $studiengang->addRichtung($vertiefung);
                    $vertiefung->setStgang($studiengang);
                    $em->persist($vertiefung);
                }
                $allRichtungen = $studiengang->getRichtung();
                foreach ($allRichtungen as $dbEntry) {
                    if (!$vertiefungCollection->contains($dbEntry)) {
                        $em->remove($dbEntry);
                    }
                }

                $fachgebietCollection = $form->get('fachgebiete')->getData();   //collection
                foreach ($fachgebietCollection as $fachgebiet) {
                    $studiengang->addFachgebiete($fachgebiet);
                    $fachgebiet->setHat($studiengang);
                    $em->persist($fachgebiet);
                }

                $em->persist($studiengang);
                $em->flush();
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Studiengangverwaltung');
    }

}
