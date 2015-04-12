<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 10.04.2015
 * Time: 02:36
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description');

        $builder->add('tags', 'collection', array(
            'type'                  => new TagType(),
            'allow_add'             => true,
            'allow_delete'          => true,
            'by_reference'          => false,
            'cascade_validation'    => true,   //wichtig für collections!
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'            => 'FHBingen\Bundle\MHBBundle\Entity\Task',
            'cascade_validation'    => true,   //wichtig für embedded forms!
        ));
    }

    public function getName()
    {
        return 'task';
    }
}