<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 26.11.2014
 * Time: 11:26
 */

namespace Acme\DemoBundle\Controller;

//use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class RandomController extends Controller{


    public function indexAction($limit){
        $number = rand(1,$limit);

        return $this->render(
            'AcmeDemoBundle:Random:index.html.twig',
            array('number' => $number)
        );
    }
} 