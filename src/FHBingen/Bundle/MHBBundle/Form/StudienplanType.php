<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 08.12.2014
 * Time: 15:28
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class StudienplanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $regelsem =['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7'];

        $builder
            ->add('reg_sem', 'choice', array('label' => 'Regelsemester: ', 'required' => true, 'choices' => $regelsem))
            ->add('start_sem', 'entity', array('label' => 'Startsemester: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Semester'))
            ->add('modul', 'entity', array('label' => 'Veranstaltung: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('studiengang', 'entity', array('label' => 'Studiengang: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'studienplan';
    }
}