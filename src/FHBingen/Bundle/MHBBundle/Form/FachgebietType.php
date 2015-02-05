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
            ->add('titel', 'text', array('label' => 'Fachgebiet: ', 'required' => true, 'attr' => array('class' => 'sonstigesClass')));
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

    /**
     * @return string
     */
    public function getName()
    {
        return 'fachgebiet';
    }
}