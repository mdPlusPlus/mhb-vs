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
        $builder->add('anrede', 'text')->add('titel', 'text')->add('name', 'text')->add('nachname', 'text')->add('email', 'email')->add('submit', 'submit');
    }

    public function getName()
    {
        return 'dozent';
    }
}