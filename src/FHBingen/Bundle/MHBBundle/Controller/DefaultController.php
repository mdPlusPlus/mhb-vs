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
     * @Route("/")
     * @Template("FHBingenMHBBundle:SecurityDemo:login.html.twig")
     */
    public function indexAction()
    {
        return array('pageTitle' => 'Modulhandbuch-Verwaltungssystem', 'headline' => 'Login');
    }


    /**
     * @Route("/SGL")
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
        $user = $this->get('security.context')->getToken()->getUser();
        $user_mail = $user->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy('Email', $user_mail);

        $modulverantwortung= $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findBy('beauftragter', $dozent->getDozentenID());
        $entries= $em->getRepository('FHBingenMHBBundle:Lehrende')->findBy('dozent_id', $dozent->getDozentenID());
        $modullehrend =array();
        foreach($entries as $modul)
        {
            $modullehrend[]=$em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy('modul_id', $modul->getModule());
        }
        return array('modulverantwortung' => $modulverantwortung, 'modullehrend' => $modullehrend,'pageTitle' => 'STARTSEITE');
    }

}
