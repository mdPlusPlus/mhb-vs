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
        //'login' ist hier route alias von /login
        return $this->redirect($this->generateUrl('login'));

        //TODO: wenn bereits eingeloggt auf andere Seite verweisen
    }

    /**
     * PDF-Export Test
     * @Route("/pdf")
     * @Template("FHBingenMHBBundle:PDF-Test:modulhandbuch.html.twig")
     */
    public function pdfAction(){
        $em = $this->getDoctrine()->getManager();
        $module = $em->getRepository('FHBingenMHBBundle:Veranstaltung')->findAll();  //->findOneBy(array('Modul_ID' =>3));
        $angebote = $em->getRepository('FHBingenMHBBundle:Angebot')->findBy(array('mhb' =>3));

        $moduleZuMHB = array();
        foreach ($angebote as $valueA) {
            foreach ($module as $valueM) {
                if ($valueA->getVeranstaltung()->getModulID() == $valueM->getModulID()) {
                    $moduleZuMHB[] = $valueM;
                }
            }
        }

        return array('moduleZuMHB' => $moduleZuMHB,'angebote' => $angebote);
    }

    /**
     * ChoiceList Test
     * @Route("/choiceListDemo")
     * @Template("")
     */
    public function choiceListDemoAction(){

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
