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

class DozentController extends Controller
{
    /**
     * @Route("/restricted/dozent/eigeneModule", name="eigeneModule")
     * @Template("FHBingenMHBBundle:Dozent:eigeneModule.html.twig")
     */
    public function eigeneModuleAction()
    {
        //TODO: Filter auf gleiche Module in beiden Tabellen
        //TODO: Filter auf Versionsnummer
        //TODO: Abfangen falls keine Module vorhanden sind

        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $modulverantwortung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID(), 'status' => 'Freigegeben'));

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

        return array('modulverantwortung' => $modulverantwortung, 'modullehrend' => $modullehrend, 'mLehrende' => $mLehrende, 'pageTitle' => 'STARTSEITE');
    }


    /**
     * @Route("/restricted/dozent/planungAnzeigen", name="planungAnzeigen")
     * @Template("FHBingenMHBBundle:Veranstaltung:planungsUebersicht.html.twig")
     */
    public function planungAnzeigenAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email' => $userMail));
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID(), 'status' => 'in Planung'));

        return array('planungen' => $module, 'pageTitle' => 'Modulplanung');
    }


    /**
     * @Route("/restricted/dozent/planungLoeschen/{id}", name="planungLoeschen")
     * @Template("FHBingenMHBBundle:Veranstaltung:planungsUebersicht.html.twig")
     */
    public function planungLoeschenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $dbEntry = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id));

        $em->remove($dbEntry);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich gelöscht.');

        return $this->redirect($this->generateUrl('planungAnzeigen'));
    }

    /**
     * @Route("/restricted/dozent/planungErstellen", name="planungErstellen")
     * @Template("FHBingenMHBBundle:Veranstaltung:planungErstellen.html.twig")
     */
    public function planungErstellenAction()
    {
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
                $modul->setVoraussetzungLP($form->get('voraussetzungLP')->getData());
                $modul->setPruefungsformen($form->get('pruefungsformen')->getData());
                $modul->setLehrveranstaltungen($form->get('lehrveranstaltungen')->getData());

                $em->persist($modul);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Die Planung wurde erfolgreich angelegt.');

                return $this->redirect($this->generateUrl('planungAnzeigen'));
            }
        }
        return $this->render('FHBingenMHBBundle:Veranstaltung:planungErstellen.html.twig', array('form' => $form->createView(), 'pageTitle' => 'Planungserstellung'));
    }



    /**
     * @Route("/restricted/dozent/modulbearbeiten/{id}", name="modulbearbeiten")
     * @Template("FHBingenMHBBundle:Veranstaltung:modulbearbeiten.html.twig")
     */
    public function modulplanungAction($id)
    {
//TODO: Wird abgeschafft und neu gebaut
        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID' => $id));

        $form = $this->createForm(new Form\VeranstaltungType(), $modul);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $modul->setStatus($form->get('status')->getData());
                $modul->setKuerzel($form->get('kuerzel')->getData());
                $modul->setName($form->get('name')->getData());
                $modul->setNameEn($form->get('nameEN')->getData());
                $modul->setHaeufigkeit($form->get('haeufigkeit')->getData());
                //$modul->setDauer($form->get('lehrveranstaltungen')->getData());
                $modul->setDauer($form->get('kontaktzeitVL')->getData());
                $modul->setDauer($form->get('kontaktzeitSonstige')->getData());
                $modul->setDauer($form->get('selbststudium')->getData());
                $modul->setDauer($form->get('gruppengroesse')->getData());
                $modul->setDauer($form->get('lernergebnisse')->getData());
                $modul->setDauer($form->get('inhalte')->getData());
                //$modul->setDauer($form->get('pruefungsformen')->getData());
                $modul->setDauer($form->get('sprache')->getData());
                $modul->setDauer($form->get('literatur')->getData());
                $modul->setDauer($form->get('leistungspunkte')->getData());
                //$modul->setDauer($form->get('voraussetzungLP')->getData());
                $modul->setDauer($form->get('voraussetzungInh')->getData());

                $em->persist($modul);
                $em->flush();
            }
        }

        return $this->render('FHBingenMHBBundle:Veranstaltung:modulbearbeiten.html.twig', array('form' => $form->createView(), 'pageTitle' => 'Modul Planung'));
    }

}