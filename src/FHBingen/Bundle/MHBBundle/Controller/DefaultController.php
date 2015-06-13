<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use FHBingen\Bundle\MHBBundle\Entity\Modulcodezuweisung;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;


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

    //[DONE] 0. B-IN-IVxx und B-IN-V zu "Informatik Vertiefung" ändern
    //[DONE] 1. alte Fachgebiete löschen
    //[DONE] 2. bleibende Fachgebiete umbenennen
    //[DONE] 3. Angboterstellung von Wahlpflichtfächern: String-Überprüfen deaktivieren
    //[DONE] 4. Abfrage einbauen, dass bei Pflichtfächern ein Fachgebiet vergeben werden muss
    //[DONE] 5. Unterscheidung in MHB neu machen
    //[DONE] 6. Modulcode-Erstellung: Wenn kein Fachgebiet, dann WP als Code bei Wahlpflicht
    //TODO: 7. Kürzel für Fachgebiete überprüfen/vervollständigen
    //TODO: 8. Kürzel für Fachgebiete nullable=false
    //TODO: 9. automatische Modulcodevergabe



    public function modulcodeCopyAction()
    {
        $em = $this->getDoctrine()->getManager();
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findAll();

        foreach ($angebote as $angebot) {
            if (!is_null($angebot->getCode())) {
                $code = new Modulcodezuweisung();
                $code->setStudiengang($angebot->getStudiengang());
                $code->setFachgebiet($angebot->getFachgebiet());
                $code->setVeranstaltung($angebot->getVeranstaltung());
                $code->setCode($angebot->getCode());
                $em->persist($code);
            }
        }

        $em->flush();

        return new Response('!');
    }
}
