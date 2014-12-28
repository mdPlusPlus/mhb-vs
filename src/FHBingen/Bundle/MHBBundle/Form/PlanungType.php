<?php
/**
 * Created by PhpStorm.
 * User: Mishca
 * Date: 28.12.2014
 * Time: 13:40
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlanungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $frequency=['Sommersemester' => 'Sommersemester', 'Wintersemester' => 'Wintersemester', 'wechselnd' => 'wechselnd', 'jedes Semester' => 'jedes Semester'];

        $lang=['deutsch' => 'deutsch', 'englisch' => 'englisch'];

        $lp=['3' => '3', '6' => '6', '9' => '9', '12' => '12', '15' => '15', '30' => '30'];

        $builder
            ->add('kuerzel', 'text', array('label' => 'Modulkürzel: ', 'required' => false))
            ->add('name', 'text', array('label' => 'Modulname (deutsch): ', 'required' => true))
            ->add('nameEN', 'text', array('label' => 'Modulname (englisch): ', 'required' => false))
            ->add('haeufigkeit', 'choice', array('label' => 'Häufigkeit des Angebots: ', 'required' => false, 'choices' => $frequency))
             ->add('dauer', 'text',  array('label' => 'Dauer: ', 'required' => false))
//            ->add('lehrveranstaltungen', 'choice',  array('label' => 'Lehrveranstaltungen: ','choices'
//            => array('Vorlesung'   => 'Vorlesung',
//                    'Übung' => 'Übung',
//                    'Labor' => 'Labor',
//                    'Seminar' => 'Seminar',
//                    'Praxisprojekt' => 'Praxisprojekt',
//                    'Selbststudium und Konsultationen' => 'Selbststudium und Konsultationen'),
//                'multiple'  => true,
//                'expanded' => true))
            ->add('kontaktzeitVL', 'integer', array('label' => 'Kontaktzeit Vorlesung: ', 'required' => false))
            ->add('kontaktzeitSonstige', 'integer', array('label' => 'Kontaktzeit sonstige: ', 'required' => false))
            ->add('selbststudium', 'integer', array('label' => 'Selbststudium: ', 'required' => false))
            ->add('gruppengroesse', 'integer', array('label' => 'Gruppengröße: ', 'required' => false))
            ->add('lernergebnisse', 'textarea', array('label' => 'Lernergebisse: ', 'required' => false))
            ->add('inhalte', 'textarea', array('label' => 'Lehrinhalte: ', 'required' => false))
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
            ->add('sprache', 'choice', array('label' => 'Sprache: ', 'required' => false, 'choices' => $lang))
            ->add('literatur', 'textarea', array('label' => 'Literaturverweise: ', 'required' => false))
            ->add('leistungspunkte', 'choice', array('label' => 'Leistungspunkte: ', 'required' => false, 'choices' => $lp))
//            ->add('voraussetzungLP', 'choice', array('label' => 'Voraussetzung für Leistungspunkte: ','choices'
//            => array('Prüfungsleistung'   => 'Prüfungsleistung',
//                     'Studienleistung' => 'Studienleistung'),
//                     'multiple'  => true,
//                     'expanded' => true))
             ->add('voraussetzungInh', 'textarea', array('label' => 'Voraussetzung inhaltlich: ', 'required' => false))

            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Veranstaltung'
        ));
    }

    public function getName()
    {
        return 'Veranstaltung';
    }
}