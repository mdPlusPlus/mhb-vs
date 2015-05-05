<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 13.01.2015
 * Time: 14:37
 */

namespace FHBingen\Bundle\MHBBundle\PHP;


use FHBingen\Bundle\MHBBundle\Entity\Angebot;


/**
 * Class ModulBeschreibung
 *
 * wird als Container für das Generieren des Modulhandbuch-PDF verwendet
 *
 * @package FHBingen\Bundle\MHBBundle\PHP
 */
class ModulBeschreibung
{

    private $angebot;
    private $fremdeStudiengaenge;
    private $voraussetzungen;
    private $pruefungsformen;
    private $lehrveranstaltungen;
    private $voraussetzungenLP;

    /**
     * @return mixed
     */
    public function getAngebot()
    {
        return $this->angebot;
    }

    /**
     * @param Angebot $angebot
     */
    public function setAngebot(Angebot $angebot)
    {
        $this->angebot = $angebot;
    }

    /**
     * @return array
     */
    public function getFremdeStudiengaenge()
    {
        return $this->fremdeStudiengaenge;
    }

    /**
     * @param array $fremdeStudiengaenge
     */
    public function setFremdeStudiengaenge(array $fremdeStudiengaenge)
    {
        $this->fremdeStudiengaenge = $fremdeStudiengaenge;
    }


    /**
     * @return mixed
     */
    public function getVoraussetzungen()
    {
        return $this->voraussetzungen;
    }

    /**
     * @param mixed $grundmodul
     */
    public function setVoraussetzungen($grundmodul)
    {
        $this->voraussetzungen = $grundmodul;
    }

    /**
     * @return mixed
     */
    public function getPruefungsformen()
    {
        return $this->pruefungsformen;
    }

    /**
     * @param mixed $pruefungsformen
     */
    public function setPruefungsformen($pruefungsformen)
    {
        $this->pruefungsformen = $pruefungsformen;
    }

    /**
     * @return mixed
     */
    public function getLehrveranstaltungen()
    {
        return $this->lehrveranstaltungen;
    }

    /**
     * @param mixed $lehrveranstaltungen
     */
    public function setLehrveranstaltungen($lehrveranstaltungen)
    {
        $this->lehrveranstaltungen = $lehrveranstaltungen;
    }

    /**
     * @return mixed
     */
    public function getVoraussetzungenLP()
    {
        return $this->voraussetzungenLP;
    }

    /**
     * @param mixed $voraussetzungenLP
     */
    public function setVoraussetzungenLP($voraussetzungenLP)
    {
        $this->voraussetzungenLP = $voraussetzungenLP;
    }


}