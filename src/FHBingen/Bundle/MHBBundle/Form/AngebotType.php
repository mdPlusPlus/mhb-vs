<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 08.12.2014
 * Time: 15:23
 */
namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AngebotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $type_of_offer = ['Wahlpflichtfach' => 'Wahlpflichtfach', 'Pflichtfach' => 'Pflichtfach'];

        $builder
            ->add('module', 'entity', array('label' => 'ModulName: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->add('mhb', 'entity', array('label' => 'MHB_beschreibung: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Modulhandbuch'))
            ->add('fachgebiet', 'entity', array('label' => 'FachgebietTitel: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Fachgebiet'))
            ->add('studiengang', 'entity', array('label' => 'StudiengangTitel: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))
            ->add('angebotsart', 'choice', array('label' => 'Angebotsart: ', 'required' => true, 'choices' => $type_of_offer))
            ->add('code', 'text', array('label' => 'Code: ', 'required' => true))
            ->add('abweichender_Titel_DE', 'text', array('label' => 'abweichender_Titel(Deutsch): ', 'required' => false))
            ->add('abweichender_Titel_EN', 'text', array('label' => 'abweichender_Titel(Englisch): ', 'required' => false))
            ->add('reset', 'reset')
            ->add('submit', 'submit');
    }

    public function getName()
    {
        return 'angebot';
    }
}