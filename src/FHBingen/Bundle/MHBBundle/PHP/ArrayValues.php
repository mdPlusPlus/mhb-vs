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
     *
     * muss angepasst werden in:
     * - Entity/Veranstaltung.php
     * - Entity/VeranstaltungHistory.php
     *
     * wird benutzt in:
     * - Form/PlanungType.php
     * - Form/VeranstaltungType.php
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
     *
     * muss angepasst werden in:
     * - Entity/Veranstaltung.php
     * - Entity/VeranstaltungHistory.php
     *
     * wird benutzt in:
     * - Form/PlanungType.php
     * - Form/VeranstaltungType.php
     */
    public static $lang = array(
        'Deutsch' => 'Deutsch',
        'Englisch' => 'Englisch',
    );

    /**
     * Leistungspunkte
     *
     * muss angepasst werden in:
     * - Entity/Veranstaltung.php
     * - Entity/VeranstaltungHistory.php
     *
     * wird benutzt in:
     * - Form/PlanungType.php
     * - Form/VeranstaltungType.php
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
     *
     * wird benutzt in:
     * - Form/StudiengangType.php
     */
    public static $faculty = array(
        '1' => '1',
        '2' => '2',
    );

    /**
     * Studiengang-Typen
     *
     * muss angepasst werden in:
     * - Entity/Studiengang.php
     *
     * wird benutzt in:
     * - Form/StudiengangType.php
     */
    public static $level = array(
        'Bachelor' => 'Bachelor',
        'Master' => 'Master',
    );

    /**
     * Regelsemester
     *
     * wird benutzt in:
     * - Form/VorAngebotType.php
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
     *
     * muss angepasst werden in:
     * - Entity/Angebot.php
     *
     * wird benutzt in:
     * - Form/VorAngebotType.php
     */
    public static $offerTypes = array(
        'Wahlpflichtfach' => 'Wahlpflichtfach',
        'Pflichtfach' => 'Pflichtfach',
    );

    /**
     * Geschlechter
     *
     * muss angepasst werden in:
     * - Entity/Dozent.php
     *
     * wird benutzt in:
     * - Form/DozentType.php
     */
    public static $gender = array(
        'Herr' => 'Herr',
        'Frau' => 'Frau',
    );

    /**
     * Voraussetzungen für die Vergabe von Leistungspunkten
     *
     * wird benutzt in:
     * - Form/PlanungType.php
     * - Form/VeranstaltungType.php
     */
    public static $voraussetzungLP = array(
        'Prüfungsleistung' => 'bestandene Prüfungsleistung',
        'Studienleistung' => 'bestandene Studienleistung',
    );

    /**
     * Prüfungsformen
     *
     * wird benutzt in:
     * - Form/PlanungType.php
     * - Form/VeranstaltungType.php
     */
    public static $pruefungsformen = array(
        'Schriftliche Klausur' => 'Schriftliche Klausur',
        'Mündliche Prüfung' => 'Mündliche Prüfung',
        'Vortrag' => 'Vortrag',
        'Hausarbeit' => 'Hausarbeit',
    );

    /**
     * Lehrveranstaltungen
     *
     * wird benutzt in:
     * - Form/PlanungType.php
     * - Form/VeranstaltungType.php
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