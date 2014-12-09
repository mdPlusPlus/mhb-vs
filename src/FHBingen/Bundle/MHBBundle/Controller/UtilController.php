<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 09.12.2014
 * Time: 17:46
 */

namespace FHBingen\Bundle\MHBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UtilController extends Controller
{
    //TODO wie ansprechen?
    public function assertObject($obj)
    {
        $isValid = true;
        $errorsString = 'no errors';

        $validator = $this->get('validator');
        $errors = $validator->validate($obj);

        if (count($errors) > 0) {
            $isValid = false;
            $errorsString = (string) $errors;
        }

        $resultArr = array(
            $isValid,
            $errorsString
        );

        return $resultArr;
    }
} 