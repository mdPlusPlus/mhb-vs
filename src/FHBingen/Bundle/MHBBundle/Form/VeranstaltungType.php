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
        $state =['in Planung' => 'in Planung', 'Freigegeben' => 'Freigegeben', 'expired' => 'expired'];

        $frequency= ['' => '', 'Sommersemester' => 'Sommersemester', 'Wintersemester' => 'Wintersemester', 'wechselnd' => 'wechselnd', 'jedes Semester' => 'jedes Semester'];

        $builder
            ->add('erstellt_von', 'entity', array('label' => 'Ersteller: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent'))
            ->add('status', 'choice', array('label' => 'Status: ', 'required' => true, 'choice' => $state))
            ->add('kürzel', 'text', array('label' => 'Modulkürzel: ', 'required' => true))
            ->add('name', 'text', array('label' => 'Modulname (deutsch): ', 'required' => true))
            ->add('name_en', 'text', array('label' => 'Modulname (englisch): ', 'required' => false))
            ->add('haeufigkeit', 'choice', array('label' => 'Häufigkeit des Angebots: ', 'required' => false, 'choice' => $frequency))
            ->add('dauer', 'text', array('label' => 'Dauer: ', 'required' => true))
            //Lehrveranstaltungen Design Frage????
            ->add('lehrveranstalungen', 'text', array('label' => 'Lehrveranstaltungen: ', 'required' => true))
            ->add('kontaktzeit_vl', 'integer', array('label' => 'Kontaktzeit Vorlesung: ', 'required' => true))
            ->add('kontaktzeit_sonstige', 'integer', array('label' => 'Kontaktzeit sonstige: ', 'required' => true))
            ->add('selbststudium', 'integer', array('label' => 'Selbststudium: ', 'required' => true))
            ->add('gruppen', 'integer', array('label' => ': ', 'required' => true))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'dozent';
    }
}