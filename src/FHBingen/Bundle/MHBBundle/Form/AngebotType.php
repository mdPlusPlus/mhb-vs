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

class AngebotType extends AbstractType
{
    private $studiengangID;
    private $isWahl;

    public function __construct($studiengangID, $isWahl){
        $this->studiengangID = $studiengangID;
        $this->isWahl = $isWahl;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fachgebiet', 'entity', array(
                'label' => "Fachgebiet:",
                'required' => true,
                'class' => 'FHBingenMHBBundle:Fachgebiet',
                'query_builder' => function(EntityRepository $er) {
                    //SELECT * FROM `Fachgebiet` WHERE `studiengang` = 2
                    return $er->createQueryBuilder('f')->select('')->where('f.studiengang = ' . $this->studiengangID);
                },
            ));

        if ($this->isWahl) {
            $builder->add('kernfach', 'entity', array(
                'label' => "Kernfach in diesen Vertiefungsrichtungen:",
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'class' => 'FHBingenMHBBundle:Vertiefung',
                'query_builder' => function(EntityRepository $er) {
                    //SELECT * FROM `Fachgebiet` WHERE `studiengang` = 2
                    return $er->createQueryBuilder('v')->select('')->where('v.studiengang = ' . $this->studiengangID);
                },
            ));
        }

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
                  'choices' => ArrayValues::$regelsem))


            ->add('abweichenderNameDE', 'text', array('label' => 'abweichender Titel (Deutsch): ', 'required' => false))
            ->add('abweichenderNameEN', 'text', array('label' => 'abweichender Titel (Englisch): ', 'required' => false));
    }

    public function getName()
    {
        return 'angebot';
    }
}