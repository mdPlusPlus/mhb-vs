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
            ->add('SWSUebung', 'text', array('label' => 'SWS Übung: ', 'required' => true))
            ->add('SWSVorlesung', 'text', array('label' => 'SWS Vorlesung: ', 'required' => true))
            ->add('AnzahlUebungsgruppen', 'text', array('label' => 'Anzahl der Übungsgruppen: ', 'required' => true))
            ->add('GroesseUebungsgruppen', 'text', array('label' => 'Grösse einer Übungsgruppe: ', 'required' => true))


            //TODO: Lehrbeauftragter und findetStatt besser in OnPreSetData?!
            ->add('istLehrbeauftragter', 'checkbox', array('required' => false, 'label' => 'ist Lehrbeauftragter?'))
            ->add('findetStatt', 'checkbox', array('required' => false, 'label' => 'findet statt?'))

            ->add('angebot', 'entity', array('label' => "Modul: ", 'required' => true, 'class' => 'FHBingenMHBBundle:Angebot'))
            ->add('dozent', 'entity', array('label' => "Dozent: ", 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent'))
            ->add('semester');
    }

    /**
    * @param OptionsResolverInterface $resolver
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Semesterplan'
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