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

use FHBingen\Bundle\MHBBundle\Entity;
use FHBingen\Bundle\MHBBundle\Form;

class DozentController extends Controller
{
    /**
     * @Route("/restricted/dozent/eigeneModule", name="eigeneModule")
     * @Template("FHBingenMHBBundle:Dozent:eigeneModule.html.twig")
     */
    public function eigeneModuleAction()
    {
        //Filter auf Status
        //Filter auf Modul
        //Filter auf Versionsnummer
        //Abfangen falls keine Module vorhanden sind

        $user = $this->get('security.context')->getToken()->getUser();
        $userMail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Email'=> $userMail));
        $modulverantwortung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID()));

        $mLehrende = array();
        foreach ($modulverantwortung as $m) {
            $name=array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('module' => $m->getModulID()));

            foreach ($tmp as $lehrend) {
                $name[]=(string) $lehrend->getLehrender();
            }
            $mLehrende[]=$name;
        }

        $entries= $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('lehrender'=> $dozent->getDozentenID()));

        $modullehrend =array();
        foreach ($entries as $modul) {
            $modullehrend[]=$em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=> $modul->getModule()));
        }

        return array('modulverantwortung' => $modulverantwortung, 'modullehrend' => $modullehrend, 'mLehrende' => $mLehrende,'pageTitle' => 'STARTSEITE');
    }

    /**
     * @Route("/restricted/dozent/modulbearbeiten/{id}", name="modulbearbeiten")
     * @Template("FHBingenMHBBundle:Veranstaltung:modulbearbeiten.html.twig")
     */
    public function modulplanungAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $modul = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=>$id));
        $form = $this->createForm(new Form\VeranstaltungType(), $modul);

         $request = $this->get('request');
         $form->handleRequest($request);

          if ($request->getMethod() == 'POST') {
              if ($form->isValid()) {
                  $modul->setStatus($form->get('Status')->getData());
                  $modul->setKuerzel($form->get('Kuerzel')->getData());
                  $modul->setName($form->get('Name')->getData());
                  $modul->setNameEn($form->get('Name_en')->getData());
                  $modul->setHaeufigkeit($form->get('Haeufigkeit')->getData());
                  //$modul->setDauer($form->get('Lehrveranstaltungen')->getData());
                  $modul->setDauer($form->get('Kontaktzeit_VL')->getData());
                  $modul->setDauer($form->get('Kontaktzeit_sonstige')->getData());
                  $modul->setDauer($form->get('Selbststudium')->getData());
                  $modul->setDauer($form->get('Gruppengroesse')->getData());
                  $modul->setDauer($form->get('Lernergebnisse')->getData());
                  $modul->setDauer($form->get('Inhalte')->getData());
                  //$modul->setDauer($form->get('Pruefungsformen')->getData());
                  $modul->setDauer($form->get('Sprache')->getData());
                  $modul->setDauer($form->get('Literatur')->getData());
                  $modul->setDauer($form->get('Leistungspunkte')->getData());
                  //$modul->setDauer($form->get('Voraussetzung_LP')->getData());
                  $modul->setDauer($form->get('Voraussetzung_inh')->getData());

                $em->persist($modul);
                $em->flush();
            }

            return $this->render('FHBingenMHBBundle:Veranstaltung:modulbearbeiten.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Modul Planung'));

        }

        return $this->render('FHBingenMHBBundle:Veranstaltung:modulbearbeiten.html.twig', array('form'=>$form->createView(),'pageTitle' => 'Modul Planung'));


    }
}