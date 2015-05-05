<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 08.12.2014
 * Time: 15:23
 */
namespace FHBingen\Bundle\MHBBundle\Form;

use FHBingen\Bundle\MHBBundle\PHP\ArrayValues;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class VorAngebotType
 *
 * für Entity:	N/A
 * sammelt Informationen für den eigentlichen AngebotType
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class VorAngebotType extends AbstractType
{
    private $studiengangIDs;

    /**
     * @param array $studiengangIDs
     *
     * int array
     */
    public function __construct(array $studiengangIDs)
    {
        $this->studiengangIDs = $studiengangIDs;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('studiengang', 'entity', array(
                'label' => 'Studiengang: ',
                'required' => true,
                'class' => 'FHBingenMHBBundle:Studiengang',
                'query_builder' => function(EntityRepository $er) {
                    $qb = $er->createQueryBuilder('s');
                    $qb->add('where', $qb->expr()->in('s.Studiengang_ID', $this->studiengangIDs)) //warning?
                    ->orderBy('s.Grad', 'ASC')
                    ->addOrderBy('s.Titel', 'ASC');

                    return $qb;
                },
            ))

            ->add('angebotsart', 'choice', array('label' => 'Angebotsart:', 'required' => true, 'choices' => ArrayValues::$offerTypes))

            ->add('studienplan_ws', 'choice', array(
                'label' => 'Regelsemester bei Start in Wintersemester',
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'choices' => ArrayValues::$regelsem))

            ->add('studienplan_ss', 'choice', array(
                'label' => 'Regelsemester bei Start in Sommersemester',
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'choices' => ArrayValues::$regelsem));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vorangebot';
    }
}