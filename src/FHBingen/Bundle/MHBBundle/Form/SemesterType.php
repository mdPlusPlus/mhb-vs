<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 08.12.2014
 * Time: 15:23
 */
namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

//TODO: wo genutzt?
class SemesterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('semester', 'text', array('label' => 'Semester: ', 'required' => true))
            ->add('reset', 'reset')
            ->add('submit', 'submit');

    }
    public function getName()
    {
        return 'semester';
    }
}