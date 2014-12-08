<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 08.12.2014
 * Time: 16:01
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SemesterplanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('semester', 'entity', array('label' => 'Semester: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Semester'))
            ->add('module', 'entity', array('label' => 'Dozent: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent'))
            ->add('lehrender', 'entity', array('label' => 'Veranstaltung: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('sws_uebung', 'integer', array('label' => 'SWS Uebung: ', 'required' => true))
            ->add('sws_vorlesung', 'integer', array('label' => 'SWS Vorlesung: ', 'required' => true))
            ->add('anzahl_uebungsgruppen', 'integer', array('label' => 'Anzahl Uebungsgruppen: ', 'required' => true))
            ->add('groesse_uebungsgruppen', 'integer', array('label' => 'Groesse Uebungsgruppen: ', 'required' => true))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'semesterplan';
    }
}