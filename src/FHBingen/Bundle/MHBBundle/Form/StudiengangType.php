<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 08.12.2014
 * Time: 15:35
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Doctrine\ORM\EntityRepository;
use FHBingen\Bundle\MHBBundle\PHP\ArrayValues;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class StudiengangType
 *
 * für Entity:	Studiengang.php
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class StudiengangType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fachbereich', 'choice', array('label' => 'Fachbereich: ', 'required' => true, 'choices' => ArrayValues::$faculty))
            ->add('grad', 'choice', array('label' => 'Grad: ', 'required' => true, 'choices' => ArrayValues::$level))
            ->add('titel', 'text', array('label' => 'Titel: ', 'required' => true, 'attr' => array('class' => 'sonstigesClass')))
            ->add('kuerzel', 'text', array('label' => 'Kürzel: ', 'required' => true))
            ->add('beschreibung', 'textarea', array('label' => 'Beschreibung: ', 'required' => true, 'attr' => array('class' => 'textAreaClass')))
            ->add('sgl', 'entity', array('label' => 'Studiengangleiter: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->where('s.roles=2')
                        ->OrderBy('s.Nachname', 'ASC');
                },))

            //Ab hier neuer Merge mit VertiefungType und FachgebietType

            //TODO: Asserts werden nicht angewendet!
            ->add('richtung', 'collection', array('label' => false, 'type' => new VertiefungType(),
                'delete_empty' => true, 'allow_add' => true, 'allow_delete' => true,
                'options' => array(
                    'required' => false,
                    'attr' => array(
                        'class' => 'Vertiefung'
                    )
                    )
            ))

            /*
             * TODO:
             *  - Asserts werden nicht angewendet!
             *  - außerdem ist es möglich Studiengänge ohne Fachgebiete anzulegen, in denen dann keine Angebote erstellt werden können, weil keine Fachgebiete existieren.
             */
            ->add('fachgebiete', 'collection', array('label' => false, 'type' => new FachgebietType(),
                'delete_empty' => true, 'allow_add' => true, 'allow_delete' => true,
                'options' => array(
                    'required' => true,
                    'attr' => array(
                        'class' => 'Fachgebiet'
                    ),
                    )
            ));
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

    /**
     * @return string
     */
    public function getName()
    {
        return 'studiengang';
    }
}