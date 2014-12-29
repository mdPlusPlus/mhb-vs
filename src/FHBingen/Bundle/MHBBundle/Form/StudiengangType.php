<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 08.12.2014
 * Time: 15:35
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class StudiengangType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $faculty =['1' => '1', '2' => '2'];
        $level =['Bachelor' => 'Bachelor', 'Master' => 'Master'];

        $builder
            ->add('fachbereich', 'choice', array('label' => 'Fachbereich: ', 'required' => true, 'choices' => $faculty))
            ->add('grad', 'choice', array('label' => 'Grad: ', 'required' => true, 'choices' => $level))
            ->add('titel', 'text', array('label' => 'Titel: ', 'required' => true))
            ->add('kuerzel', 'text', array('label' => 'Kürzel: ', 'required' => true))
            ->add('beschreibung', 'text', array('label' => 'Beschreibung: ', 'required' => true))
            ->add('sgl', 'entity', array('label' => 'Studiengangleiter: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->join('FHBingenMHBBundle:Studiengang', 's', 'WITH','s.sgl=d.Dozenten_ID')
                        ;
                },))

            //Ab hier neuer Merge mit VertiefungType und FachgebietType

            ->add('richtung', 'collection', array('label' => false, 'type' => new VertiefungType(),
                'delete_empty' => true, 'allow_add' => true, 'allow_delete' => true,
                'options' => array(
                    'required' => false,
                    'attr' => array(
                        'class' => 'Vertiefung'
                    )
                    )
            ))

            ->add('fachgebiete', 'collection', array('label' => false, 'type' => new FachgebietType(),
                'delete_empty' => true, 'allow_add' => true, 'allow_delete' => true,
                'options' => array(
                    'required' => true,
                    'attr' => array(
                        'class' => 'Fachgebiet'
                    ),
                    )
            ))

            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Studiengang'
        ));
    }

    public function getName()
    {
        return 'studiengang';
    }
}