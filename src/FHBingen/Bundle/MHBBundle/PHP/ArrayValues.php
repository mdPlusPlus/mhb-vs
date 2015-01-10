<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 08.01.2015
 * Time: 22:39
 */

namespace FHBingen\Bundle\MHBBundle\PHP;

class ArrayValues {

    /**
     * Häufigkeit
     */
    public static $frequency = array(
        'Sommersemester' => 'Sommersemester',
        'Wintersemester' => 'Wintersemester',
        'wechselnd' => 'wechselnd',
        'jedes Semester' => 'jedes Semester',
    );

    /**
     * Dauer
     */
    public static $duration = array(
        'Wochen' => 'Wochen',
        'Monate' => 'Monate',
        'Semester' => 'Semester',
    );

    /**
     * Sprache
     */
    public static $lang = array(
        'Deutsch' => 'Deutsch',
        'Englisch' => 'Englisch',
    );

    /**
     * Leistungspunkte
     */
    public static $lp = array(
        '3' => '3',
        '6' => '6',
        '9' => '9',
        '12' => '12',
        '15' => '15',
        '30' => '30',
    );

    /**
     * Fachbereiche
     * 1 -> Fachbereich 1 - Life Sciences and Engineering
     * 2 -> Fachbereich 2 - Technik, Informatik und Wirtschaft
     */
    public static $faculty = array(
        '1' => '1',
        '2' => '2',
    );

    /**
     * Studiengang-Typen
     */
    public static $level = array(
        'Bachelor' => 'Bachelor',
        'Master' => 'Master',
    );

    /**
     * Regelsemester
     */
    public static $regelsem = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
    );

    /**
     * Angebotsarten
     */
    public static $offerTypes = array(
        'Wahlpflichtfach' => 'Wahlpflichtfach',
        'Pflichtfach' => 'Pflichtfach',
    );

    /**
     * Geschlechter
     */
    public static $gender = array(
        'Herr' => 'Herr',
        'Frau' => 'Frau',
    );

    /**
     * Voraussetzungen für die Vergabe von Leistungspunkten
     */
    public static $voraussetzungLP = array(
        'Prüfungsleistung' => 'Prüfungsleistung',
        'Studienleistung' => 'Studienleistung',
    );

    /**
     * Prüfungsformen
     */
    public static $pruefungsformen = array(
        'Schriftliche Klausur' => 'Schriftliche Klausur',
        'Mündliche Prüfung' => 'Mündliche Prüfung',
        'Vortrag' => 'Vortrag',
        'Hausarbeit' => 'Hausarbeit',
    );

    /**
     * Lehrveranstaltungen
     */
    public static $lehrveranstaltungen = array(
        'Vorlesung' => 'Vorlesung',
        'Übung' => 'Übung',
        'Labor' => 'Labor',
        'Seminar' => 'Seminar',
        'Praxisprojekt' => 'Praxisprojekt',
        'Selbststudium und Konsultationen' => 'Selbststudium und Konsultationen',
    );
}