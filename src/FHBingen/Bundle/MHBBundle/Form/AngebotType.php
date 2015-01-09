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
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

class AngebotType extends AbstractType
{

    protected  $em;

    public function __construct(Doctrine $doctrine)
    {
        $this->em = $doctrine->getManager();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('veranstaltung', 'entity', array('label' => 'Modul: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Veranstaltung'))
            ->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'))
            ->add('studiengang', 'entity', array('label' => 'Studiengang: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Studiengang'))

            ->add('angebotsart', 'choice', array('label' => 'Angebotsart: ', 'required' => true, 'choices' => ArrayValues::$offerTypes))





            //TODO Kernfach für Vertiefungsrichtung: xyz
            //->add('kernfach', 'entity', array('label' => 'Kernfach für Vertiefungsrichtung: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Kernfach'))
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


    public function onPreSetData(FormEvent $event){

            $input = $event->getData();
            $form = $event->getForm();
            $studiengang = $form->get('studiengang')->getData();
            $fachgebiete = $this->$em->getRepository('FHBingenMHBBundle:Fachgebiet')->findBy($studiengang);

//            $form->add('fachgebiet', 'choice', array(
//                'label' => 'Fachgebiet [#]: ',
//                'choices' => $fachgebiete
//            ));

            $form = $event->getForm();
            $data = $event->getData();

            $studiengang = $data->getStudiengang();

            $fachgebiete  = $studiengang->getFachgebiete();
            //$fachgebiete = array('abc' => 'abc');

            $form->add('fachgebiet', 'entity', array('label' => 'Fachgebiet: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Fachgebiet', 'choices' => $fachgebiete));


    }

    public function getName()
    {
        return 'angebot';
    }
}