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
    private $studienplaene;
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
    public function getStudienplaene()
    {
        return $this->studienplaene;
    }

    /**
     * @param array $studienplaene
     */
    public function setStudienplaene(array $studienplaene)
    {
        $this->studienplaene = $studienplaene;
    }

    /**
     * @return mixed
     */
    public function getVoraussetzungen()
    {
        return $this->voraussetzungen;
    }

    /**
     * @param array $voraussetzungen
     */
    public function setVoraussetzungen(array $voraussetzungen)
    {
        $this->voraussetzungen = $voraussetzungen;
    }

    /**
     * @return mixed
     */
    public function getPruefungsformen()
    {
        return $this->pruefungsformen;
    }

    /**
     * @param array $pruefungsformen
     */
    public function setPruefungsformen(array $pruefungsformen)
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
     * @param array $lehrveranstaltungen
     */
    public function setLehrveranstaltungen(array $lehrveranstaltungen)
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
     * @param array $voraussetzungenLP
     */
    public function setVoraussetzungenLP(array $voraussetzungenLP)
    {
        $this->voraussetzungenLP = $voraussetzungenLP;
    }


}