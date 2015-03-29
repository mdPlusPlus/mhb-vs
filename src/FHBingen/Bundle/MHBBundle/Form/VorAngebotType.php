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
    private $queryString;

    /**
     * @param array $studiengangIDs
     *
     * int array
     */
    public function __construct(array $studiengangIDs)
    {
        $this->studiengangIDs = $studiengangIDs;
        $this->queryString = "";

        //concatenating the query strings
        $max = sizeof($this->studiengangIDs);
        for ($i = 0; $i < $max; $i++) {
            if ($i < $max-1) {
                //not last entry
                $this->queryString=$this->queryString. 's.Studiengang_ID=' . $this->studiengangIDs[$i].' or ';
            } else {
                //last entry or only entry
                $this->queryString =$this->queryString. ' s.Studiengang_ID=' . $this->studiengangIDs[$i];
            }
        }
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('modulid', 'hidden', array('required' => true))

            ->add('studiengang', 'entity', array(
                'label' => 'Studiengang: ',
                'required' => true,
                'class' => 'FHBingenMHBBundle:Studiengang',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('s')->where($this->queryString);
                }))

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