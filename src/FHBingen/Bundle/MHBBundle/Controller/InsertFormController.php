<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 07.12.2014
 * Time: 14:23
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use FHBingen\Bundle\MHBBundle\Entity\Semester;
use FHBingen\Bundle\MHBBundle\Form\DozentType;
use Symfony\Component\HttpFoundation\Response;

class InsertFormController extends Controller
{
    /**
     * @Route("/creation/dozent")
     * Reihenfolge:
     * Dozent, Semester (nix)
     * Module (Dozent)
     * Angebot (Modul; Modulhandbuch; Fachgebiet; Studiengang)
     * Fachgebiet (Studiengang)
     * Kernfach (Modul; Vertiefung)
     * Lehrende (Modul; Dozent)
     * Modulhandbuch (Semester, Studiengang)
     * Semesterplan (Modul; Dozent; Semester)
     * Studiengang (Dozent)
     * Studienplan(Semester; Modul; Studiengang)
     * Vertiefung (Studiengang)
     * Vorraussetztung (Modul?)
     */
    public function DozentAction()
    {
        $dozent = new Dozent();
        $form = $this->createForm(new DozentType(), $dozent);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
//            $anrede = $form->get('anrede')->getData();
//            $titel = $form->get('titel')->getData();
//            $name = $form->get('name')->getData();
//            $nachname = $form->get('nachname')->getData();
//            $email = $form->get('email')->getData();

            if($form->isValid())
            {
                $dozent->setAnrede ($form->get('anrede')->getData());
                $dozent->setTitel ($form->get('titel')->getData());
                $dozent->setName ($form->get('name')->getData());
                $dozent->setNachname ($form->get('nachname')->getData());
                $dozent->setEmail ($form->get('email')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($dozent);
                $em->flush();

                return new Response('Dozent wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:form.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:form.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/creation/Semester")
     * Reihenfolge:
     * Dozent, Semester (nix)
     * Module (Dozent)
     * Angebot (Modul; Modulhandbuch; Fachgebiet; Studiengang)
     * Fachgebiet (Studiengang)
     * Kernfach (Modul; Vertiefung)
     * Lehrende (Modul; Dozent)
     * Modulhandbuch (Semester, Studiengang)
     * Semesterplan (Modul; Dozent; Semester)
     * Studiengang (Dozent)
     * Studienplan(Semester; Modul; Studiengang)
     * Vertiefung (Studiengang)
     * Vorraussetztung (Modul?)
     */
    public function SemesterAction()
    {
        $semester = new Semester();
        $form = $this->createForm(new DozentType(), $dozent);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
//            $anrede = $form->get('anrede')->getData();
//            $titel = $form->get('titel')->getData();
//            $name = $form->get('name')->getData();
//            $nachname = $form->get('nachname')->getData();
//            $email = $form->get('email')->getData();

            if($form->isValid())
            {
                $dozent->setAnrede ($form->get('anrede')->getData());
                $dozent->setTitel ($form->get('titel')->getData());
                $dozent->setName ($form->get('name')->getData());
                $dozent->setNachname ($form->get('nachname')->getData());
                $dozent->setEmail ($form->get('email')->getData());

                $em = $this->getDoctrine()->getManager();
                $em->persist($dozent);
                $em->flush();

                return new Response('Dozent wurde erfolgreich erstellt');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:form.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('FHBingenMHBBundle:InsertForm:form.html.twig', array('form'=>$form->createView()));
    }
}