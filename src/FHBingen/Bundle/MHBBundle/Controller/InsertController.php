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

class InsertController extends Controller
{

    /**
     * @Route("/sql/")
     */
    public function createAction()
    {
        $this->dozentAction();
        $this->semesterAction();
        return new Response('Dozenten und Semester angelegt!');
    }

    public function dozentAction()
    {
        $this->dozent0();
        $this->dozent1();
        $this->dozent2();
        $this->dozent3();
        $this->dozent4();
    }

    public function  dozent0()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Herr');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Lucky');
        $dozent->setNachname('Luke');
        $dozent->setEmail('lucky@luke.com');

        if($this->dozentAssert($dozent)){
         $em = $this->getDoctrine()->getManager();
            $em->persist($dozent);
            $em->flush();
        }

        return new Response('Created DozentenID ' . $dozent->getDozentenID());
    }

    public function dozent1()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Frau');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Rot');
        $dozent->setNachname('Kaeppchen');
        $dozent->setEmail('rot@kaeppchen.com');

        $this->dozentAssert($dozent);

        if($this->dozentAssert($dozent)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($dozent);
            $em->flush();
        }

        return new Response('Created DozentenID ' . $dozent->getDozentenID());
    }

    public function dozent2()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Frau');
        $dozent->setName('Andrea');
        $dozent->setNachname('Stasche');
        $dozent->setEmail('stasche@sprechart.com');

        $this->dozentAssert($dozent);

        if($this->dozentAssert($dozent)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($dozent);
            $em->flush();
        }

        return new Response('Created DozentenID ' . $dozent->getDozentenID());
    }

    public function dozent3()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Herr');
        $dozent->setTitel('Dipl. Inf.');
        $dozent->setName('Max');
        $dozent->setNachname('Raabe');
        $dozent->setEmail('raabe@fh-bingne.de');
        $this->dozentAssert($dozent);

        if($this->dozentAssert($dozent)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($dozent);
            $em->flush();
        }

        return new Response('Created DozentenID ' . $dozent->getDozentenID());
    }

    public function dozent4()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Blubb');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Peter');
        $dozent->setNachname('Lustig');
        $dozent->setEmail('lustig@fh-bingen.de');
        $this->dozentAssert($dozent);

        if($this->dozentAssert($dozent)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($dozent);
            $em->flush();
        }

        return new Response('Created DozentenID ' . $dozent->getDozentenID());
    }

    public function semesterAction()
    {
        $this->sem0();
        $this->sem1();
        $this->sem2();
        $this->sem3();
        $this->sem4();
    }

    public function sem0()
    {
        $sem = new Semester();
        $sem->setSemester('WS14');
        $this->semesterAssert($sem);

        if($this->semesterAssert($sem)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($sem);
            $em->flush();
        }

        return new Response('Created Semester ' . $sem->getSemester());
    }

    public function sem1()
    {
        $sem = new Semester();
        $sem->setSemester('SS15');
        $this->semesterAssert($sem);

        if($this->semesterAssert($sem)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($sem);
            $em->flush();
        }

        return new Response('Created Semester ' . $sem->getSemester());
    }

    public function sem2()
    {
        $sem = new Semester();
        $sem->setSemester('WS15');
        $this->semesterAssert($sem);

        if($this->semesterAssert($sem)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($sem);
            $em->flush();
        }

        return new Response('Created Semester ' . $sem->getSemester());
    }

    public function sem3()
    {
        $sem = new Semester();
        $sem->setSemester('SS16');
        $this->semesterAssert($sem);

        if($this->semesterAssert($sem)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($sem);
            $em->flush();
        }

        return new Response('Created Semester ' . $sem->getSemester());
    }

    public function sem4()
    {
        $sem = new Semester();
        $sem->setSemester('S14');
        $this->semesterAssert($sem);

        if($this->semesterAssert($sem)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($sem);
            $em->flush();
        }

        return new Response('Created Semester ' . $sem->getSemester());
    }

    public function semesterAssert($sem)
    {
        $validator = $this->get('validator');
        $errors = $validator->validate($sem);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new Response($errorsString);
        }
    }

    public function dozentAssert($dozent)
    {
        $validator = $this->get('validator');
        $errors = $validator->validate($dozent);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new Response($errorsString);
        }
        else{
            //true = keine fehler;
            return true;
        }
    }
}
