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

class KernfachType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('modul', 'entity', array('label' => 'Modul_ID: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('vertiefung', 'entity', array('label' => 'Vertiefung_ID: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Vertiefung'))
            ->add('reset', 'reset')
            ->add('submit', 'submit');

    }
    public function getName()
    {
        return 'kernfach';
    }
}