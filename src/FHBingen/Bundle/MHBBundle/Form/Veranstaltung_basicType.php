<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 10.12.2014
 * Time: 11:59
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Veranstaltung_basicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $state =['in Planung' => 'in Planung', 'Freigegeben' => 'Freigegeben', 'expired' => 'expired'];

        $frequency=['Sommersemester' => 'Sommersemester', 'Wintersemester' => 'Wintersemester', 'wechselnd' => 'wechselnd', 'jedes Semester' => 'jedes Semester'];

        $lang=['deutsch' => 'deutsch', 'englisch' => 'englisch'];

        $lp=['3' => '3', '6' => '6', '9' => '9', '12' => '12', '15' => '15'];

        $builder
            ->add('Status', 'choice', array('label' => 'Status: ', 'required' => true, 'choices' => $state))
            ->add('Kuerzel', 'text', array('label' => 'Modulkürzel: ', 'required' => true))
            ->add('Name', 'text', array('label' => 'Modulname (deutsch): ', 'required' => true))
            ->add('Name_en', 'text', array('label' => 'Modulname (englisch): ', 'required' => false))
            ->add('Haeufigkeit', 'choice', array('label' => 'Häufigkeit des Angebots: ', 'required' => false, 'choices' => $frequency))
            ->add('Dauer', 'text', array('label' => 'Dauer: ', 'required' => true))
            ->add('Lehrveranstaltungen', 'text', array('label' => 'Lehrveranstaltungen: ', 'required' => true))
            ->add('Kontaktzeit_VL', 'integer', array('label' => 'Kontaktzeit Vorlesung: ', 'required' => true))
            ->add('Kontaktzeit_sonstige', 'integer', array('label' => 'Kontaktzeit sonstige: ', 'required' => true))
            ->add('Selbststudium', 'integer', array('label' => 'Selbststudium: ', 'required' => true))
            ->add('Gruppengroesse', 'integer', array('label' => 'Gruppengröße: ', 'required' => true))
            ->add('Lernergebnisse', 'textarea', array('label' => 'Lernergebisse: ', 'required' => true))
            ->add('Inhalte', 'textarea', array('label' => 'Lehrinhalte: ', 'required' => true))
            ->add('Pruefungsformen', 'text', array('label' => 'Prüfungsform: ', 'required' => true))
            ->add('Sprache', 'choice', array('label' => 'Sprache: ', 'required' => true, 'choices' => $lang))
            ->add('Literatur', 'textarea', array('label' => 'Literaturverweise: ', 'required' => true))
            ->add('Leistungspunkte', 'choice', array('label' => 'Leistungspunkte: ', 'required' => true, 'choices' => $lp))
            ->add('Voraussetzung_LP', 'textarea', array('label' => 'Voraussetzung für Leistungspunkte: ', 'required' => true))
            ->add('Voraussetzung_inh', 'textarea', array('label' => 'Voraussetzung inhaltlich: ', 'required' => true));
    }

    public function getName()
    {
        return 'Veranstaltung_basic';
    }
}