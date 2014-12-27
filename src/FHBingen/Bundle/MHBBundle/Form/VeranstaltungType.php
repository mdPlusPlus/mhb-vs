<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 08.12.2014
 * Time: 13:40
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class VeranstaltungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

//        $state =['in Planung' => 'in Planung', 'Freigegeben' => 'Freigegeben', 'expired' => 'expired'];

        $frequency=['Sommersemester' => 'Sommersemester', 'Wintersemester' => 'Wintersemester', 'wechselnd' => 'wechselnd', 'jedes Semester' => 'jedes Semester'];

        $lang=['deutsch' => 'deutsch', 'englisch' => 'englisch'];

        $lp=['3' => '3', '6' => '6', '9' => '9', '12' => '12', '15' => '15', '30' => '30'];

        $builder
            ->add('beauftragter', 'entity', array('label' => 'Modulbeauftragter: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent'))
//            ->add('status', 'choice', array('label' => 'Status: ', 'required' => true, 'choices' => $state))
            ->add('kuerzel', 'text', array('label' => 'Modulkürzel: ', 'required' => true))
            ->add('name', 'text', array('label' => 'Modulname (deutsch): ', 'required' => true))
            ->add('nameEN', 'text', array('label' => 'Modulname (englisch): ', 'required' => false))
            ->add('haeufigkeit', 'choice', array('label' => 'Häufigkeit des Angebots: ', 'required' => false, 'choices' => $frequency))
            ->add('dauer', 'text',  array('label' => 'Dauer: ', 'required' => true))
//            ->add('lehrveranstaltungen', 'choice',  array('label' => 'Lehrveranstaltungen: ','choices'
//            => array('Vorlesung'   => 'Vorlesung',
//                    'Übung' => 'Übung',
//                    'Labor' => 'Labor',
//                    'Seminar' => 'Seminar',
//                    'Praxisprojekt' => 'Praxisprojekt',
//                    'Selbststudium und Konsultationen' => 'Selbststudium und Konsultationen'),
//                'multiple'  => true,
//                'expanded' => true))
            ->add('kontaktzeitVL', 'integer', array('label' => 'Kontaktzeit Vorlesung: ', 'required' => true))
            ->add('kontaktzeitSonstige', 'integer', array('label' => 'Kontaktzeit sonstige: ', 'required' => true))
            ->add('selbststudium', 'integer', array('label' => 'Selbststudium: ', 'required' => true))
            ->add('gruppengroesse', 'integer', array('label' => 'Gruppengröße: ', 'required' => true))
            ->add('lernergebnisse', 'textarea', array('label' => 'Lernergebisse: ', 'required' => true))
            ->add('inhalte', 'textarea', array('label' => 'Lehrinhalte: ', 'required' => true))
//            ->add('pruefungsformen', 'choice', array('label' => 'Prüfungsform: ','choices'
//            => array('Schriftliche Klausur'   => 'Schriftliche Klausur',
//                     'Mündliche Prüfung' => 'Mündliche Prüfung',
//                     'Vortrag' => 'Vortrag',
//                     'Dokumentation' => 'Dokumentation',
//                     'Durchführung Übung' => 'Durchführung Übung',
//                     'Erfolgreiche Zertifizierung' => 'Erfolgreiche Zertifizierung',
//                     'schriftliche Ausarbeitung' => 'schriftliche Ausarbeitung',
//                     'Projektarbeit' => 'Projektarbeit',
//                     'Kolloquium'   => 'Kolloquium'),
//                     'multiple'  => true,
//                     'expanded' => true))
            ->add('sprache', 'choice', array('label' => 'Sprache: ', 'required' => true, 'choices' => $lang))
            ->add('literatur', 'textarea', array('label' => 'Literaturverweise: ', 'required' => true))
            ->add('leistungspunkte', 'choice', array('label' => 'Leistungspunkte: ', 'required' => true, 'choices' => $lp))
//            ->add('voraussetzungLP', 'choice', array('label' => 'Voraussetzung für Leistungspunkte: ','choices'
//            => array('Prüfungsleistung'   => 'Prüfungsleistung',
//                     'Studienleistung' => 'Studienleistung'),
//                     'multiple'  => true,
//                     'expanded' => true))
            ->add('voraussetzungInh', 'textarea', array('label' => 'Voraussetzung inhaltlich: ', 'required' => true))

            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'Veranstaltung';
    }
}