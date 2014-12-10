<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 10.12.2014
 * Time: 12:10
 */
namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Veranstaltung_ErstellType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('erstellt_von', 'entity', array('label' => 'Ersteller: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent', 'property' => 'email'));
    }

    public function getName()
    {
        return 'Veranstaltung_Erstell';
    }
}