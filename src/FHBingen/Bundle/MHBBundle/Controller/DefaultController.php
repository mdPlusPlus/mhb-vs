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
        $userID='a';
        return array('name' => $userID,'pageTitle' => 'STARTSEITE');
    }

    /**
     * @Route("/Dozent")
     * @Template("FHBingenMHBBundle:Dozent:eigeneModule.html.twig")
     */
    public function DozentMainAction()
    {
        //Filter auf Status
        //Filter auf Modul
        //Abfangen falls keine Module vorhanden sind
//        $user = $this->get('security.context')->getToken()->getUser();
//        $user_mail = $user->getUsername(); $user_mail
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Email'=> 'schmidt@fh-bingen.de'));
        $modulverantwortung = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy(array('beauftragter' => $dozent->getDozentenID()));
        $entries= $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy(array('lehrender'=> $dozent->getDozentenID()));
        $modullehrend =array();
        foreach($entries as $modul)
        {
            $modullehrend[]=$em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=> $modul->getModule()));
        }
        return array('modulverantwortung' => $modulverantwortung, 'modullehrend' => $modullehrend,'pageTitle' => 'STARTSEITE');

    }

}
