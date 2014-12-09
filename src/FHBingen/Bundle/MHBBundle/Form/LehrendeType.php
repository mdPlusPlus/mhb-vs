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

class LehrendeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('module', 'entity', array('label' => 'Name: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('lehrender', 'entity', array('label' => 'Email: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent'))
            ->add('reset', 'reset')
            ->add('submit', 'submit');


    }
    public function getName()
    {
        return 'lehrende';
    }
}