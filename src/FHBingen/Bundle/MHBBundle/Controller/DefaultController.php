<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use FHBingen\Bundle\MHBBundle\Entity\Role;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class DefaultController
 *
 * @package FHBingen\Bundle\MHBBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Route("/index")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
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
     * Benutzerdokumentation-Download
     *
     * @return BinaryFileResponse
     *
     * @Route("/BenutzerhilfenDownload", name="DokuDownload")
     */
    public function dokuDownloadAction()
    {
        $downloadPath = 'Dokumentation' . DIRECTORY_SEPARATOR . 'Benutzerdokumentation.pdf';

        //return new BinaryFileResponse($pdfPath);
        return new BinaryFileResponse(
            $downloadPath,
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="Benutzerdokumentation.pdf"',
            )
        );
    }

    //TODO: Semestererstellung (automatisch?)

    /**
     * Initialerstellung von Userrollen
     *
     * @return Response
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
}
