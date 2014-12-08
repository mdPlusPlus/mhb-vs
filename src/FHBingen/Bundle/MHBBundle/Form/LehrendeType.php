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
            ->add('id', 'integer', array('label' => 'ID): ', 'required' => true))
            ->add('module', 'entity', array('label' => 'Modul_ID: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('lehrender', 'entity', array('label' => 'Dozent_ID: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent'));


    }
    public function getName()
    {
        return 'lehrende';
    }
}