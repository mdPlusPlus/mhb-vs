<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 05.12.2014
 * Time: 12:49
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use FHBingen\Bundle\MHBBundle\Entity\Semester;
use Symfony\Component\HttpFoundation\Response;

class InsertController extends Controller{


    public function sem_validation()
    {
        $sem = new Semester();

        $validator = $this->get('validator');
        $errors = $validator->validate($sem);

        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging
             */
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        return new Response('Das Semester ist valide!');
    }




    /**
     * @Route("/sql/")
     */
    public function createAction()
    {
        $this->dozentAction();
        return new Response('Dozenten und Semester angelegt!');
    }


    public function dozentAction()
    {
        $this->dozent0();
        $this->dozent1();
        $this->dozent2();
        $this->dozent3();
        $this->dozent4();
        $this->semesterAction();
       // return $this->redirect($this->generateUrl('/sql/semester'));
       // return new Response('Dozenten angelegt!');

    }


    public function semesterAction()
    {
        $this->sem0();
        $this->sem1();
        $this->sem2();
        $this->sem3();
        $this->sem4();
        return new Response('Semester angelegt!');
    }

    public function  dozent0(){
        $dozent = new Dozent();
        $dozent->setAnrede('Herr');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Lucky');
        $dozent->setNachname('Luke');
        $dozent->setEmail('lucky@luke.com');


        $em = $this->getDoctrine()->getManager();
        $em->persist($dozent);
        $em->flush();

        return new Response('Created DozentenID '.$dozent->getDozentenID());
    }

    public function dozent1(){
        $dozent = new Dozent();
        $dozent->setAnrede('Frau');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Rot');
        $dozent->setNachname('Kaeppchen');
        $dozent->setEmail('rot@kaeppchen.com');

        $em = $this->getDoctrine()->getManager();
        $em->persist($dozent);
        $em->flush();

        return new Response('Created DozentenID '.$dozent->getDozentenID());
    }

    public function dozent2(){
        $dozent = new Dozent();
        $dozent->setAnrede('Frau');
        $dozent->setName('Andrea');
        $dozent->setNachname('Stasche');
        $dozent->setEmail('stasche@sprechart.com');

        $em = $this->getDoctrine()->getManager();
        $em->persist($dozent);
        $em->flush();

        return new Response('Created DozentenID '.$dozent->getDozentenID());
    }

    public function dozent3(){
        $dozent = new Dozent();
        $dozent->setAnrede('Herr');
        $dozent->setTitel('Dipl. Inf.');
        $dozent->setName('Max');
        $dozent->setNachname('Raabe');
        $dozent->setEmail('raabe@fh-bingne.de');

        $em = $this->getDoctrine()->getManager();
        $em->persist($dozent);
        $em->flush();

        return new Response('Created DozentenID '.$dozent->getDozentenID());
    }

    public function dozent4(){
        $dozent = new Dozent();
        $dozent->setAnrede('Herr');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Peter');
        $dozent->setNachname('Lustig');
        $dozent->setEmail('lustig@fh-bingne.de');

        $em = $this->getDoctrine()->getManager();
        $em->persist($dozent);
        $em->flush();

        return new Response('Created DozentenID '.$dozent->getDozentenID());
    }


    public function sem0(){
        $sem = new Semester();
        $sem->setSemester('WS14');
        $this->indexAction();

        $em = $this->getDoctrine()->getManager();
        $em->persist($sem);
        $em->flush();

        return new Response('Created Semester '.$sem->getSemester());
    }

    public function sem1(){
        $sem = new Semester();
        $sem->setSemester('SS15');
        $this->indexAction();

        $em = $this->getDoctrine()->getManager();
        $em->persist($sem);
        $em->flush();

        return new Response('Created Semester '.$sem->getSemester());
    }

    public function sem2(){
        $sem = new Semester();
        $sem->setSemester('WS15');
        $this->indexAction();

        $em = $this->getDoctrine()->getManager();
        $em->persist($sem);
        $em->flush();

        return new Response('Created Semester '.$sem->getSemester());
    }

    public function sem3(){
        $sem = new Semester();
        $sem->setSemester('SS16');
        $this->indexAction();

        $em = $this->getDoctrine()->getManager();
        $em->persist($sem);
        $em->flush();

        return new Response('Created Semester '.$sem->getSemester());
    }

    public function sem4(){
        $sem = new Semester();
        $sem->setSemester('S14');
        $this->indexAction();

        $em = $this->getDoctrine()->getManager();
        $em->persist($sem);
        $em->flush();

        return new Response('Created Semester '.$sem->getSemester());
    }

}
