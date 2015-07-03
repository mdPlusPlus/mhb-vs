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

/**
 * Class FachgebietType
 *
 * für Entity:	Fachgebiet.php
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class FachgebietType extends AbstractType
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
            ->add('Titel', 'text', array('label' => 'Fachgebiet: ', 'required' => true, 'attr' => array('class' => 'sonstigesClass', 'maxlength' => '50')))
            ->add('KuerzelP', 'text', array('label' => 'Kürzel Pflicht: ', 'required' => true, 'attr' => array('class' => 'fachgebietKuerzelClass', 'maxlength' => '2')))
            ->add('KuerzelWP', 'text', array('label' => 'Kürzel Wahlpflicht: ', 'required' => true, 'attr' => array('class' => 'fachgebietKuerzelClass', 'maxlength' => '2')));
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

    /**
     * @return string
     */
    public function getName()
    {
        return 'fachgebiet';
    }
}