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
            ->add('veranstaltung', 'entity', array('label' => 'ModulName: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('mhb', 'entity', array('label' => 'MHB_beschreibung: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Modulhandbuch'))
            ->add('fachgebiet', 'entity', array('label' => 'FachgebietTitel: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Fachgebiet'))
            ->add('studiengang', 'entity', array('label' => 'StudiengangTitel: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))
            ->add('angebotsart', 'choice', array('label' => 'Angebotsart: ', 'required' => true, 'choices' => ArrayValues::$offerTypes))
            ->add('code', 'text', array('label' => 'Code: ', 'required' => true))
            ->add('titelDE', 'text', array('label' => 'abweichender_Titel(Deutsch): ', 'required' => false))
            ->add('titelEN', 'text', array('label' => 'abweichender_Titel(Englisch): ', 'required' => false))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'angebot';
    }
}