<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 08.12.2014
 * Time: 13:40
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use FHBingen\Bundle\MHBBundle\PHP\ArrayValues;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

class VeranstaltungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'))
            ->add('beauftragter', 'entity', array('label' => "Modulbeauftragter [#]: ", 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent'))
            ->add('kuerzel', 'text', array('label' => 'Modulkürzel [#]: ', 'required' => true))
            ->add('name', 'text', array('label' => 'Modulname (deutsch) [#]: ', 'required' => true, 'attr' => array('class' => 'modulNameClass', 'maxlength' => '70')))
            ->add('nameEN', 'text', array('label' => 'Modulname (englisch) [#]: ', 'required' => true, 'attr' => array('class' => 'modulNameClass', 'maxlength' => '70')))
            ->add('haeufigkeit', 'choice', array('label' => 'Häufigkeit des Angebots [#]: ', 'required' => true, 'choices' => ArrayValues::$frequency))
            ->add('dauer', 'integer', array('label' => 'Dauer [#]: ', 'required' => true, 'attr' => array('min' => '1')))
            ->add('kontaktzeitVL', 'integer', array('label' => 'Kontaktzeit Vorlesung [#]: ', 'required' => true, 'attr' => array('min' => '0')))
            ->add('kontaktzeitSonstige', 'integer', array('label' => 'Kontaktzeit sonstige [#]: ', 'required' => true, 'attr' => array('min' => '0')))
            ->add('selbststudium', 'integer', array('label' => 'Selbststudium [#]: ', 'required' => true, 'attr' => array('min' => '0')))
            ->add('gruppengroesse', 'integer', array('label' => 'Gruppengröße [#]: ', 'required' => true, 'attr' => array('min' => '0')))
            ->add('lernergebnisse', 'textarea', array('label' => 'Lernergebisse [#]: ', 'required' => true, 'attr' => array('class' => 'textAreaClass')))
            ->add('inhalte', 'textarea', array('label' => 'Lehrinhalte [#]: ', 'required' => true, 'attr' => array('class' => 'textAreaClass')))
            ->add('sprache', 'choice', array('label' => 'Sprache [#]: ', 'required' => true, 'choices' => ArrayValues::$lang))
            ->add('SpracheSonstiges', 'text', array('label' => 'Sprache Sonstiges: ', 'required' => false))
            ->add('literatur', 'textarea', array('label' => 'Literaturverweise [#]: ', 'required' => true, 'attr' => array('class' => 'textAreaClass')))
            ->add('leistungspunkte', 'choice', array('label' => 'Leistungspunkte [#]: ', 'required' => true, 'choices' => ArrayValues::$lp))
            ->add('voraussetzungInh', 'textarea', array('label' => 'Voraussetzung inhaltlich [#]: ', 'required' => true, 'attr' => array('class' => 'textAreaClass')))

            //Merge mit Lehrenden

            ->add('modul', 'collection', array('label' => false, 'type' => new LehrendeType(),
                'delete_empty' => true, 'allow_add' => true, 'allow_delete' => true,
                'options' => array(
                    'required' => false,
                    'attr' => array(
                        'class' => 'lehrende'
                    )
                )
            ));
    }

    public function onPreSetData(FormEvent $event)
    {
        $input = $event->getData();
        $form = $event->getForm();
        $encoder = new JsonEncoder();

        $vorausetzungLP = $input->getVoraussetzungLP();
        $pruefungsformen = $input->getPruefungsformen();
        $lehrveranstaltungen = $input->getLehrveranstaltungen();

        $voraussetzungLPChoiceOptions = array(
            'label' => 'Voraussetzung für Leistungspunkte: ',
            'choices' => ArrayValues::$voraussetzungLP,
            'multiple' => true,
            'expanded' => true
        );

        if (!is_null($vorausetzungLP)) {
            $vorausetzungLP = $encoder->decode($vorausetzungLP, 'json');
            $voraussetzungLPChoiceOptions['data'] = $vorausetzungLP;
        }
        $form->add('voraussetzungLP', 'choice', $voraussetzungLPChoiceOptions);


        $pruefungsformenChoiceOptions = array(
            'label' => 'Prüfungsform: ',
            'choices' => ArrayValues::$pruefungsformen,
            'multiple' => true,
            'expanded' => true,
        );

        if (!is_null($pruefungsformen)) {
            $pruefungsformen = $encoder->decode($pruefungsformen, 'json');
            $pruefungsformenChoiceOptions['data'] = $pruefungsformen;
        }
        $form->add('pruefungsformen', 'choice', $pruefungsformenChoiceOptions);
        $form->add('PruefungsformSonstiges', 'text', array('label' => 'Pruefungsform Sonstiges: ', 'required' => false));


        $lehrveranstaltungenChoiceOptions = array(
            'label' => 'Lehrveranstaltungen: ',
            'choices' => ArrayValues::$lehrveranstaltungen,
            'multiple' => true,
            'expanded' => true,
        );

        if (!is_null($lehrveranstaltungen)) {
            $lehrveranstaltungen = $encoder->decode($lehrveranstaltungen, 'json');
            $lehrveranstaltungenChoiceOptions['data'] = $lehrveranstaltungen;
        }
        $form->add('lehrveranstaltungen', 'choice', $lehrveranstaltungenChoiceOptions);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Veranstaltung'
        ));
    }

    public function getName()
    {
        return 'veranstaltung';
    }
}