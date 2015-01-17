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
            ->add('beschreibung', 'text', array('label' => 'Beschreibung: ', 'required' => true))
            ->add('gueltigAb', 'entity', array('label' => 'Gültig ab: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Semester'));
    }

    public function getName()
    {
        return 'modulhandbuch';
    }
}