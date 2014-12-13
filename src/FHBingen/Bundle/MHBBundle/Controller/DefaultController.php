<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FHBingen\Bundle\MHBBundle\Entity;

//TODO löschen/ändern
class DefaultController extends Controller
{
    /**
     * @Route("/sec/restricted/index")
     * @Template("FHBingenMHBBundle::layout_old.html.twig")
     */
    public function indexAction()
    {
        return array('pageTitle' => 'Modulhandbuch-Verwaltungssystem', 'headline' => 'Login');
    }


    /**
     * @Route("/sec/restricted/SGL")
     * @Template("FHBingenMHBBundle:SGL:eigeneModule.html.twig")
     */
    public function SglMainAction()
    {
        //Filter auf Status
        //Filter auf Modul
        //Filter auf Versionsnummer
        //Abfangen falls keine Module vorhanden sind
        //Email anpassen

//        $user = $this->get('security.context')->getToken()->getUser();
//        $user_mail = $user->getUsername(); $user_mail
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Email'=> 'schmidt@fh-bingen.de'));
        $modulverantwortung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID()));

        $mLehrende=array();
        foreach($modulverantwortung as $m)
        {
            $name=array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('module' => $m->getModulID()));

            foreach($tmp as $lehrend)
            {
                $name[]=(string)$lehrend->getLehrender();
            }
            $mLehrende[]=$name;
        }

        $entries= $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('lehrender'=> $dozent->getDozentenID()));

        $modullehrend =array();
        foreach($entries as $modul)
        {
            $modullehrend[]=$em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=> $modul->getModule()));
        }

        return array('modulverantwortung' => $modulverantwortung, 'modullehrend' => $modullehrend, 'mLehrende' => $mLehrende,'pageTitle' => 'STARTSEITE');
    }

    /**
     * @Route("/Dozent")
     * @Template("FHBingenMHBBundle:Dozent:eigeneModule.html.twig")
     */
    public function DozentMainAction()
    {
        //Filter auf Status
        //Filter auf Modul
        //Filter auf Versionsnummer
        //Abfangen falls keine Module vorhanden sind
        //Email rausnehmen

//        $user = $this->get('security.context')->getToken()->getUser();
//        $user_mail = $user->getUsername(); $user_mail
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Email'=> 'schmidt@fh-bingen.de'));
        $modulverantwortung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID()));

        $mLehrende=array();
        foreach($modulverantwortung as $m)
        {
            $name=array();
            $tmp = $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('module' => $m->getModulID()));

            foreach($tmp as $lehrend)
            {
                $name[]=(string)$lehrend->getLehrender();
            }
            $mLehrende[]=$name;
        }

        $entries= $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('lehrender'=> $dozent->getDozentenID()));

        $modullehrend =array();
        foreach($entries as $modul)
        {
            $modullehrend[]=$em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=> $modul->getModule()));
        }

        return array('modulverantwortung' => $modulverantwortung, 'modullehrend' => $modullehrend, 'mLehrende' => $mLehrende,'pageTitle' => 'STARTSEITE');
    }

    /**
     * @Route("/MHB")
     * @Template("FHBingenMHBBundle:MHB:MHB_Modul_Uebersicht.html.twig")
     */
    public function MHBMainAction()
    {


        $em = $this->getDoctrine()->getManager();
        /*
        //$Studiengan sollen alle StudiengangIDs stehen mit der id iher zb. 2
        $Studiengan = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('Studiengang_ID'=> 2));
        //$Angebote  gefilter auf die StudiengangID aus $Studiengan
        $Angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('studiengang' => $Studiengan->getStudiengangID()));
        */

        $qb = $em->createQueryBuilder();
        $qb->select('s.Titel', 'a.mhb_id' ,'a.modul_id','v.Name','v.Name_EN' ,
            'v.Kuerzel','a.Code',
            'a.Angebotsart', 'v.Haeufigkeit' , 'v.Dauer' , 'v.Lehrveranstaltungen' ,
            'v.Kontaktzeit_VL' , 'v.Kontaktzeit_Sonstige' , 'v.Selbststudium' , 'v.Gruppengroesse' ,
            'v.Lernergebnisse' , 'v.Inhalte' , 'v.Pruefungsformen' , 'v.Sprache' ,
            'v.Literatur' , 'v.Leistungspunkte' , 'v.Voraussetzung_LP' ,
            'v.Voraussetzung_inh' , 'd.Nachname' , 'v.Erstellungsdatum')
          ->FROM('Angebot','a')
          ->Join('a','Veranstaltung','v', 'a.modul_id = v.modul_id')
          ->Join('a','Studiengang','s', 'a.studiengang_id = s.studiengang_id')
          ->Join('a','Dozent','d', 'a.Modulbeauftragter = d.Dozenten_ID')
          ->where('a.mhb_id = 1');
        return array('query' => $qb,'pageTitle' => 'STARTSEITE');
    }

}
