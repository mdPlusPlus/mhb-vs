<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 07.12.2014
 * Time: 14:23
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use FHBingen\Bundle\MHBBundle\Entity\Vertiefung;
use FHBingen\Bundle\MHBBundle\Form\VertiefungType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use FHBingen\Bundle\MHBBundle\Entity\Veranstaltung;
use FHBingen\Bundle\MHBBundle\Form\DozentType;
use FHBingen\Bundle\MHBBundle\Form\VeranstaltungType;
use Symfony\Component\HttpFoundation\Response;

class InsertFormController extends Controller
{
    /**
     * @Route("/creation/dozent")
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
    public function DozentAction()
    {
        $dozent = new Dozent();
        $form = $this->createForm(new DozentType(), $dozent);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $dozent->setAnrede ($form->get('anrede')->getData());
                $dozent->setTitel ($form->get('titel')->getData());
                $dozent->setName ($form->get('name')->getData());
                $dozent->setNachname ($form->get('nachname')->getData());
                $dozent->setEmail ($form->get('email')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($dozent);
                $em->flush();

                return new Response('Dozent wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:form.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:form.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/creation/Modul")
     * Vorraussetztung (Modul)
     */
    public function VeranstaltungAction()
    {
        $veranstaltung = new Veranstaltung();
        $form = $this->createForm(new VeranstaltungType(), $veranstaltung);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $veranstaltung->setErstellungsdatum(new \DateTime());
                $veranstaltung->setErstelltVon($form->get('erstellt_von')->getData());
                $veranstaltung->setVersionsnummerModul(1);
                $veranstaltung->setStatus($form->get('Status')->getData());
                $veranstaltung->setKuerzel($form->get('Kuerzel')->getData());
                $veranstaltung->setName($form->get('Name')->getData());
                $veranstaltung->setNameEn($form->get('Name_en')->getData());
                $veranstaltung->setHaeufigkeit($form->get('Haeufigkeit')->getData());
                $veranstaltung->setDauer($form->get('Dauer')->getData());
                $veranstaltung->setLehrveranstaltungen($form->get('Lehrveranstaltungen')->getData());
                $veranstaltung->setKontaktzeitVL($form->get('Kontaktzeit_VL')->getData());
                $veranstaltung->setKontaktzeitSonstige($form->get('Kontaktzeit_sonstige')->getData());
                $veranstaltung->setSelbststudium($form->get('Selbststudium')->getData());
                $veranstaltung->setGruppengroesse($form->get('Gruppengroesse')->getData());
                $veranstaltung->setLernergebnisse($form->get('Lernergebnisse')->getData());
                $veranstaltung->setInhalte($form->get('Inhalte')->getData());
                $veranstaltung->setPruefungsformen($form->get('Pruefungsformen')->getData());
                $veranstaltung->setSprache($form->get('Sprache')->getData());
                $veranstaltung->setLiteratur($form->get('Literatur')->getData());
                $veranstaltung->setLeistungspunkte($form->get('Leistungspunkte')->getData());
                $veranstaltung->setVoraussetzungLP($form->get('Voraussetzung_LP')->getData());
                $veranstaltung->setVoraussetzungInh($form->get('Voraussetzung_inh')->getData());

                $em = $this->getDoctrine()->getManager();
                $table = $em->getRepository ( 'FHBingenMHBBundle:Dozent' );
                $entry = $table->findOneBy(array('Email' => $form->get('beauftragter')->getData()));
                $veranstaltung->setBeauftragter($entry->getDozentenID());

                $em->persist($veranstaltung);
                $em->flush();

                return new Response('Modul wurde erfolgreich erstellt');
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
                $vertiefung->setStgang($form->get('studiengang')->getData());
                $vertiefung->setVertiefungsrichtung($form->get('vertiefungsrichtung')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($vertiefung);
                $em->flush();

                return new Response('Dozent wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:vertiefung.html.twig', array('form'=>$form->createView()));
    }
}