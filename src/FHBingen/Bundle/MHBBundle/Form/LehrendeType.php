<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 08.12.2014
 * Time: 15:23
 */
namespace FHBingen\Bundle\MHBBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class LehrendeType extends AbstractType
{
    /*
     * wird von Veranstaltungtype genutzt
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('dozent', 'entity', array('label' => 'Dozent [#]:', 'required' => false, 'class' => 'FHBingenMHBBundle:Dozent',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->OrderBy('d.Nachname', 'ASC');
                },));

            //->add('veranstaltung', 'entity', array('label' => false, 'required' => false, 'class' => 'FHBingenMHBBundle:Veranstaltung'));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Lehrende'
        ));
    }

    public function getName()
    {
        return 'lehrende';
    }
}