<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 13.01.2015
 * Time: 14:37
 */

namespace FHBingen\Bundle\MHBBundle\PHP;


use FHBingen\Bundle\MHBBundle\Entity\Angebot;

class ModulBeschreibung {

    private $angebot;
    private $fremdeStudiengaenge;
    private $studienplaene;
    private $lehrende;
    private $voraussetzungen;
    private $pruefungsformen;
    private $lehrveranstaltungen;
    private $voraussetzungenLP;

    /**
     * @return Angebot
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
     * @return mixed
     */
    public function getFremdeStudiengaenge()
    {
        return $this->fremdeStudiengaenge;
    }

    /**
     * @param mixed $fremdeStudiengaenge
     */
    public function setFremdeStudiengaenge($fremdeStudiengaenge)
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
     * @param mixed $studienplaene
     */
    public function setStudienplaene($studienplaene)
    {
        $this->studienplaene = $studienplaene;
    }

    /**
     * @return mixed
     */
    public function getLehrende()
    {
        return $this->lehrende;
    }

    /**
     * @param mixed $lehrende
     */
    public function setLehrende($lehrende)
    {
        $this->lehrende = $lehrende;
    }

    /**
     * @return mixed
     */
    public function getVoraussetzungen()
    {
        return $this->voraussetzungen;
    }

    /**
     * @param mixed $voraussetzungen
     */
    public function setVoraussetzungen($voraussetzungen)
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