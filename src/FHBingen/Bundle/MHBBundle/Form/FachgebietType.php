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

class FachgebietType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titel', 'text', array('label' => 'Fachgebiet: ', 'required' => true));
/*            ->add('hat', 'entity', array('label' => 'Studiengang Titel: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))
            ->add('reset', 'reset')
            ->add('submit', 'submit');*/
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Fachgebiet'
        ));
    }

    public function getName()
    {
        return 'fachgebiet';
    }
}