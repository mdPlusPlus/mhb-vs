<?php

namespace FHBingen\Bundle\MHBBundle\Controller;


use FHBingen\Bundle\MHBBundle\Entity\Angebot;
use FHBingen\Bundle\MHBBundle\Entity\Fachgebiet;
use FHBingen\Bundle\MHBBundle\Entity\Kernfach;
use FHBingen\Bundle\MHBBundle\Entity\Lehrende;
use FHBingen\Bundle\MHBBundle\Entity\Modulhandbuch;
use FHBingen\Bundle\MHBBundle\Entity\Semesterplan;
use FHBingen\Bundle\MHBBundle\Entity\Studienplan;
use FHBingen\Bundle\MHBBundle\Entity\Veranstaltung;
use FHBingen\Bundle\MHBBundle\Entity\Vertiefung;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use FHBingen\Bundle\MHBBundle\Entity\Semester;
use FHBingen\Bundle\MHBBundle\Entity\Studiengang;

//TODO: Controller löschen
class InsertController extends Controller
{
    public function semesterCreate()
    {
        // legt die Semester-Objekte an und gibt sie als Array zur�ck
        //TODO: In Oberfäche integieren ?
        //alternativ:
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

    public function semesterplanCreate()
    {
        // legt die Semesterplan-Objekte an und gibt sie als Array zurueck
        $semplan0 = new Semesterplan();

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Veranstaltung');
        $entry = $table->find(1);

        $semplan0->setVeranstaltung($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Dozent');
        $entry = $table->find(35);

        $semplan0->setDozent($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Semester');
        $entry = $table->find("WS15");

        $semplan0->setSemester($entry);

        $semplan0->setAnzahlUebungsgruppen(3);
        $semplan0->setSwsUebungen(5);
        $semplan0->setSwsVorlesung(5);
        $semplan0->setAnzahlUebungsgruppen(5);
        $semplan0->setGroesseUebungsgruppen(10);


        $semplanArr = array(
            $semplan0
        );

        return $semplanArr;
    }

    public function kernfachCreate()
    {
        // legt die Kernfach-Objekte an und gibt sie als Array zurueck
        $kern0 = new Kernfach();

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Veranstaltung');
        $entry = $table->find(1);

        $kern0->setVeranstaltung($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Vertiefung');
        $entry = $table->find(5);

        $kern0->setVertiefung($entry);

        $kernfachArr = array(
            $kern0
        );

        return $kernfachArr;
    }

    public function mhbCreate()
    {
        // legt die MHB-Objekte an und gibt sie als Array zurueck
        $mhb0 = new Modulhandbuch();

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Semester');
        $entry = $table->find("WS15");

        $mhb0->setGueltigAb($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Studiengang');
        $entry = $table->find(34);

        $mhb0->setGehoertZu($entry);

        $mhb0->setVersionsnummer(1);
        $mhb0->setErstellungsdatum(new \DateTime());
        $mhb0->setBeschreibung("MHB ABC");

        $mhbArr = array(
            $mhb0
        );

        return $mhbArr;
    }

    public function stuplanCreate()
    {
        // legt die Studienplan-Objekte an und gibt sie als Array zurueck
        $stuplan0 = new Studienplan();

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Semester');
        $entry = $table->find("WS15");

        $stuplan0->setStartSemester($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Semester');
        $entry = $table->find("SS15");

        $stuplan0->setRegelSemester($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Veranstaltung');
        $entry = $table->find(1);

        $stuplan0->setVeranstaltung($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Studiengang');
        $entry = $table->find(34);

        $stuplan0->setStudiengang($entry);


        $stuplanArr = array(
            $stuplan0
        );

        return $stuplanArr;
    }

    public function voraussetzungCreate()
    {
        // legt die Voraussetzung-Objekte an und gibt sie als Array zurueck
        $voraus0 = new Veranstaltung();

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Veranstaltung');
        $entry = $table->find(1);

        $voraus0->addModulVoraussetzung($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Veranstaltung');
        $entry = $table->find(3);

        $voraus0->addModulVoraussetzung($entry);


        $vorausArr = array(
            $voraus0
        );

        return $vorausArr;
    }


    public function angebotCreate()
    {
        // legt die Voraussetzung-Objekte an und gibt sie als Array zurueck
        $angebot0 = new Angebot();

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Veranstaltung');
        $entry = $table->find(1);

        $angebot0->setVeranstaltung($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Modulhandbuch');
        $entry = $table->find(1);

        $angebot0->setMhb($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Fachgebiet');
        $entry = $table->find(1);

        $angebot0->setFachgebiet($entry);

        $table = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Studiengang');
        $entry = $table->find(34);

        $angebot0->setStudiengang($entry);

        $angebot0->setAngebotsart("Pflichtfach");
        $angebot0->setCode("BINF-000");
        $angebot0->setTitelDE("Peter");
        $angebot0->setTitelEN("Lustig");


        $angebotArr = array(
            $angebot0
        );

        return $angebotArr;
    }
}
