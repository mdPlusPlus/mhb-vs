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
use Symfony\Component\HttpFoundation\Response;

class InsertController extends Controller{


    /**
     * @Route("/sql/dozent")
     */
    public function createAction()
    {
        $dozent = new Dozent();
        $dozent->setAnrede('Herr');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Lucky');
        $dozent->setNachname('Luke');
        $dozent->setEmail('lucky@luke.com');


        $em = $this->getDoctrine()->getManager();
        $em->persist($dozent);
        $em->flush();

        return new Response('Created DozentenID '.$dozent->getDozentenID());

        $dozent->setAnrede('Frau');
        $dozent->setTitel('Prof. Dr.');
        $dozent->setName('Rot');
        $dozent->setNachname('Kaeppchen');
        $dozent->setEmail('rot@kaeppchen.com');


        $em->persist($dozent);
        $em->flush();

        return new Response('Created DozentenID '.$dozent->getDozentenID());
    }

}
