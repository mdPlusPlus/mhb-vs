<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;



class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Route("/index")
     */
    public function indexAction()
    {
        /*
         * TODO:
         * wenn bereits eingeloggt auf andere Seite verweisen
         * nicht so einfach, weil nicht hinter /restricted/ und damit firewall kontext nicht verfügbar
         */
        //'login' ist hier route alias von /login
        return $this->redirect($this->generateUrl('login'));
    }

    /**
     * Initialerstellung von Semestern
     */
    public function semesterCreate()
    {
        //legt die Semester-Objekte an und gibt sie als Array zurück
        //TODO: In Oberfäche integieren ?
        $semester0 = new Semester();
        $semester0->setSemester('WS14');

        $semester1 = new Semester();
        $semester1->setSemester('SS15');

        $semester2 = new Semester();
        $semester2->setSemester('WS15');

        $semester3 = new Semester();
        $semester3->setSemester('SS16');

        $semesterArr = array(
            $semester0,
            $semester1,
            $semester2,
            $semester3
        );

        return $semesterArr;
    }

    /**
     * Initialerstellung von Userrollen
     *
     * @Route("/create/roles")
     */
    public function createRolesAction()
    {
        //TODO: In Oberfläche integrieren (AdminController ?)
        $roleDozent = new Role();
        $roleDozent->setName("ROLE_DOZENT");
        $roleDozent->setRole("ROLE_DOZENT");

        $roleSgl = new Role();
        $roleSgl->setName("ROLE_SGL");
        $roleSgl->setRole("ROLE_SGL");

        $validator = $this->get('validator');

        $errors = $validator->validate($roleDozent);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        $errors = $validator->validate($roleSgl);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($roleDozent);
        $em->persist($roleSgl);
        $em->flush();

        return new Response("Rollen angelegt");
    }

    /**
     * @Route("/create/vor")
     */
    public function voraussetzungAction()
    {
        $em = $this->getDoctrine()->getManager();

        $test = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=>153));

        $test->addModulX($em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=>1)));
        $test->addModulX($em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=>4)));
        $test->addModulX($em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=>3)));

        $em->persist($test);
        $em->flush();

        $entries = $test->getModulX();

        $result ="";

        foreach ($entries as $entry) {
            $result= $result."+++".$entry;
        }

        return new Response($result);
    }


    /**
     * Nur ein Test
     *
     * @Route("/bin")
     */
    public function binAction()
    {
        $this->get('knp_snappy.pdf')->getInternalGenerator()->setBinary('"C:\\Program Files\\wkhtmltopdf\\bin\\wkhtmltopdf.exe"');
        $string = $this->get('knp_snappy.pdf')->getInternalGenerator()->getBinary();

        return new Response($string);
    }
}
