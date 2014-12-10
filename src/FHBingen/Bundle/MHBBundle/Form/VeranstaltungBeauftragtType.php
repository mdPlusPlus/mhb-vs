<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 10.12.2014
 * Time: 12:00
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VeranstaltungBeauftragtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'entity', array('label' => 'Modulbeauftragter: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent', 'property' => 'email'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Dozent'
        ));
    }

    public function getName()
    {
        return 'Veranstaltung_Beauftragt';
    }
}