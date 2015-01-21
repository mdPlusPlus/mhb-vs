<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 14.01.2015
 * Time: 23:04
 */

namespace FHBingen\Bundle\MHBBundle\PHP;


use FHBingen\Bundle\MHBBundle\Entity\Angebot;
use FHBingen\Bundle\MHBBundle\Entity\Dozent;
use FHBingen\Bundle\MHBBundle\Entity\Studienplan;

class SortFunctions {

    public static function angebotSort(Angebot $angebotA, Angebot $angebotB)
    {
        $a = null;
        if($angebotA->getAbweichenderNameDE() != null){
            $a = $angebotA->getAbweichenderNameDE();
        }else{
            $a = $angebotA->getVeranstaltung()->getName();
        }

        $b = null;
        if($angebotB->getAbweichenderNameDE() != null){
            $b = $angebotB->getAbweichenderNameDE();
        }else{
            $b = $angebotB->getVeranstaltung()->getName();
        }

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

    public static function modulBeschreibungSort(ModulBeschreibung $descA, ModulBeschreibung $descB)
    {
        $fgA = $descA->getAngebot()->getFachgebiet();
        $fgB = $descB->getAngebot()->getFachgebiet();

        if ($fgA == $fgB) {

            //return 0;
            $codeA = $descA->getAngebot()->getCode();
            $codeB = $descB->getAngebot()->getCode();

            if ($codeA == $codeB) {
               return 0;
            }

            return ($codeA < $codeB) ? -1 : 1;
        }

        return ($fgA < $fgB) ? -1 : 1;
    }


    public static function studienplanSort(Studienplan $planA, Studienplan $planB)
    {
        $a = $planA->getStartsemester();
        $b = $planB->getStartsemester();

        if ($a == $b) {
            return 0;
        }

        return ($a < $b) ? -1 : 1;
    }
}