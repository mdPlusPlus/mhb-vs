<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use FHBingen\Bundle\MHBBundle\Entity\Angebot;
use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
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

    public function voraussetzungAction()
    {
        $em = $this->getDoctrine()->getManager();

        $test = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=>156));

//        $mv = new Modulvoraussetzung();
//        $mv->setModul($test);
//        $mv->setVoraussetzung($em->getRepository('FHBingenMHBBundle:Veranstaltung')->findOneBy(array('Modul_ID'=>9)));
//        $test->addForderung($mv);
        $result ="";
//
//       $em->persist($mv);
//       $em->persist($test);
//        $em->flush();

        $entries = $test->getGrundmodul();

        foreach ($entries as $entry) {
            $result= $result."+++".$entry;
        }

        return new Response($result);
    }

    public function convert()
    {
        $em = $this->getDoctrine()->getManager();
        $veranstaltungen = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();

        $response = '';

        foreach ($veranstaltungen as $v) {
            $lp = $v->getVoraussetzungLP();
            $lp = str_replace('"P', '"bestandene P', $lp);
            $lp = str_replace('"S', '"bestandene S', $lp);

            $v->setVoraussetzungLP($lp);
            $em->persist($v);


            $response = $response . $lp . '<br />';

        }
        $em->flush();

        return new Response($response);
    }

    public function tmpFileTest()
    {
        $pathToCover = 'test.file';

        file_put_contents($pathToCover, 'stuff');

        unlink($pathToCover);

        return new Response($pathToCover);

    }

    public function autoConvertAction()
    {
        $em = $this->getDoctrine()->getManager();

        $veranstaltungen = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();
        $veranstaltungenHistory = $em->getRepository('FHBingenMHBBundle:VeranstaltungHistory')->findAll();

        foreach ($veranstaltungen as $veranstaltung) {
            $veranstaltung->setAutor($em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => 8))); //schmidt
            $em->persist($veranstaltung);
        }
        foreach ($veranstaltungenHistory as $veranstaltung) {
            $veranstaltung->setAutor($em->getRepository('FHBingenMHBBundle:Dozent')->findOneBy(array('Dozenten_ID' => 8))); //schmidt
            $em->persist($veranstaltung);
        }

        $em->flush();

        return new Response('Erfolg');
    }

    public function dozToString(Dozent $dozent)
    {
        return (string) $dozent;
    }


    //TODO: 1. alte Fachgebiete löschen
    //TODO: 2. bleibende Fachgebiete umbenennen
    //TODO: 3. Angboterstellung von Wahlpflichtfächern: String-Überprüfen deaktivieren
    //TODO: 4. Abfrage einbauen, dass bei Pflichtfächern ein Fachgebiet vergeben werden muss



    /**
     * @Route("/convert/B-IN")
     */
    public function convertFachgebieteInformatik()
    {
        //37 -> null
        $em = $this->getDoctrine()->getManager();
        $wahlpflichfaecher = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('fachgebiet' => 37));

        $response = '';
        foreach ($wahlpflichfaecher as $fach) {
            $fach->setFachgebiet(null);
            $response = $response . $fach . '<br />';
        }

        $em->flush();

        return new Response($response);
    }

    /**
     * @Route("/convert/B-BI")
     */
    public function convertFachgebieteBioInformatik()
    {
        $em = $this->getDoctrine()->getManager();
        $response = '';

        //29 -> 26
        $wpBiotechnik = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('fachgebiet' => 29));
        $biotechnik = $em->getRepository('FHBingenMHBBundle:Fachgebiet')->find(26);

        foreach ($wpBiotechnik as $fach) {
            $fach->setFachgebiet($biotechnik);
            $response = $response . $fach . '<br />';
        }

        //30 -> 25
        $wpInformatik = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('fachgebiet' => 30));
        $informatik = $em->getRepository('FHBingenMHBBundle:Fachgebiet')->find(25);

        foreach ($wpInformatik as $fach) {
            $fach->setFachgebiet($informatik);
            $response = $response . $fach . '<br />';
        }

        //31 -> 27
        $wpBioinformatik = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('fachgebiet' => 31));
        $bioinformatik = $em->getRepository('FHBingenMHBBundle:Fachgebiet')->find(27);

        foreach ($wpBioinformatik as $fach) {
            $fach->setFachgebiet($bioinformatik);
            $response = $response . $fach . '<br />';
        }

        $em->flush();

        return new Response($response);
    }

    /**
     * @Route("/convert/B-MC")
     */
    public function convertFachgebieteMoCo()
    {
        //44 -> null
        $em = $this->getDoctrine()->getManager();
        $wahlpflichfaecher = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('fachgebiet' => 44));

        $response = '';
        foreach ($wahlpflichfaecher as $fach) {
            $fach->setFachgebiet(null);
            $response = $response . $fach . '<br />';
        }

        $em->flush();

        return new Response($response);
    }

    /**
     * @Route("/convert/M-IS")
     */
    public function convertFachgebieteInfSys()
    {
        $em = $this->getDoctrine()->getManager();
        $response = '';

        //48->53
        $wpInformatik = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('fachgebiet' => 48));
        $informatik = $em->getRepository('FHBingenMHBBundle:Fachgebiet')->find(53);

        foreach ($wpInformatik as $fach) {
            $fach->setFachgebiet($informatik);
            $response = $response . $fach . '<br />';
        }

        $em->flush();

        //49 umbenennen
        //48 löschen

        return new Response($response);
    }
}
