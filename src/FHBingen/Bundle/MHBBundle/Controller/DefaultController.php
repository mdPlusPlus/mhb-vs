<?php

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;



class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Route("/index")
     */
    public function indexAction()
    {
        //TODO: wenn bereits eingeloggt auf andere Seite verweisen
        //'login' ist hier route alias von /login
        return $this->redirect($this->generateUrl('login'));
    }

    /**
     * Encoding Test
     * @Route("/encode")
     *
     */
    public function encodeAction(){
//        $encoder=new JsonEncoder();
//        $em = $this->getDoctrine()->getManager();
//        $data= $em->getRepository()
//        $encoder->encode(, 'json');
    }


}
