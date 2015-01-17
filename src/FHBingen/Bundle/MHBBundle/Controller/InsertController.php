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

//TODO: Controller löschen?
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
}
