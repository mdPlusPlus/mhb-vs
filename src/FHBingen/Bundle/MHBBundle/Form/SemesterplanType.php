<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 25.05.2015
 * Time: 18:47
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use FHBingen\Bundle\MHBBundle\PHP\ArrayValues;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * Class SemesterplanType
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class SemesterplanType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('angebot', 'entity', array(              'label' => false, 'required' => true, 'error_bubbling' => true, 'class' => 'FHBingenMHBBundle:Angebot', 'disabled' => true))
            ->add('findetStatt', 'checkbox', array(        'label' => false, 'required' => true, 'error_bubbling' => true))
            ->add('dozent', 'entity', array(               'label' => false, 'required' => true, 'error_bubbling' => true, 'class' => 'FHBingenMHBBundle:Dozent'))
            ->add('istLehrbeauftragter', 'checkbox', array('label' => false, 'required' => true, 'error_bubbling' => true))
            ->add('SWSVorlesung', 'text', array(           'label' => false, 'required' => true, 'error_bubbling' => true))
            ->add('SWSUebung', 'text', array(              'label' => false, 'required' => true, 'error_bubbling' => true))
            ->add('AnzahlUebungsgruppen', 'text', array(   'label' => false, 'required' => true, 'error_bubbling' => true))
            ->add('GroesseUebungsgruppen', 'text', array(  'label' => false, 'required' => true, 'error_bubbling' => true));
    }

    /**
    * @param OptionsResolverInterface $resolver
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Semesterplan',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'semesterplan';
    }

}