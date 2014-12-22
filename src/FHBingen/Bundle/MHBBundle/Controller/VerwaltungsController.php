<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 15.12.2014
 * Time: 16:57
 */

namespace FHBingen\Bundle\MHBBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use FHBingen\Bundle\MHBBundle\Entity;
use FHBingen\Bundle\MHBBundle\Form;

class VerwaltungsController extends Controller
{
    /**
     * @Route("/restricted/sgl/showUsers", name="benutzerverwaltung")
     * @Template("FHBingenMHBBundle:Verwaltung:userverwaltung.html.twig")
     */
    public function SglShowUsersAction()
    {
        //alle Nutzer sortieren

        $em = $this->getDoctrine()->getManager();
        $entries = $em->getRepository('FHBingenMHBBundle:Dozent')->findALL();

        $dozent=array();
        $sgl=array();

        foreach($entries as $e)
        {
            if($e->getRoles()[0]== 'ROLE_SGL')
            {
                $sgl[]=$e;
            }
            else
            {
                if($e->getRoles()[0]== 'ROLE_DOZENT')
                {
                    $dozent[]=$e;
                }
            }
        }
        return array('sgl' => $sgl, 'dozent' => $dozent, 'pageTitle' => 'Nutzerverwaltung');
    }


    /**
     * @Route("/restricted/sgl/createUsers")
     * @Template("FHBingenMHBBundle:Verwaltung:userCreate.html.twig")
     */
    public function SglCreateUserAction()
    {

        $dozent = new Entity\Dozent();
        $form = $this->createForm(new Form\DozentType(), $dozent);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $dozent->setAnrede($form->get('anrede')->getData());
                $dozent->setTitel($form->get('titel')->getData());
                $dozent->setName($form->get('name')->getData());
                $dozent->setNachname($form->get('nachname')->getData());
                $dozent->setEmail($form->get('email')->getData());
                $dozent->setPassword('password');
                $dozent->setRole($form->get('roles')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($dozent);
                $em->flush();
            }

            return $this->render('FHBingenMHBBundle:Verwaltung:userCreate.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Nutzerverwaltung'));
        }

        return $this->render('FHBingenMHBBundle:Verwaltung:userCreate.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Nutzerverwaltung'));
    }



    /**
     * @Route("/restricted/sgl/updateUsers/{userid}")
     * @Template("FHBingenMHBBundle:Verwaltung:userverwaltung.html.twig")
     */
    public function SglUpdateUserAction($userid)
    {
        $em = $this->getDoctrine()->getManager();
        $dozent = $em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID'=>$userid));
        $form = $this->createForm(new Form\DozentType(), $dozent);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $dozent->setAnrede($form->get('anrede')->getData());
                $dozent->setTitel($form->get('titel')->getData());
                $dozent->setName($form->get('name')->getData());
                $dozent->setNachname($form->get('nachname')->getData());
                $dozent->setEmail($form->get('email')->getData());
                $dozent->setRole($form->get('roles')->getData());

                $em->persist($dozent);
                $em->flush();
            }

            return $this->render('FHBingenMHBBundle:Verwaltung:userCreate.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Nutzerverwaltung'));

        }

        return $this->render('FHBingenMHBBundle:Verwaltung:userCreate.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Nutzerverwaltung'));
    }


    /**
     * @Route("/restricted/sgl/showCourse", name="studiengangverwaltung")
     * @Template("FHBingenMHBBundle:Verwaltung:userverwaltung.html.twig")
     */
    public function SglShowCourseAction()
    {

        $em = $this->getDoctrine()->getManager();
        $studiengang = $em->getRepository('FHBingenMHBBundle:Studiengang')->findOneBy(array('Studiengang_ID'=>2));
        $form = $this->createForm(new Form\StudiengangType(), $studiengang);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {

            }

            return $this->render('FHBingenMHBBundle:Verwaltung:studiengangAnzeigen.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Studiengangverwaltung'));
        }

        return $this->render('FHBingenMHBBundle:Verwaltung:studiengangAnzeigen.html.twig', array('form'=>$form->createView(), 'pageTitle' => 'Studiengangverwaltung'));
    }

}
