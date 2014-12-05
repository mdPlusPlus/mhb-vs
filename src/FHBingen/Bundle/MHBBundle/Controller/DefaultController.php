<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
 * @Route("/test123/{name}")
 * @Template("FHBingenMHBBundle:SGL:main.html.twig")
 */
    public function indexAction($name)
    {
        return array('name' => $name,'pageTitle' => 'STARTSEITE');
    }



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

        return new Response('Created product id '.$dozent->getDozentenID());
    }
}
