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

class AngebotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('veranstaltung', 'entity', array('label' => 'Modul: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))

            ->add('studiengang', 'entity', array('label' => 'Studiengang: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))

            ->add('angebotsart', 'choice', array('label' => 'Angebotsart: ', 'required' => true, 'choices' => ArrayValues::$offerTypes))
            ->add('fachgebiet', 'entity', array('label' => 'Fachgebiet: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Fachgebiet'))
            //TODO Kernfach für Vertiefungsrichtung: xyz
            ->add('abweichenderNameDE', 'text', array('label' => 'abweichender Titel (Deutsch): ', 'required' => false))
            ->add('abweichenderNameEN', 'text', array('label' => 'abweichender Titel (Englisch): ', 'required' => false));

            /*
            ->add('ss', 'collection', array('label' => false, 'type' => new StudienplanType(),
                'delete_empty' => true, 'allow_add' => true, 'allow_delete' => true,
                'options' => array(
                    'required' => false,
                    'attr' => array(
                        'class' => 'studienplam'
                    )
                )
            ))
            ->add('ws', 'collection', array('label' => false, 'type' => new StudienplanType(),
                'delete_empty' => true, 'allow_add' => true, 'allow_delete' => true,
                'options' => array(
                    'required' => false,
                    'attr' => array(
                        'class' => 'studienplam'
                    )
                )
            ))
            */
    }

    public function getName()
    {
        return 'angebot';
    }
}