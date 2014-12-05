<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use FHBingen\Bundle\MHBBundle\Entity\Semester;

class InsertController extends Controller {
	
	/**
	 * @Route("/input")
	 */
	public function assertAction() {
		$em = $this->getDoctrine ()->getManager ();
		
		$dozentArr = $this->dozentCreate ();
		$semesterArr = $this->semesterCreate ();
		
		foreach ( $dozentArr as $dozent ) {
			$resultArr = $this->assertObject ( $dozent );
			/*
			 * $resultArr[0] = $isValid (boolean)
			 * $resultArr[1] = $errorsString (string)
			 */
			if ($resultArr [0]) {
				$em->persist ( $dozent );
			} else {
				return new Response ( $resultArr [1] );
			}
		}
		
		foreach ( $semesterArr as $semester ) {
			$resultArr = $this->assertObject ( $semester );
			/*
			 * $resultArr[0] = $isValid (boolean)
			 * $resultArr[1] = $errorsString (string)
			 */
			if ($this->assertObject ( $semester )) {
				$em->persist ( $semester );
			} else {
				return new Response ( $resultArr [1] );
			}
		}
		
		$em->flush ();
		
		return new Response ( "Halt' doch's Maul!" );
	}
	public function dozentCreate() {
		// legt die Dozenten-Objekte an und gibt sie als Array zurück
		$dozent0 = new Dozent ();
		$dozent0->setAnrede ( 'Herr' );
		$dozent0->setTitel ( 'Prof. Dr.' );
		$dozent0->setName ( 'Lucky' );
		$dozent0->setNachname ( 'Luke' );
		$dozent0->setEmail ( 'lucky@luke.com' );
		
		$dozent1 = new Dozent ();
		$dozent1->setAnrede ( 'Frau' );
		$dozent1->setTitel ( 'Prof. Dr.' );
		$dozent1->setName ( 'Rot' );
		$dozent1->setNachname ( 'Kaeppchen' );
		$dozent1->setEmail ( 'rot@kaeppchen.com' );
		
		$dozent2 = new Dozent ();
		$dozent2->setAnrede ( 'Frau' );
		$dozent2->setName ( 'Andrea' );
		$dozent2->setNachname ( 'Stasche' );
		$dozent2->setEmail ( 'stasche@sprechart.com' );
		
		$dozent3 = new Dozent ();
		$dozent3->setAnrede ( 'Herr' );
		$dozent3->setTitel ( 'Dipl. Inf.' );
		$dozent3->setName ( 'Max' );
		$dozent3->setNachname ( 'Raabe' );
		$dozent3->setEmail ( 'raabe@fh-bingen.de' );
		
		$dozent4 = new Dozent ();
		$dozent4->setAnrede ( 'foob' );
		$dozent4->setTitel ( 'Prof. Dr.' );
		$dozent4->setName ( 'Peter' );
		$dozent4->setNachname ( 'Lustig' );
		$dozent4->setEmail ( 'lustig@fh-bingen.de' );
		
		$dozentArr = array (
				$dozent0,
				$dozent1,
				$dozent2,
				$dozent3,
				$dozent4 
		);
		
		return $dozentArr;
	}
	public function semesterCreate() {
		// legt die Semester-Objekte an und gibt sie als Array zurück
		$semester0 = new Semester ();
		$semester0->setSemester ( 'WS14' );
		
		$semester1 = new Semester ();
		$semester1->setSemester ( 'SS15' );
		
		$semester2 = new Semester ();
		$semester2->setSemester ( 'WS15' );
		
		$semester3 = new Semester ();
		$semester3->setSemester ( 'SS16' );
		
		$semester4 = new Semester ();
		$semester4->setSemester ( 'S14' );
		
		$semesterArr = array (
				$semester0,
				$semester1,
				$semester2,
				$semester3,
				$semester4 
		);
		
		return $semesterArr;
	}
	public function assertObject($obj) {
		$isValid;
		$errorsString = 'no errors';
		
		$validator = $this->get ( 'validator' );
		$errors = $validator->validate ( $obj );
		
		if (count ( $errors ) > 0) {
			$isValid = false;
			$errorsString = ( string ) $errors;	
		}
		else{
			$isValid = true;
		}
		
		$resultArr = array (
				$isValid,
				$errorsString 
		);
		
		return $resultArr;
	}
}
