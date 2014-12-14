<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use FHBingen\Bundle\MHBBundle\Entity;

//TODO löschen/ändern
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Route("/index")
     */
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('fhbingen_mhb_login_login'));
    }

    /**
     * @Route("/restricted/dozent/password")
     */
    public function ResetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dozenten= $em->getRepository('FHBingenMHBBundle:Dozent')->findAll();

        foreach($dozenten as $doz)
        {
            $doz->setPassword('testpass');
            $em->persist($doz);
            $em->flush();
        }

        return new Response('Passwörter wurden zurückgesetzt');
    }


    /**
     * @Route("/restricted/sgl/main")
     * @Template("FHBingenMHBBundle:SGL:eigeneModule.html.twig")
     */
    public function SglMainAction()
    {
        //Filter auf Status
        //Filter auf Modul
        //Filter auf Versionsnummer
        //Abfangen falls keine Module vorhanden sind
        //Email anpassen

        $user = $this->get('security.context')->getToken()->getUser();
        $user_mail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Email'=> $user_mail));
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
     * @Route("/restricted/Dozent")
     * @Template("FHBingenMHBBundle:Dozent:eigeneModule.html.twig")
     */
    public function DozentMainAction()
    {
        //Filter auf Status
        //Filter auf Modul
        //Filter auf Versionsnummer
        //Abfangen falls keine Module vorhanden sind
        //Email rausnehmen

        $user = $this->get('security.context')->getToken()->getUser();
        $user_mail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Email'=> $user_mail));
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
        $query = $em->createQuery('SELECT  s.Titel,v.Modul_ID, v.Name , v.Name_EN, v.Kuerzel ,
                                  v.Haeufigkeit , v.Dauer , v.Lehrveranstaltungen , v.Kontaktzeit_VL,
                                  v.Kontaktzeit_Sonstige , v.Selbststudium, v.Gruppengroesse , v.Lernergebnisse ,
                                  v.Inhalte , v.Pruefungsformen , v.Sprache , v.Literatur , v.Leistungspunkte ,
                                  v.Voraussetzung_LP , v.Voraussetzung_inh
                                  FROM  FHBingenMHBBundle:Angebot a
                                  JOIN  FHBingenMHBBundle:Veranstaltung v WITH  a.module =  v.Modul_ID
                                  JOIN  FHBingenMHBBundle:Studiengang s WITH  a.studiengang =  s.Studiengang_ID
                                  JOIN  FHBingenMHBBundle:Dozent d WITH  v.beauftragter =  d.Dozenten_ID
                                  AND a.mhb =1');
        $result =$query->getResult();

        return array('Titel' => $result,'pageTitle' => 'STARTSEITE');
    }

}
