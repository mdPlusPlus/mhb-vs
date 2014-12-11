<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 08.12.2014
 * Time: 11:05
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class DozentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $gender =['Herr' => 'Herr', 'Frau' => 'Frau'];

        $builder
            ->add('anrede', 'choice', array('label' => 'Anrede: ', 'required' => true, 'choices' => $gender))
            ->add('titel', 'text', array('label' => 'Titel: ', 'required' => false))
            ->add('name', 'text', array('label' => 'Vorname: ', 'required' => true))
            ->add('nachname', 'text', array('label' => 'Nachname: ', 'required' => true))
            ->add('email', 'email', array('label' => 'Email: ', 'required' => true))
            ->add('password', 'text', array('label' => 'Passwort: ', 'required' => true))
            ->add('roles', 'entity', array('label' => 'Position: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Role'))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'dozent';
    }
}