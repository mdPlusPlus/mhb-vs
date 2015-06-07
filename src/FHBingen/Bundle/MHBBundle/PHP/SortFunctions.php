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
use FHBingen\Bundle\MHBBundle\Entity\Semester;
use FHBingen\Bundle\MHBBundle\Entity\Studienplan;
use FHBingen\Bundle\MHBBundle\Entity\Veranstaltung;

/**
 * Class SortFunctions
 *
 * @package FHBingen\Bundle\MHBBundle\PHP
 */
class SortFunctions
{

    /**
     * @param Angebot $angebotA
     * @param Angebot $angebotB
     *
     * @return int
     */
    public static function angebotSort(Angebot $angebotA, Angebot $angebotB)
    {
        $a = null;
        if ($angebotA->getAbweichenderNameDE() != null) {
            $a = $angebotA->getAbweichenderNameDE();
        } else {
            $a = $angebotA->getVeranstaltung()->getName();
        }

        $b = null;
        if ($angebotB->getAbweichenderNameDE() != null) {
            $b = $angebotB->getAbweichenderNameDE();
        } else {
            $b = $angebotB->getVeranstaltung()->getName();
        }

        if ($a == $b) {
            return 0;
        }

        return ($a < $b) ? -1 : 1;
    }

    /**
     * @param Dozent $dozA
     * @param Dozent $dozB
     *
     * @return int
     */
    public static function dozentSort(Dozent $dozA, Dozent $dozB)
    {
        $a = $dozA->getNachname();
        $b = $dozB->getNachname();

        if ($a == $b) {
            return 0;
        }

        return ($a < $b) ? -1 : 1;
    }

    /**
     * @param ModulBeschreibung $descA
     * @param ModulBeschreibung $descB
     *
     * @return int
     */
    public static function modulBeschreibungSort(ModulBeschreibung $descA, ModulBeschreibung $descB)
    {
        $isWahlA = ($descA->getAngebot()->getAngebotsart() == 'Wahlpflichtfach') ? true : false;
        $isWahlB = ($descB->getAngebot()->getAngebotsart() == 'Wahlpflichtfach') ? true : false;

        if ($isWahlA == $isWahlB) {
            $fgA = $descA->getAngebot()->getFachgebiet();
            $fgB = $descB->getAngebot()->getFachgebiet();

            if (
                (is_null($fgA) && is_null($fgB)) ||
                ( (!is_null($fgA) && !is_null($fgB) && ($fgA->getTitel() == $fgB->getTitel())) )
            ) {
                //return 0;
                $codeA = $descA->getAngebot()->getCode();
                $codeB = $descB->getAngebot()->getCode();

                if ($codeA == $codeB) {
                    return 0;
                }

                return ($codeA < $codeB) ? -1 : 1;
            }

            //mit Fachgebiet vor ohne Fachgebiet
            if (is_null($fgA)) {
                return 1;   //B vor A
            }
            if (is_null($fgB)) {
                return -1;  //A vor B
            }

            //Fachgebiete werden alphabetisch sortiert
            return ($fgA->getTitel() < $fgB->getTitel()) ? -1 : 1;
        }

        //Pflichtfächer vor Wahlpflichtfächern
        return (!$isWahlA) ? -1 : 1;
    }

    /**
     * @param Veranstaltung $modulA
     * @param Veranstaltung $modulB
     *
     * @return int
     */
    public static function veranstaltungSort(Veranstaltung $modulA, Veranstaltung $modulB)
    {
        $a = $modulA->getName();
        $b = $modulB->getName();

        if ($a == $b) {
            return 0;
        }

        return ($a < $b) ? -1 : 1;
    }

    /**
     * @param Semester $sA
     * @param Semester $sB
     *
     * @return int
     */
    public static function semesterSort(Semester $sA, Semester $sB)
    {
        $jahrA = substr($sA->getSemester(), -2);
        $jahrB = substr($sB->getSemester(), -2);

        if ($jahrA == $jahrB) {
            if ($sA->getSemester() == $sB->getSemester()) {
                return 0;
            }

            return ($sA->getSemester() < $sB->getSemester()) ? -1 : 1;
        }

        return ($jahrA < $jahrB) ? -1 : 1;
    }
}