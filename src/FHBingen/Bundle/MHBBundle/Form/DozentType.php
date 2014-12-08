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
        $builder->add('anrede', 'text', array('label' => 'Anrede: ', 'required' => true));
        $builder->add('titel', 'text', array('label' => 'Titel: ', 'required' => false));
        $builder->add('name', 'text', array('label' => 'Vorname: ', 'required' => true));
        $builder->add('nachname', 'text', array('label' => 'Nachname: ', 'required' => true));
        $builder->add('email', 'email', array('label' => 'Email: ', 'required' => true));
        $builder->add('submit', 'submit');
    }

    public function getName()
    {
        return 'dozent';
    }
}