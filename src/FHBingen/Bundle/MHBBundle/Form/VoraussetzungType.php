<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 28.01.2015
 * Time: 11:32
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VoraussetzungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('modulX', 'entity', array('label' => 'Vorrausgesetztes Modul:', 'required'=> false, 'class' => 'FHBingenMHBBundle:Veranstaltung'));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Veranstaltung'
        ));
    }

    public function getName()
    {
        return 'Voraussetzungen';
    }
}