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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

//TODO: wo wird kernfachtype genutzt? kann raus
class KernfachType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('modul', 'entity', array('label' => 'Name: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('vertiefung', 'entity', array('label' => 'Vertiefungsrichtung: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Vertiefung'))
            ->add('reset', 'reset')
            ->add('submit', 'submit');

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Kernfach'
        ));
    }

    public function getName()
    {
        return 'kernfach';
    }
}