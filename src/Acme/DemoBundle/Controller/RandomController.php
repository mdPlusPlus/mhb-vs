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

class RandomController extends Controller{
//    public function indexAction($limit){
//        return new Response('<html><body>Number: '.rand(1,$limit).'</body></html>');
//    }
    public function indexAction($limit){
        $number = rand(1,$limit);

        return $this->render(
            'AcmeDemoBundle:Random:index.html.twig',
            array('number' => $number)
        );
    }
} 