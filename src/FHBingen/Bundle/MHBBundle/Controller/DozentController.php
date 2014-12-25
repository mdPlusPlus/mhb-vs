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
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('email'=> $userMail));
        $modulverantwortung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID()));

        $mLehrende = array();
        foreach ($modulverantwortung as $m) {
            $name=array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('veranstaltung' => $m->getModulID()));

            foreach ($tmp as $lehrend) {
                $name[]=(string) $lehrend->getDozent();
            }
            $mLehrende[]=$name;
        }

        $entries= $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('dozent'=> $dozent->getDozentenID()));

        $modullehrend =array();
        foreach ($entries as $modul) {
            $modullehrend[]=$em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=> $modul->getVeranstaltung()));
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

                    return $this->render('FHBingenMHBBundle:Veranstaltung:modulbearbeiten.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Modul Planung'));

                }

                return $this->render('FHBingenMHBBundle:Veranstaltung:modulbearbeiten.html.twig', array('form'=>$form->createView(),'pageTitle' => 'Modul Planung'));
         }
}