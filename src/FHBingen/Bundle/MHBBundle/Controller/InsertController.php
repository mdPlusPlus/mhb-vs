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

class InsertController extends Controller {
	
	/**
	 * @Route("/input")
	 */
	public function assertAction() {
		/*
		 * TODO
		 * �berpr�fen ob bereits in der Datenbank, siehe findAllAction()
		 */
		$em = $this->getDoctrine ()->getManager ();



		
//		$dozentArr = $this->dozentCreate ();
//
//		foreach ( $dozentArr as $dozent ) {
//			$resultArr = $this->assertObject ( $dozent );
//			/**
//			 * $resultArr[0] = $isValid (boolean)
//			 * $resultArr[1] = $errorsString (string)
//			 */
//
//			if ($resultArr [0]) {
//				$em->persist ( $dozent );
//			} else {
//				return new Response ( /*( string ) $dozent . ': ' .*/ $resultArr [1] );
//			}
//
//		}
//
//        $em->flush ();

//		$semesterArr = $this->semesterCreate ();
//
//		foreach ( $semesterArr as $semester ) {
//			$resultArr = $this->assertObject ( $semester );
//			/**
//			 * $resultArr[0] = $isValid (boolean)
//			 * $resultArr[1] = $errorsString (string)
//			 */
//			if ($resultArr [0]) {
//				$em->persist ( $semester );
//                $em->flush ();
//			} else {
//				return new Response ( /*( string ) $semester . ': ' .*/ $resultArr [1] );
//				// $semester kann nicht ausgegeben werden, weil das feld nicht gesetzt wird, wenn die assert fehlschl�gt
//				// L�sung? ignorieren?
//			}
//		}

//        $stgangArr = $this->studiengangCreate();
//
//        foreach ( $stgangArr as $stgang ) {
//            $resultArr = $this->assertObject ( $stgang );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $stgang );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }

//        $vertArr = $this->vertiefungCreate();
//
//        foreach ( $vertArr as $vert ) {
//            $resultArr = $this->assertObject ( $vert );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $vert );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }

//        $fachArr = $this->fachCreate();
//
//        foreach ( $fachArr as $fach ) {
//            $resultArr = $this->assertObject ( $fach );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $fach );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }
//
//        $veranstaltungArr = $this->veranstaltungCreate();
//
//        foreach ( $veranstaltungArr as $veranstaltung ) {
//            $resultArr = $this->assertObject ( $veranstaltung );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $veranstaltung );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }

        $modulArr = $this->showAction(11);

        foreach($modulArr as $modul){
            return new Response($modul);
        }

//         $lehrArr = $this->lehrCreate();
//
//        foreach ( $lehrArr as $lehrende ) {
//            $resultArr = $this->assertObject ( $lehrende );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $lehrende );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }

//        $semesterplanArr = $this->semesterplanCreate();
//
//        foreach ( $semesterplanArr as $semesterplan ) {
//            $resultArr = $this->assertObject ( $semesterplan );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $semesterplan );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }

//        $kernfachArr = $this->kernfachCreate();
//
//        foreach ( $kernfachArr as $kernfach ) {
//            $resultArr = $this->assertObject ( $kernfach );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $kernfach );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }

//         $mhbArr = $this->mhbCreate();
//
//        foreach ( $mhbArr as $mhb ) {
//            $resultArr = $this->assertObject ( $mhb );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $mhb );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }

//        $stuplanArr = $this->stuplanCreate();
//
//        foreach ( $stuplanArr as $stuplan ) {
//            $resultArr = $this->assertObject ( $stuplan );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $stuplan );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }


//        $vorausArr = $this->voraussetzungCreate();
//
//        foreach ( $vorausArr as $voraus ) {
//            $resultArr = $this->assertObject ( $voraus );
//            /**
//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $voraus );
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }

//        $angebotArr = $this->angebotCreate();
//
//        foreach ( $angebotArr as $angebot ) {
//            $resultArr = $this->assertObject ( $angebot );

//             * $resultArr[0] = $isValid (boolean)
//             * $resultArr[1] = $errorsString (string)
//             */
//
//            if ($resultArr [0]) {
//                $em->persist ( $angebot);
//                $em->flush ();
//            } else {
//                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
//            }
//        }

		return new Response ( "Studiengang, Dozenten und Semester eingepflegt!" );
	}

	/**
	 * @Route("/findAll")
	 */
	public function findAllAction() {
		// NUR EIN TEST
		
		/**
		 * $obj = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product')->find($id);
		 *
		 * if (!$obj) {
		 * throw $this->createNotFoundException('No object found for id '.$id);
		 * }
		 */
		$table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
		$entryArr = $table->findAll ();
		
		$response = '<response>';
		foreach ( $entryArr as $entry ) {
			$response = $response . ' ' . ( string ) $entry;
		}
		$response = $response . '</response>';
		
		return new Response ( $response );
	}


	public function dozentCreate() {
		// legt die Dozenten-Objekte an und gibt sie als Array zur�ck
		$dozent0 = new Dozent ();
		$dozent0->setAnrede ( 'Herr' );
		$dozent0->setTitel ( 'Prof. Dr.' );
		$dozent0->setName ( 'Lucky' );
		$dozent0->setNachname ( 'Luke' );
		$dozent0->setEmail ( 'lucky@luke.com' );
		
//		$dozent1 = new Dozent ();
//		$dozent1->setAnrede ( 'Frau' );
//		$dozent1->setTitel ( 'Prof. Dr.' );
//		$dozent1->setName ( 'Rot' );
//		$dozent1->setNachname ( 'Kaeppchen' );
//		$dozent1->setEmail ( 'rot@kaeppchen.com' );
//
//		$dozent2 = new Dozent ();
//		$dozent2->setAnrede ( 'Frau' );
//		$dozent2->setName ( 'Andrea' );
//		$dozent2->setNachname ( 'Stasche' );
//		$dozent2->setEmail ( 'stasche@sprechart.com' );
//
//		$dozent3 = new Dozent ();
//		$dozent3->setAnrede ( 'Herr' );
//		$dozent3->setTitel ( 'Dipl. Inf.' );
//		$dozent3->setName ( 'Max' );
//		$dozent3->setNachname ( 'Raabe' );
//		$dozent3->setEmail ( 'raabe@fh-bingen.de' );
//
//		$dozent4 = new Dozent ();
//		$dozent4->setAnrede ( 'Herr' );
//		$dozent4->setTitel ( 'Prof. Dr.' );
//		$dozent4->setName ( 'Peter' );
//		$dozent4->setNachname ( 'Lustig' );
//		$dozent4->setEmail ( 'lustig@fh-bingen.de' );
		
		$dozentArr = array (
				$dozent0
//				$dozent1,
//				$dozent2,
//				$dozent3,
//				$dozent4
		);
		
		return $dozentArr;
	}


	public function semesterCreate() {
		// legt die Semester-Objekte an und gibt sie als Array zur�ck
		$semester0 = new Semester ();
		$semester0->setSemester ( 'WS14' );

		$semester1 = new Semester ();
		$semester1->setSemester ( 'SS15' );

		$semester2 = new Semester ();
		$semester2->setSemester ( 'WS15' );

		$semester3 = new Semester ();
		$semester3->setSemester ( 'SS16' );

		$semesterArr = array (
				$semester0,
				$semester1,
				$semester2,
				$semester3
		);

		return $semesterArr;
	}


    public function studiengangCreate() {
        // legt die Studiengang-Objekte an und gibt sie als Array zurueck
        $stgang0 =new Studiengang();
        $stgang0->setFachbereich(1);
        $stgang0->setGrad("Bachelor");
        $stgang0->setTitel("Bionformatik");
        $stgang0->setKuerzel("BIO");
        $stgang0->setBeschreibung("Bio-Computer science");

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
        $entry = $table->find(35);

        $stgang0->setSgl($entry);

//        $stgang1 =new Studiengang();
//        $stgang1->setFachbereich(1);
//        $stgang1->setGrad("Bachelor");
//        $stgang1->setTitel("Informatik");
//        $stgang1->setKuerzel("BINF");
//        $stgang1->setBeschreibung("Computer science");
//
//        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
//        $entry = $table->find(47);
//
//        $stgang1->setSgl($entry);
//
//
//        $stgang2 =new Studiengang();
//        $stgang2->setFachbereich(1);
//        $stgang2->setGrad("Bachelor");
//        $stgang2->setTitel("Mobile Computing");
//        $stgang2->setKuerzel("MOCO");
//        $stgang2->setBeschreibung("Handy science");
//
//        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
//        $entry = $table->find(48);
//
//        $stgang2->setSgl($entry);
//
//
//        $stgang3 =new Studiengang();
//        $stgang3->setFachbereich(2);
//        $stgang3->setGrad("Master");
//        $stgang3->setTitel("Informationssysteme");
//        $stgang3->setKuerzel("MINF");
//        $stgang3->setBeschreibung("Info science");
//
//        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
//        $entry = $table->find(49);
//
//        $stgang3->setSgl($entry);


        $stgangArr = array (
            $stgang0
//            $stgang1,
//            $stgang2,
//            $stgang3
        );

        return $stgangArr;
    }


    public function vertiefungCreate() {
        // legt die Vertiefungsrichtung-Objekte an und gibt sie als Array zurueck
        $vert0 = new Vertiefung();
        $vert0->setVertiefungsrichtung("PeterLustig");


        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Studiengang' );
        $entry = $table->find(34);

        $vert0->setStgang($entry);

        $vertArr = array (
            $vert0
//            $vert1,
//            $vert2,
//            $vert3
        );

        return $vertArr;
    }


    public function fachCreate() {
        // legt die Fachgebiets-Objekte an und gibt sie als Array zurueck
        $fach0 = new Fachgebiet();
        $fach0->setTitel("ABCD");


        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Studiengang' );
        $entry = $table->find(34);

        $fach0->setHat($entry);

        $fachArr = array (
            $fach0
        );

        return $fachArr;
    }

    public function veranstaltungCreate() {
        // legt die Veranstaltungs-Objekte an und gibt sie als Array zurueck
        $veranstaltung0 = new Veranstaltung();
        $veranstaltung0->setErstellungsdatum(new \DateTime());
        $veranstaltung0->setErstelltVon("HCR");
        $veranstaltung0->setVersionsnummerModul(1);
        $veranstaltung0->setStatus("freigegeben");
        $veranstaltung0->setKuerzel("ABC");
        $veranstaltung0->setName("Die Katze raucht den Schnee");
        $veranstaltung0->setNameEn("High Cat");
        $veranstaltung0->setHaeufigkeit("wechselnd");
        $veranstaltung0->setDauer(1);
        $veranstaltung0->setLehrveranstaltungen("Vorlesung mit Uebung");
        $veranstaltung0->setKontaktzeitVL(100);
        $veranstaltung0->setKontaktzeitSonstige(80);
        $veranstaltung0->setSelbststudium(180);
        $veranstaltung0->setGruppengroesse(50);
        $veranstaltung0->setLernergebnisse("<ul><li>Peter</li><li>Lustig</li></ul>");
        $veranstaltung0->setInhalte("ABC die Katze raucht den Schnee");
        $veranstaltung0->setPruefungsformen("schriftliche Klausur (90 Minuten)");
        $veranstaltung0->setSprache("englisch");
        $veranstaltung0->setLiteratur("sadpoig");
        $veranstaltung0->setLeistungspunkte(6);
        $veranstaltung0->setVoraussetzungLP("Bestehen der Klausur sowie Studienleistung");
        $veranstaltung0->setVoraussetzungInh("Schulmathematik");



        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
        $entry = $table->find(35);

        $veranstaltung0->setBeauftragter($entry);

        $veranstaltung1 = new Veranstaltung();
        $veranstaltung1->setErstellungsdatum(new \DateTime());
        $veranstaltung1->setErstelltVon("PCR");
        $veranstaltung1->setVersionsnummerModul(1);
        $veranstaltung1->setStatus("freigegeben");
        $veranstaltung1->setKuerzel("DEF");
        $veranstaltung1->setName("Blubbksadjökajsf");
        $veranstaltung1->setNameEn("Blaasdasfasdasdh");
        $veranstaltung1->setHaeufigkeit("Wintersemester");
        $veranstaltung1->setDauer(1);
        $veranstaltung1->setLehrveranstaltungen("Vorlesung mit Uebung");
        $veranstaltung1->setKontaktzeitVL(100);
        $veranstaltung1->setKontaktzeitSonstige(80);
        $veranstaltung1->setSelbststudium(180);
        $veranstaltung1->setGruppengroesse(50);
        $veranstaltung1->setLernergebnisse("Argh");
        $veranstaltung1->setInhalte("DEF");
        $veranstaltung1->setPruefungsformen("schriftliche Klausur (90 Minuten)");
        $veranstaltung1->setSprache("englisch");
        $veranstaltung1->setLiteratur("Buch");
        $veranstaltung1->setLeistungspunkte(6);
        $veranstaltung1->setVoraussetzungLP("Bestehen der Klausur sowie Studienleistung");
        $veranstaltung1->setVoraussetzungInh("Schulmathematik");



        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
        $entry = $table->find(35);

        $veranstaltung0->setBeauftragter($entry);

        $veranstaltungArr = array (
            $veranstaltung0,
            $veranstaltung1
        );

        return $veranstaltungArr;
    }

    public function lehrCreate() {
        // legt die Lehrende-Objekte an und gibt sie als Array zurueck
        $lehr0 = new Lehrende();

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
        $entry = $table->find(1);

        $lehr0->setmodule($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
        $entry = $table->find(35);

        $lehr0->setLehrender($entry);

        $fachArr = array (
            $lehr0
        );

        return $fachArr;
    }


    public function semesterplanCreate() {
        // legt die Semesterplan-Objekte an und gibt sie als Array zurueck
        $semplan0 = new Semesterplan();

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
        $entry = $table->find(1);

        $semplan0->setmodule($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Dozent' );
        $entry = $table->find(35);

        $semplan0->setLehrender($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Semester' );
        $entry = $table->find("WS15");

        $semplan0->setSemester($entry);

        $semplan0->setAnzahlUebungsgruppen(3);
        $semplan0->setSwsUebung(5);
        $semplan0->setSwsVorlesung(5);
        $semplan0->setAnzahlUebungsgruppen(5);
        $semplan0->setGroesseUebungsgruppen(10);



        $semplanArr = array (
            $semplan0
        );

        return $semplanArr;
    }

    public function kernfachCreate() {
        // legt die Kernfach-Objekte an und gibt sie als Array zurueck
        $kern0 = new Kernfach();

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
        $entry = $table->find(1);

        $kern0->setmodul($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Vertiefung' );
        $entry = $table->find(5);

        $kern0->setVertiefung($entry);

       $kernfachArr = array (
            $kern0
        );

        return $kernfachArr;
    }

    public function mhbCreate() {
        // legt die MHB-Objekte an und gibt sie als Array zurueck
        $mhb0 = new Modulhandbuch();

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Semester' );
        $entry = $table->find("WS15");

        $mhb0->setGueltigAb($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Studiengang' );
        $entry = $table->find(34);

        $mhb0->setGehoertZu($entry);

        $mhb0->setMHBVersionsnummer(1);
        $mhb0->setErstellungsdatum(new \DateTime());
        $mhb0->setBeschreibung("MHB ABC");

        $mhbArr = array (
            $mhb0
        );

        return $mhbArr;
    }

    public function stuplanCreate() {
        // legt die Studienplan-Objekte an und gibt sie als Array zurueck
        $stuplan0 = new Studienplan();

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Semester' );
        $entry = $table->find("WS15");

        $stuplan0->setStartSem($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Semester' );
        $entry = $table->find("SS15");

        $stuplan0->setRegSem($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
        $entry = $table->find(1);

        $stuplan0->setModul($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Studiengang' );
        $entry = $table->find(34);

        $stuplan0->setStudiengang($entry);


        $stuplanArr = array (
            $stuplan0
        );

        return $stuplanArr;
    }

    public function voraussetzungCreate() {
        // legt die Voraussetzung-Objekte an und gibt sie als Array zurueck
        $voraus0 = new Veranstaltung();

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
        $entry = $table->find(1);

        $voraus0->addModulVoraussetzung($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
        $entry = $table->find(3);

        $voraus0->addModulVoraussetzung($entry);


        $vorausArr = array (
            $voraus0
        );

        return $vorausArr;
    }


    public function angebotCreate() {
        // legt die Voraussetzung-Objekte an und gibt sie als Array zurueck
        $angebot0 = new Angebot();

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Veranstaltung' );
        $entry = $table->find(1);

        $angebot0->setModule($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Modulhandbuch' );
        $entry = $table->find(1);

        $angebot0->setMhb($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Fachgebiet' );
        $entry = $table->find(1);

        $angebot0->setFachgebiet($entry);

        $table = $this->getDoctrine ()->getRepository ( 'FHBingenMHBBundle:Studiengang' );
        $entry = $table->find(34);

        $angebot0->setStudiengang($entry);

        $angebot0->setAngebotsart("Pflichtfach");
        $angebot0->setCode("BINF-000");
        $angebot0->setAbweichenderTitelDE("Peter");
        $angebot0->setAbweichenderTitelEN("Lustig");


        $angebotArr = array (
            $angebot0
        );

        return $angebotArr;
    }


    public function showAction($id)
    {
        $modul = $this->getDoctrine()->getRepository('FHBingenMHBBundle:Veranstaltung')->find($id);

        if (!$modul) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $modulArr = array (
            $modul
        );

        return $modulArr;
    }

	public function assertObject($obj) {
		$isValid = true;
		$errorsString = 'no errors';
		
		$validator = $this->get ( 'validator' );
		$errors = $validator->validate ( $obj );
		
		if (count ( $errors ) > 0) {
			$isValid = false;
			$errorsString = ( string ) $errors;
		}
		
		$resultArr = array (
				$isValid,
				$errorsString 
		);
		
		return $resultArr;
	}
}
