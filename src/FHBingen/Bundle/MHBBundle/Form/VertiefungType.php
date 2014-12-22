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

class VertiefungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
//            ->add('stgang', 'entity', array('label' => 'Studiengang: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))
            ->add('vertiefungsrichtung', 'text', array('label' => 'Vertiefungsrichtung: ', 'required' => false));
            /*->add('reset', 'reset')
            ->add('submit', 'submit');*/
    }

    public function getName()
    {
        return 'vertiefung';
    }
}