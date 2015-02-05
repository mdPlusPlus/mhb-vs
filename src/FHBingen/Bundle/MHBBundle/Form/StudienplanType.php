<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 08.12.2014
 * Time: 15:28
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use FHBingen\Bundle\MHBBundle\PHP\ArrayValues;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

//TODO: wo genutzt? -> wird automatisch genieriert, kann gelöscht werden
class StudienplanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'regelSemester',
                'choice',
                array(
                    'label' => 'Regelsemester: ',
                    'choices' => ArrayValues::$regelsem,
                    'multiple' => true,
                    'expanded' => true
                )
            )
            ->add('startSemester', 'entity', array('label' => 'Startsemester: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Semester'))
            ->add('veranstaltung', 'entity', array('label' => 'Veranstaltung: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('studiengang', 'entity', array('label' => 'Studiengang: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Studienplan'
        ));
    }


    public function getName()
    {
        return 'studienplan';
    }
}