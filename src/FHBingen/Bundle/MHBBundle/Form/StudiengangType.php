<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 08.12.2014
 * Time: 15:35
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class StudiengangType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $faculty =['1' => '1', '2' => '2'];
        $level =['Bachelor' => 'Bachelor', 'Master' => 'Master'];

        $builder
            ->add('fachbereich', 'choice', array('label' => 'Fachbereich: ', 'required' => true, 'choices' => $faculty))
            ->add('grad', 'choice', array('label' => 'Grad: ', 'required' => true, 'choices' => $level))
            ->add('titel', 'text', array('label' => 'Titel: ', 'required' => true))
            ->add('kuerzel', 'text', array('label' => 'Kuerzel: ', 'required' => true))
            ->add('beschreibung', 'text', array('label' => 'Beschreibung: ', 'required' => true))
            ->add('sgl', 'entity', array('label' => 'Studiengangleiter: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent'))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'studiengang';
    }
}