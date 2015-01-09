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

    public function __construct($studiengangID){
        $this->studiengangID = $studiengangID;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('angebotsart', 'choice', array('label' => 'Angebotsart:', 'required' => true, 'choices' => ArrayValues::$offerTypes))
            ->add('fachgebiet', 'entity', array(
                'label' => "Fachgebiet:",
                'required' => true,
                'class' => 'FHBingenMHBBundle:Fachgebiet',
                'query_builder' => function(EntityRepository $er) {
                    //SELECT * FROM `Fachgebiet` WHERE `studiengang` = 2
                    return $er->createQueryBuilder('f')->select('')->where('f.studiengang = ' . $this->studiengangID);
                },

                /*
                 * Vertiefungsrichtungen:
                 * 1. Ist Wahlfach?
                 * 2. Welcher Studiengang?
                 * 3. Welche Verteifungsrichtungen hat der Studiengang?
                 * 4. Modul + Vertiefung -> Kernfach
                 */


            ))

            //TODO Kernfach für Vertiefungsrichtung: xyz
            //->add('kernfach', 'entity', array('label' => 'Kernfach für Vertiefungsrichtung: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Kernfach'))

            ->add('abweichenderNameDE', 'text', array('label' => 'abweichender Titel (Deutsch): ', 'required' => false))
            ->add('abweichenderNameEN', 'text', array('label' => 'abweichender Titel (Englisch): ', 'required' => false));
    }

    public function getName()
    {
        return 'angebot';
    }
}