<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 14.01.2015
 * Time: 23:04
 */

namespace FHBingen\Bundle\MHBBundle\PHP;


use FHBingen\Bundle\MHBBundle\Entity\Dozent;

class SortFunctions {

    public static function modulBeschreibungSort(ModulBeschreibung $descA, ModulBeschreibung $descB)
    {
        $a = $descA->getAngebot()->getCode();
        $b = $descB->getAngebot()->getCode();

        if ($a == $b) {
            return 0;
        }

        return ($a < $b) ? -1 : 1;
    }

    public static function dozentSort(Dozent $dozA, Dozent $dozB)
    {
        $a = $dozA->getNachname();
        $b = $dozB->getNachname();

        if ($a == $b) {
            return 0;
        }

        return ($a < $b) ? -1 : 1;
    }
}