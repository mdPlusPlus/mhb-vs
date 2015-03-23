<?php
/**
 * Created by PhpStorm.
 * User: Mishca
 * Date: 28.12.2014
 * Time: 13:40
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use FHBingen\Bundle\MHBBundle\PHP\ArrayValues;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

/**
 * Class PlanungType
 *
 * für Entity:	Veranstaltung.php
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class PlanungType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'))
            ->add('kuerzel', 'text', array('label' => 'Modulkürzel: ', 'required' => false))
            ->add('name', 'text', array('label' => 'Modulname (deutsch) [#]: ', 'required' => true, 'attr' => array('class' => 'modulNameClass', 'maxlength' => '70')))
            ->add('nameEN', 'text', array('label' => 'Modulname (englisch): ', 'required' => false, 'attr' => array('class' => 'modulNameClass', 'maxlength' => '70')))
            ->add('selbststudium', 'integer', array('label' => false, 'required' => false, 'attr' => array('min' => '0', 'hidden' => true)))
            ->add('lernergebnisse', 'textarea', array('label' => 'Lernergebnisse: ', 'required' => false, 'attr' => array('class' => 'textAreaClass')))
            ->add('inhalte', 'textarea', array('label' => 'Lehrinhalte: ', 'required' => false, 'attr' => array('class' => 'textAreaClass')))
            ->add('literatur', 'textarea', array('label' => 'Literaturverweise: ', 'required' => false, 'attr' => array('class' => 'textAreaClass')))
            ->add('PruefungsformSonstiges', 'text', array('label' => 'Sonstige Prüfungsform:', 'required' => false, 'attr' => array('class' => 'sonstigesClass')));
            //->add('StudienleistungSonstiges', 'text', array('label' => 'weitere Angaben zur Studienleistung', 'required' => false, 'attr' => array('class' => 'sonstigesClass')));
    }

    /**
     * @param FormEvent $event
     */
    public function onPreSetData(FormEvent $event)
    {
        $input = $event->getData();
        $form = $event->getForm();
        $encoder = new JsonEncoder();

        $haeufigkeit = $input->getHaeufigkeit();
        $haeufigkeitOptions = array(
            'label' => 'Häufigkeit des Angebots:',
            'required' => false,
            'choices' => ArrayValues::$frequency,
        );
        if ($haeufigkeit == null) {
            $haeufigkeitOptions['data'] = 'Sommersemester'; //default
        }
        $form->add('haeufigkeit', 'choice', $haeufigkeitOptions);

        $dauer = $input->getDauer();
        $dauerOptions = array('label' => 'Dauer:', 'required' => false, 'attr' => array('min' => '1'));
        if ($dauer == null) {
            $dauerOptions['data'] = 1; //default
        } else {
            $dauerOptions['data'] = intval(explode(' ', $input->getDauer())[0]); //splitte getDauer()
        }
        $form->add('dauer', 'integer', $dauerOptions);

        $lp = $input->getLeistungspunkte();
        $lpOptions = array(
            'label' => 'Leistungspunkte: ',
            'required' => false,
            'choices' => ArrayValues::$lp
        );
        if ($lp == null) {
           $lpOptions['data'] = '6'; //default
        }
        $form->add('leistungspunkte', 'choice', $lpOptions);

        $kontaktzeitVL = $input->getKontaktzeitVL();
        $kontaktzeitVLOptions = array('label' => 'Kontaktzeit Vorlesung (in Stunden):', 'required' => false, 'attr' => array('min' => '0'));
        if ($kontaktzeitVL == null) {
           $kontaktzeitVLOptions['data'] = 30; //default
        }
        $form->add('kontaktzeitVL', 'integer', $kontaktzeitVLOptions);

        $kontaktzeitSonstige = $input->getKontaktzeitSonstige();
        $kontaktzeitSonstigeOptions = array('label' => 'Kontaktzeit sonstige: (in Stunden)', 'required' => false, 'attr' => array('min' => '0'));
        if ($kontaktzeitSonstige == null) {
           $kontaktzeitSonstigeOptions['data'] = 30; //default
        }
        $form->add('kontaktzeitSonstige', 'integer', $kontaktzeitSonstigeOptions);

        $gruppengroesse = $input->getGruppengroesse();
        $gruppengroesseOptions = array('label' => 'Gruppengröße:', 'required' => false, 'attr' => array('min' => '0'));
        if ($gruppengroesse == null) {
           $gruppengroesseOptions['data'] = 25; //default
        }
        $form->add('gruppengroesse', 'integer', $gruppengroesseOptions);

        $sprache = $input->getSprache();
        $spracheOptions = array(
            'label' => 'Sprache: ',
            'required' => false,
            'choices' => ArrayValues::$lang
        );
        if ($sprache == null) {
            $spracheOptions['data'] = 'Deutsch'; //default
        }
        $form->add('sprache', 'choice', $spracheOptions);

        $spracheSonstiges = $input->getSpracheSonstiges();
        $spracheSonstigesOptions = array('label' => 'Sprache Sonstiges: ', 'required' => false, 'attr' => array('class' => 'sonstigesClass'));
        if ($spracheSonstiges == null) {
            $spracheSonstigesOptions['data'] = 'einzelne Abschnitte in Englisch'; //default
        }
        $form->add('SpracheSonstiges', 'text', $spracheSonstigesOptions);

        $vorausetzungInh = $input->getVoraussetzungInh();
        $vorausetzungInhOptions = array('label' => 'Voraussetzung inhaltlich: ', 'required' => false, 'attr' => array('class' => 'textAreaClass'));
        if ($vorausetzungInh == null) {
            $vorausetzungInhOptions['data'] = 'keine';
        }
        $form->add('voraussetzungInh', 'textarea', $vorausetzungInhOptions);

        $lehrveranstaltungen = $input->getLehrveranstaltungen();
        $lehrveranstaltungenOptions = array(
            'label' => 'Lehrveranstaltungen: ',
            'choices' => ArrayValues::$lehrveranstaltungen,
            'multiple' => true,
            'expanded' => true,
        );
        if (!is_null($lehrveranstaltungen)) {
            $lehrveranstaltungen = $encoder->decode($lehrveranstaltungen, 'json');
            $lehrveranstaltungenOptions['data'] = $lehrveranstaltungen;
        } else {
            $lehrveranstaltungenOptions['data'] = array('Vorlesung' => 'Vorlesung', 'Übung' => 'Übung'); //default
        }
        $form->add('lehrveranstaltungen', 'choice', $lehrveranstaltungenOptions);

        $pruefungsformen = $input->getPruefungsformen();
        $pruefungsformenOptions = array(
            'label' => 'Prüfungsform:',
            'choices' => ArrayValues::$pruefungsformen,
            'multiple' => true,
            'expanded' => true,
        );
        if (!is_null($pruefungsformen)) {
            $pruefungsformen = $encoder->decode($pruefungsformen, 'json');
            $pruefungsformenOptions['data'] = $pruefungsformen;
        } else {
            $pruefungsformenOptions['data'] = array('Schriftliche Klausur' => 'Schriftliche Klausur'); //default
        }
        $form->add('pruefungsformen', 'choice', $pruefungsformenOptions);

        $vorausetzungLP = $input->getVoraussetzungLP();
        $voraussetzungLPOptions = array(
            'label' => 'Voraussetzung für Leistungspunkte:',
            'choices' => ArrayValues::$voraussetzungLP,
            'multiple' => true,
            'expanded' => true
        );
        if (!is_null($vorausetzungLP)) {
            $vorausetzungLP = $encoder->decode($vorausetzungLP, 'json');
            $voraussetzungLPOptions['data'] = $vorausetzungLP;
        } else {
            $voraussetzungLPOptions['data'] = array('Prüfungsleistung' => 'Prüfungsleistung'); //default
        }
        $form->add('voraussetzungLP', 'choice', $voraussetzungLPOptions);

        $pruefungsungsleistungSonstiges = $input->getPruefungsleistungSonstiges();
        $pruefungsungsleistungSonstigesOptions = array('label' => 'Erläuterungen', 'required' => false, 'attr' => array('class' => 'sonstigesClass'));
        if ($pruefungsungsleistungSonstiges == null) {
            $pruefungsungsleistungSonstigesOptions['data'] = 'Bestandene Modulprüfung'; //default
        }
        $form->add('PruefungsleistungSonstiges', 'text', $pruefungsungsleistungSonstigesOptions);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Veranstaltung'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'planung';
    }
}