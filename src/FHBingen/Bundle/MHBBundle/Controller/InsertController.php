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
     * @Route("/test")
     */
    public function testAction()
    {
        $response4 = $this->dozent4Action();
        $response0 = $this->dozent0Action();

        //what the fuck
        if($response4->isClientError()){
            return new Response("client error");
        }
        if($response4->isServerError()){
            return new Response("server error");
        }


        return new Response("Halt' doch's Maul!");
    }

    public function dozent0Action()
    {
        $em = $this->getDoctrine()->getManager();
        $validator = $this->get('validator');

        $dozent = $this->dozent0();
        $errors = $validator->validate($dozent);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }


        $em->persist($dozent);
        $em->flush();

        return new Response('Dozent ist valide.');
    }
    public function dozent4Action()
    {$em = $this->getDoctrine()->getManager();
        $validator = $this->get('validator');

        $dozent = $this->dozent4();
        $errors = $validator->validate($dozent);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }


        $em->persist($dozent);
        $em->flush();

        return new Response('Dozent ist valide.');
    }


    /**
     * @Route("/sql/")
     */
    public function createAction()
    {
        $fehler = false;
        if ($this->dozentAction()) {
            $fehler = true;
        }
        if ($this->semesterAction()) {
            $fehler = true;
        }

        if (!$fehler) {
            return new Response('Dozenten und Semester angelegt!');
        } else {
            return new Response('Es gab einen Fehler!');
        }


    }

    public function dozentAction()
    {
        $em = $this->getDoctrine()->getManager();
        $fehler = false;

        $dozent = $this->dozent0();
        if ($this->dozentAssert($dozent)) {
            $em->persist($dozent);
        }
        else{
            $fehler = true;
        }
        $dozent = $this->dozent1();
        if ($this->dozentAssert($dozent)) {
            $em->persist($dozent);
        }
        else{
            $fehler = true;
        }
        $dozent = $this->dozent2();
        if ($this->dozentAssert($dozent)) {
            $em->persist($dozent);
        }
        else{
            $fehler = true;
        }
        $dozent = $this->dozent3();
        if ($this->dozentAssert($dozent)) {
            $em->persist($dozent);
        }
        else{
            $fehler = true;
        }
        $dozent = $this->dozent4();
        if ($this->dozentAssert($dozent)) {
            $em->persist($dozent);
        }
        else{
            $fehler = true;
        }

        $em->flush();

        return $fehler;
    }

    public function dozent0()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Herr');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Lucky');
        $dozent->setNachname('Luke');
        $dozent->setEmail('lucky@luke.com');

        return $dozent;
    }

    public function dozent1()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Frau');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Rot');
        $dozent->setNachname('Kaeppchen');
        $dozent->setEmail('rot@kaeppchen.com');

        //$this->dozentAssert($dozent);
        /*
        if($this->dozentAssert($dozent)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($dozent);
            $em->flush();
        }
        */
        return $dozent;
    }

    public function dozent2()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Frau');
        $dozent->setName('Andrea');
        $dozent->setNachname('Stasche');
        $dozent->setEmail('stasche@sprechart.com');

        //$this->dozentAssert($dozent);

        /*
        if($this->dozentAssert($dozent)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($dozent);
            $em->flush();
        }
        */

        return $dozent;
    }

    public function dozent3()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Herr');
        $dozent->setTitel('Dipl. Inf.');
        $dozent->setName('Max');
        $dozent->setNachname('Raabe');
        $dozent->setEmail('raabe@fh-bingne.de');
        //$this->dozentAssert($dozent);

        /* if($this->dozentAssert($dozent)){
             $em = $this->getDoctrine()->getManager();
             $em->persist($dozent);
             $em->flush();
         }*/

        return $dozent;
    }

    public function dozent4()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('foob');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Peter');
        $dozent->setNachname('Lustig');
        $dozent->setEmail('lustig@fh-bingen.de');
        //$this->dozentAssert($dozent);

        /*
        if($this->dozentAssert($dozent)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($dozent);
            $em->flush();
        }
        */

        return $dozent;
    }

    public function semesterAction()
    {
        $fehler = false;

        if (!$this->semesterAssert($this->sem0())) {
            $fehler = true;
        }
        if (!$this->semesterAssert($this->sem1())) {
            $fehler = true;
        }
        if (!$this->semesterAssert($this->sem2())) {
            $fehler = true;
        }
        if (!$this->semesterAssert($this->sem3())) {
            $fehler = true;
        }
        if (!$this->semesterAssert($this->sem4())) {
            $fehler = true;
        }

        return $fehler;
    }

    public function sem0()
    {
        $semester = new Semester();
        $semester->setSemester('WS14');
        //$this->semesterAssert($semester);

        /*
        if($this->semesterAssert($semester)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($semester);
            $em->flush();
        }
        */

        return $semester;
    }

    public function sem1()
    {
        $semester = new Semester();
        $semester->setSemester('SS15');
        //$this->semesterAssert($semester);

        /*
        if($this->semesterAssert($semester)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($semester);
            $em->flush();
        }
        */

        return $semester;
    }

    public function sem2()
    {
        $semester = new Semester();
        $semester->setSemester('WS15');
        //$this->semesterAssert($semester);

        /*
        if($this->semesterAssert($semester)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($semester);
            $em->flush();
        }
        */

        return $semester;
    }

    public function sem3()
    {
        $semester = new Semester();
        $semester->setSemester('SS16');
        //$this->semesterAssert($semester);

        /*
        if($this->semesterAssert($semester)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($semester);
            $em->flush();
        }
        */

        return $semester;
    }

    public function sem4()
    {
        $semester = new Semester();
        $semester->setSemester('S14');
        //$this->semesterAssert($semester);

        /*
        if($this->semesterAssert($semester)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($semester);
            $em->flush();
        }
        */

        return $semester;
    }

    public function semesterAssert($semester)
    {
        $validator = $this->get('validator');
        $errors = $validator->validate($semester);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new Response($errorsString);
        } else {
            //true = keine fehler;
            return true;
        }
    }

    public function dozentAssert($dozent)
    {
        $validator = $this->get('validator');
        $errors = $validator->validate($dozent);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new Response($errorsString);
        } else {
            //true = keine fehler;
            return true;
        }
    }
}
