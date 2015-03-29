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

//TODO: wo genutzt?
class SemesterplanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('semester', 'entity', array('label' => 'Semester: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Semester'))
            ->add('lehrender', 'entity', array('label' => 'Dozent: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent'))
            ->add('module', 'entity', array('label' => 'Veranstaltung: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('swsUebung', 'integer', array('label' => 'SWSUebung: ', 'required' => true))
            ->add('swsVorlesung', 'integer', array('label' => 'SWSVorlesung: ', 'required' => true))
            ->add('anzahlUebungsgruppen', 'integer', array('label' => 'Anzahl Uebungsgruppen: ', 'required' => true))
            ->add('groesseUebungsgruppen', 'integer', array('label' => 'Groesse Uebungsgruppen: ', 'required' => true))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'semesterplan';
    }
}