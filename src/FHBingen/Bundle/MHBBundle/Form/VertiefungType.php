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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Vertiefung'
        ));
    }


    public function getName()
    {
        return 'vertiefung';
    }
}