<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 08.12.2014
 * Time: 17:10
 */

namespace FHBingen\Bundle\MHBBundle\Controller;


use FHBingen\Bundle\MHBBundle\Entity\Fachgebiet;
use FHBingen\Bundle\MHBBundle\Entity\Kernfach;
use FHBingen\Bundle\MHBBundle\Entity\Lehrende;
use FHBingen\Bundle\MHBBundle\Form\FachgebietType;
use FHBingen\Bundle\MHBBundle\Form\KernfachType;
use FHBingen\Bundle\MHBBundle\Form\LehrendeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FHBingen\Bundle\MHBBundle\Entity\Angebot;
use FHBingen\Bundle\MHBBundle\Form\AngebotType;
use Symfony\Component\HttpFoundation\Response;


class InsertmomoController extends Controller
{
    /**
     * @Route("/creation/angebot")
     */
    public function AngebotAction()
    {
        $angebot = new Angebot();
        $form = $this->createForm(new AngebotType(), $angebot);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $angebot->setModule ($form->get('module')->getData());
                $angebot->setMhb ($form->get('mhb')->getData());
                $angebot->setFachgebiet ($form->get('fachgebiet')->getData());
                $angebot->setStudiengang ($form->get('studiengang')->getData());
                $angebot->setAngebotsart ($form->get('angebotsart')->getData());
                $angebot->setCode ($form->get('code')->getData());
                $angebot->setAbweichender_Titel_DE ($form->get('abweichender_Titel_DE')->getData());
                $angebot->setAbweichender_Titel_EN ($form->get('abweichender_Titel_EN')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($angebot);
                $em->flush();

                return new Response('Angebot wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:angebot.html.twig', array('form'=>$form->createView()));
    }
       /**
     * @Route("/creation/fachgebiet")
     */
    public function FachgebietAction()
    {
        $fachgebiet = new Fachgebiet();
        $form = $this->createForm(new FachgebietType(), $fachgebiet);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $fachgebiet->setTitel($form->get('title')->getData());
                $fachgebiet->setHat ($form->get('hat')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($fachgebiet);
                $em->flush();

                return new Response('Fachgebiet wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:Fachgebiet.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:Fachgebiet.html.twig', array('form'=>$form->createView()));
    }
    /**
     * @Route("/creation/kernfach")
     */
    public function KernfachAction()
    {
        $kernfach = new Kernfach();
        $form = $this->createForm(new KernfachType(), $kernfach);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $kernfach->setId($form->get('id')->getData());
                $kernfach->setModul($form->get('modul')->getData());
                $kernfach->setVertiefung ($form->get('vertiefung')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($kernfach);
                $em->flush();

                return new Response('Kernfach wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:kernfach.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:kernfach.html.twig', array('form'=>$form->createView()));
    }
    /**
     * @Route("/creation/lerhrende")
     */
    public function LehrendeAction()
    {
        $lehr = new Lehrende();
        $form = $this->createForm(new LehrendeType(), $lehr);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $lehr->setId($form->get('id')->getData());
                $lehr->setModule($form->get('module')->getData());
                $lehr->setLehrender($form->get('lehrender')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($lehr);
                $em->flush();

                return new Response('Lehrender wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:lehrender.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:lehrender.html.twig', array('form'=>$form->createView()));
    }

} 