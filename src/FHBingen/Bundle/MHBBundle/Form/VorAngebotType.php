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
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class VorAngebotType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('studiengang', 'entity', array('label' => 'Studiengang: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))
            ->add('angebotsart', 'choice', array('label' => 'Angebotsart:', 'required' => true, 'choices' => ArrayValues::$offerTypes));
        /*
  * TODO:
  * Studienplan:
  * 1.
  */
        $builder
            ->add('studienplan_ws', 'choice', array(
                'label' => 'Wintersemester',
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'choices' => ArrayValues::$regelsem))

            ->add('studienplan_ss', 'choice', array(
                'label' => 'Sommersemester',
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'choices' => ArrayValues::$regelsem));
    }

    public function getName()
    {
        return 'vorangebot';
    }
}