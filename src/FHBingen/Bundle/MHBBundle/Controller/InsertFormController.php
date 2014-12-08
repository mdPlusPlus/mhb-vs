<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 07.12.2014
 * Time: 14:23
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FHBingen\Bundle\MHBBundle\Entity\Dozent;
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
//            $anrede = $form->get('anrede')->getData();
//            $titel = $form->get('titel')->getData();
//            $name = $form->get('name')->getData();
//            $nachname = $form->get('nachname')->getData();
//            $email = $form->get('email')->getData();

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
     * Reihenfolge:
     * Dozent, Semester
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
                $veranstaltung->setStatus($form->get('status')->getData());
                $veranstaltung->setKuerzel($form->get('kuerzel')->getData());
                $veranstaltung->setName($form->get('name')->getData());
                $veranstaltung->setNameEn($form->get('name_en')->getData());
                $veranstaltung->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $veranstaltung->setDauer($form->get('dauer')->getData());
                $veranstaltung->setLehrveranstaltungen($form->get('lehrveranstaltungen')->getData());
                $veranstaltung->setKontaktzeitVL($form->get('kontaktzeit_vl')->getData());
                $veranstaltung->setKontaktzeitSonstige($form->get('kontaktzeit_sonstige')->getData());
                $veranstaltung->setSelbststudium($form->get('selbststudium')->getData());
                $veranstaltung->setGruppengroesse($form->get('gruppen')->getData());
                $veranstaltung->setLernergebnisse($form->get('lernergebnisse')->getData());
                $veranstaltung->setInhalte($form->get('inhalte')->getData());
                $veranstaltung->setPruefungsformen($form->get('pruefform')->getData());
                $veranstaltung->setSprache($form->get('sprache')->getData());
                $veranstaltung->setLiteratur($form->get('literatur')->getData());
                $veranstaltung->setLeistungspunkte($form->get('punkte')->getData());
                $veranstaltung->setVoraussetzungLP($form->get('vor_lp')->getData());
                $veranstaltung->setVoraussetzungInh($form->get('vor_inh')->getData());

                $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
                $entry = $table->findOneBy(array('Email' => $form->get('beauftragter')->getData()));
                $veranstaltung->setBeauftragter($entry->getDozentenID());

                $em = $this->getDoctrine()->getManager();
                $em->persist($veranstaltung);
                $em->flush();

                return new Response('Modul wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:veranstaltung.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:veranstaltung.html.twig', array('form'=>$form->createView()));
    }
}