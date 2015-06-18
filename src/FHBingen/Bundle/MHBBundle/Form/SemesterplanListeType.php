<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 25.05.2015
 * Time: 18:47
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Doctrine\ORM\Query\Expr;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * Class SemesterplanType
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class SemesterplanListeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('semesterplan', 'collection', array(
            'label' => false,
            'type' => new SemesterplanType(),
            'cascade_validation'    => true,    //wichtig für collections!
            'options' => array(
                'required' => false,
                'attr' => array(
                    'class' => 'semesterplan',
                ),
            ),
        ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Semester',
            'cascade_validation'    => true,   //wichtig für embedded forms!
        ));
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'semesterplanliste';
    }

}