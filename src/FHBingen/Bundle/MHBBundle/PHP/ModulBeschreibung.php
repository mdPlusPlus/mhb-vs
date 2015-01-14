<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 13.01.2015
 * Time: 14:37
 */

namespace FHBingen\Bundle\MHBBundle\PHP;


class ModulBeschreibung {

    private $modul;
    private $angebot;
    private $studiengaenge;
    private $studienplaene;
    private $lehrende;
    private $voraussetzungen;
    private $pruefungsformen;
    private $lehrveranstaltungen;
    private $voraussetzungenLP;

    /**
     * @return mixed
     */
    public function getModul()
    {
        return $this->modul;
    }

    /**
     * @param mixed $modul
     */
    public function setModul($modul)
    {
        $this->modul = $modul;
    }

    /**
     * @return mixed
     */
    public function getAngebot()
    {
        return $this->angebot;
    }

    /**
     * @param mixed $angebot
     */
    public function setAngebot($angebot)
    {
        $this->angebot = $angebot;
    }

    /**
     * @return mixed
     */
    public function getStudiengaenge()
    {
        return $this->studiengaenge;
    }

    /**
     * @param mixed $studiengaenge
     */
    public function setStudiengaenge($studiengaenge)
    {
        $this->studiengaenge = $studiengaenge;
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