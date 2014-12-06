<?php

namespace FHBingen\Bundle\MHBBundle\Controller;


use FHBingen\Bundle\MHBBundle\Entity\Fachgebiet;
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
		
		$dozentArr = $this->dozentCreate ();
//		$semesterArr = $this->semesterCreate ();

		
		foreach ( $dozentArr as $dozent ) {
			$resultArr = $this->assertObject ( $dozent );
			/**
			 * $resultArr[0] = $isValid (boolean)
			 * $resultArr[1] = $errorsString (string)
			 */
			
			if ($resultArr [0]) {
				$em->persist ( $dozent );
			} else {
				return new Response ( /*( string ) $dozent . ': ' .*/ $resultArr [1] );
			}

		}

        $em->flush ();
		
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

        $stgangArr = $this->studiengangCreate();

        foreach ( $stgangArr as $stgang ) {
            $resultArr = $this->assertObject ( $stgang );
            /**
             * $resultArr[0] = $isValid (boolean)
             * $resultArr[1] = $errorsString (string)
             */

            if ($resultArr [0]) {
                $em->persist ( $stgang );
                $em->flush ();
            } else {
                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
            }
        }

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

        $fachArr = $this->fachCreate();

        foreach ( $fachArr as $fach ) {
            $resultArr = $this->assertObject ( $fach );
            /**
             * $resultArr[0] = $isValid (boolean)
             * $resultArr[1] = $errorsString (string)
             */

            if ($resultArr [0]) {
                $em->persist ( $fach );
                $em->flush ();
            } else {
                return new Response ( /*( string ) $stgang . ': ' .*/ $resultArr [1] );
            }
        }

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
        $entry = $table->find(15);

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
        $entry = $table->find(15);

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
        $entry = $table->find(15);

        $fach0->setHat($entry);

        $fachArr = array (
            $fach0
//            $fach1,
//            $fach2,
//            $fach3
        );

        return $fachArr;
    }

	public function assertObject($obj) {
		$isValid;
		$errorsString = 'no errors';
		
		$validator = $this->get ( 'validator' );
		$errors = $validator->validate ( $obj );
		
		if (count ( $errors ) > 0) {
			$isValid = false;
			$errorsString = ( string ) $errors;
		} else {
			$isValid = true;
		}
		
		$resultArr = array (
				$isValid,
				$errorsString 
		);
		
		return $resultArr;
	}
}
