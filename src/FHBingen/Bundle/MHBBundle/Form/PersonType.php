<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 07.12.2014
 * Time: 14:08
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

//TODO: PersonType wird scheinbar nirgendwo verwendet -> löschen?
class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email')->add('fullname', 'text')->add('submit', 'submit');
    }

    public function getName()
    {
        return 'person';
    }
}