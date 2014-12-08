<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 08.12.2014
 * Time: 16:07
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ModulhandbuchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('beschreibung', 'textarea', array('label' => 'Beschreibung: ', 'required' => true))
            ->add('gueltig_ab', 'entity', array('label' => 'gueltig_ab: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Semester'))
            ->add('gehoert_zu', 'entity', array('label' => 'gehoert_zu: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'modulhandbuch';
    }
}