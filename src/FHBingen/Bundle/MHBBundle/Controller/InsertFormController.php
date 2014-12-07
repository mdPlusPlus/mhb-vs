<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 07.12.2014
 * Time: 14:23
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FHBingen\Bundle\MHBBundle\Entity\Person;
use FHBingen\Bundle\MHBBundle\Form\PersonType;
use Symfony\Component\HttpFoundation\Response;

class InsertFormController extends Controller
{
    /**
     * @Route("/form")
     */

    public function formAction()
    {
        $person = new Person();
        $form = $this->createForm(new PersonType(), $person);

        $request = $this->get('request');
        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                return new Response('success');
            }
            return $this->render('FHBingenMHBBundle:InsertForm:form.html.twig', array('form'=>$form->createView()));
        }

        return $this->render('FHBingenMHBBundle:InsertForm:form.html.twig', array('form'=>$form->createView()));
    }
}