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

class SglController extends Controller
{
    /**
     * @Route("/restricted/sgl/alleModule", name="alleModule")
     * * @Template("FHBingenMHBBundle:Veranstaltung:alleModule.html.twig")
     */
    public function alleModuleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();

        return array('module' => $module,'pageTitle' => 'STARTSEITE');
    }

    /**
     * @Route("/restricted/sgl/moduleCodeAnpassung", name="modulCodeAnpassung")
     * @Template("FHBingenMHBBundle:Veranstaltung:moduleCodeAnpassung.html.twig")
     */
    public function modulCodeAnpasungAction()
    {
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
     * @Route("/restricted/sgl/modulcode", name="modulcode")
     * @Template("FHBingenMHBBundle:Veranstaltung:modulCode.html.twig")
     */
    public function modulCodeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $angebot = $em->getRepository('FHBingenMHBBundle:Angebot')->findOneBy(array('module'=>122));
        $form = $this->createForm(new Form\CodeType(), $angebot);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $angebot->setModule($form->get('module')->getData());
                $angebot->setCode($form->get('code')->getData());

                $em->persist($angebot);
                $em->flush();
            }

            return $this->render('FHBingenMHBBundle:Veranstaltung:modulCode.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Nutzerverwaltung'));

        }

        return $this->render('FHBingenMHBBundle:Veranstaltung:modulCode.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Nutzerverwaltung'));
    }




    /**
     * @Route("/restricted/sgl/mhbUebersicht", name="mhbUebersicht")
     * @Template("FHBingenMHBBundle:MHB:MHB_Modul_Uebersicht.html.twig")
     */
    public function mhbUebersichtAction()
    {
    $em = $this->getDoctrine()->getManager();
    $mhb = $em->getRepository('FHBingenMHBBundle:Modulhandbuch')->findAll();

    return array('mhb' => $mhb,'pageTitle' => 'STARTSEITE');
    }
    /**
     * @Route("/restricted/sgl/mhbModulListe/{id}", name="mhbModulListe")
     * @Template("FHBingenMHBBundle:MHB:MHB_Modul_Liste.html.twig")
     */
    public function mhbModulListe($id)
    {

        $em = $this->getDoctrine()->getManager();
        $mhb = $em->createQuery('SELECT v.Modul_ID, v.Name , v.Kuerzel ,a.Code, v.Haeufigkeit, v.Versionsnummer_Modul , d.Nachname
                                  FROM  FHBingenMHBBundle:Angebot a
                                  JOIN  FHBingenMHBBundle:Veranstaltung v WITH  a.module =  v.Modul_ID
                                  JOIN  FHBingenMHBBundle:Dozent d WITH  v.beauftragter =  d.Dozenten_ID
                                  AND a.mhb ='.$id);


        $result =$mhb->getResult();

        return array('mhb' => $result,'pageTitle' => 'STARTSEITE');
    }


    /**
     * @Route("/restricted/sgl/mhbErstellung", name="mhbErstellung")
     */
    public function mhbErstellungAction()
    {

    }

    /**
     * @Route("/restricted/sgl/moduldeaktivierung", name="moduldeaktivierung")
     */
    public function modulDeaktivierungAction()
{

}

}