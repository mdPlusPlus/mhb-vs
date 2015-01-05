<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 17.12.2014
 * Time: 03:00
 */

namespace FHBingen\Bundle\MHBBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use FHBingen\Bundle\MHBBundle\Entity;
use FHBingen\Bundle\MHBBundle\Form;
use Symfony\Component\Validator\Constraints\Null;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

class DozentController extends Controller
{
    /**
     * @Route("/restricted/dozent/eigeneModule", name="eigeneModule")
     * @Template("FHBingenMHBBundle:Dozent:eigeneModule.html.twig")
     */
    public function eigeneModuleAction()
    {
        //TODO: Filter auf Versionsnummer
        //TODO: Abfangen falls keine Module vorhanden sind

        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $modulverantwortung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID(), 'Status' => 'Freigegeben'),
            array("Name" => 'asc'));

        $mLehrende = array();
        foreach ($modulverantwortung as $m) {
            $name = array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('veranstaltung' => $m->getModulID()));

            foreach ($tmp as $lehrend) {
                $name[] = (string) $lehrend->getDozent();
            }
            $mLehrende[] = $name;
        }

        $entries = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('dozent' => $dozent->getDozentenID()));

        $modullehrend = array();
        foreach ($entries as $modul) {
            $modullehrend[] = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $modul->getVeranstaltung()));
        }

        asort($modullehrend, SORT_STRING);

        return array('modulverantwortung' => $modulverantwortung, 'modullehrend' => $modullehrend, 'mLehrende' => $mLehrende, 'pageTitle' => 'Eigene Module');
    }


    /**
     * @Route("/restricted/dozent/planungAnzeigen", name="planungAnzeigen")
     * @Template("FHBingenMHBBundle:Dozent:planungUebersicht.html.twig")
     */
    public function planungAnzeigenAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID(), 'Status' => 'in Planung'), array('Name' => 'asc'));

        return array('planungen' => $module, 'pageTitle' => 'Modulplanung');
    }


    /**
     * @Route("/restricted/dozent/planungLoeschen/{id}", name="planungLoeschen")
     */
    public function planungLoeschenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $dbEntry = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id, 'beauftragter' => $dozent->getDozentenID(), 'Status' => 'in Planung'));

        $em->remove($dbEntry);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich gelöscht.');

        return $this->redirect($this->generateUrl('planungAnzeigen'));
    }

    /**
     * @Route("/restricted/dozent/planungErstellen", name="planungErstellen")
     * @Template("FHBingenMHBBundle:Dozent:planungErstellen.html.twig")
     */
    public function planungErstellenAction()
    {
        $encoder=new JsonEncoder();
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));

        $modul = new Entity\Veranstaltung();
        $form = $this->createForm(new Form\PlanungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                //notwendige Einträge
                $modul->setStatus('in Planung');
                $modul->setErstellungsdatum(new \DateTime());
                $modul->setVersionsnummer(0);
                $modul->setBeauftragter($dozent);
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setName($form->get('name')->getData());

                //optionale Einträge
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $modul->setDauer($form->get('dauer')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $modul->setSelbststudium($form->get('selbststudium')->getData());
                $modul->setGruppengroesse($form->get('gruppengroesse')->getData());
                $modul->setLernergebnisse($form->get('lernergebnisse')->getData());
                $modul->setInhalte($form->get('inhalte')->getData());
                $modul->setSprache($form->get('sprache')->getData());
                $modul->setLiteratur($form->get('literatur')->getData());
                $modul->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $modul->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $modul->setVoraussetzungLP($encoder->encode($form->get('voraussetzungLP')->getData(), 'json'));
                $modul->setPruefungsformen($encoder->encode($form->get('pruefungsformen')->getData(), 'json'));
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));

                $em->persist($modul);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich angelegt.');

                return $this->redirect($this->generateUrl('planungAnzeigen'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Planungserstellung');
    }



    /**
     * @Route("/restricted/dozent/planungBearbeiten/{id}", name="planungBearbeiten")
     * @Template("FHBingenMHBBundle:Dozent:planungBearbeiten.html.twig")
     */
    public function planungBearbeitenAction($id)
    {
        $encoder=new JsonEncoder();
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id, 'beauftragter' => $dozent->getDozentenID(), 'Status' => 'in Planung'));

        $form = $this->createForm(new Form\PlanungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                //notwendige Einträge
                $modul->setErstellungsdatum(new \DateTime());

                //Änderungen an Einträgen
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setName($form->get('name')->getData());
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $modul->setDauer($form->get('dauer')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $modul->setSelbststudium($form->get('selbststudium')->getData());
                $modul->setGruppengroesse($form->get('gruppengroesse')->getData());
                $modul->setLernergebnisse($form->get('lernergebnisse')->getData());
                $modul->setInhalte($form->get('inhalte')->getData());
                $modul->setSprache($form->get('sprache')->getData());
                $modul->setLiteratur($form->get('literatur')->getData());
                $modul->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $modul->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $modul->setVoraussetzungLP($encoder->encode($form->get('voraussetzungLP')->getData(), 'json'));
                $modul->setPruefungsformen($encoder->encode($form->get('pruefungsformen')->getData(), 'json'));
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));

                $em->persist($modul);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich bearbeitet.');

                return $this->redirect($this->generateUrl('planungAnzeigen'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Modulplanung');
    }

    /**
     * @Route("/restricted/dozent/modulBearbeiten/{id}", name="modulBearbeiten")
     * @Template("FHBingenMHBBundle:Dozent:modulBearbeiten.html.twig")
     */
    public function modulBearbeitenAction($id)
    {
        $encoder=new JsonEncoder();
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id, 'Status' => 'Freigegeben'));

        $form = $this->createForm(new Form\VeranstaltungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                //notwendige Einträge
                $modul->setErstellungsdatum(new \DateTime());

                //Änderungen an Einträgen
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setName($form->get('name')->getData());
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setBeauftragter($form->get('beauftragter')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                $modul->setDauer($form->get('dauer')->getData());
                $modul->setKontaktzeitVL($form->get('kontaktzeitVL')->getData());
                $modul->setKontaktzeitSonstige($form->get('kontaktzeitSonstige')->getData());
                $modul->setSelbststudium($form->get('selbststudium')->getData());
                $modul->setGruppengroesse($form->get('gruppengroesse')->getData());
                $modul->setLernergebnisse($form->get('lernergebnisse')->getData());
                $modul->setInhalte($form->get('inhalte')->getData());
                $modul->setSprache($form->get('sprache')->getData());
                $modul->setLiteratur($form->get('literatur')->getData());
                $modul->setLeistungspunkte($form->get('leistungspunkte')->getData());
                $modul->setVoraussetzungInh($form->get('voraussetzungInh')->getData());
                $modul->setVoraussetzungLP($encoder->encode($form->get('voraussetzungLP')->getData(), 'json'));
                $modul->setPruefungsformen($encoder->encode($form->get('pruefungsformen')->getData(), 'json'));
                $modul->setLehrveranstaltungen($encoder->encode($form->get('lehrveranstaltungen')->getData(), 'json'));

                $em->persist($modul);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Das Modul wurde erfolgreich bearbeitet.');

                return $this->redirect($this->generateUrl('eigeneModule'));
            }
        }

        return array('form' => $form->createView(), 'pageTitle' => 'Modulbearbeitung');
    }
}