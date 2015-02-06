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

/**
 * Class VertiefungType
 *
 *
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class VertiefungType extends AbstractType
{
    /*
     * wird in StudiengangType genutzt
     */

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', 'text', array('label' => 'Vertiefungsrichtung: ', 'required' => false, 'attr' => array('class' => 'sonstigesClass')));
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

    /**
     * @return string
     */
    public function getName()
    {
        return 'vertiefung';
    }
}