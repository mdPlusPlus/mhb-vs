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

/**
 * Class VeranstaltungHistoryType
 *
 * für Entity:	VeranstaltungHistory.php
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class VeranstaltungHistoryType extends AbstractType
{
    private $modulID;
    private $version;

    /**
     * @param int $modulID
     * @param int $version
     */
    public function __construct($modulID, $version)
    {
        $this->modulID = $modulID;
        $this->version =$version;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));

        $builder
            ->add('kuerzel', 'text', array('label' => 'Modulkürzel [#]: ', 'required' => true))
            ->add('name', 'text', array('label' => 'Modulname (deutsch) [#]: ', 'required' => true, 'attr' => array('class' => 'modulNameClass', 'maxlength' => '70')))
            ->add('nameEN', 'text', array('label' => 'Modulname (englisch) [#]: ', 'required' => true, 'attr' => array('class' => 'modulNameClass', 'maxlength' => '70')))
            ->add('haeufigkeit', 'choice', array('label' => 'Häufigkeit des Angebots [#]: ', 'required' => true, 'choices' => ArrayValues::$frequency))
            ->add('kontaktzeitVL', 'integer', array('label' => 'Kontaktzeit Vorlesung (in Stunden) [#]: ', 'required' => true, 'attr' => array('min' => '0')))
            ->add('kontaktzeitSonstige', 'integer', array('label' => 'Kontaktzeit sonstige (in Stunden) [#]: ', 'required' => true, 'attr' => array('min' => '0')))
            ->add('selbststudium', 'integer', array('label' => false, 'required' => true, 'attr' => array('min' => '0', 'hidden' => true)))
            ->add('gruppengroesse', 'integer', array('label' => 'Gruppengröße [#]: ', 'required' => true, 'attr' => array('min' => '0')))
            ->add('lernergebnisse', 'textarea', array('label' => 'Lernergebnisse [#]: ', 'required' => true, 'attr' => array('class' => 'textAreaClass')))
            ->add('inhalte', 'textarea', array('label' => 'Lehrinhalte [#]: ', 'required' => true, 'attr' => array('class' => 'textAreaClass')))
            ->add('sprache', 'choice', array('label' => 'Sprache [#]: ', 'required' => true, 'choices' => ArrayValues::$lang))
            ->add('SpracheSonstiges', 'text', array('label' => 'Sprache Sonstiges: ', 'required' => false, 'attr' => array('class' => 'sonstigesClass')))
            ->add('literatur', 'textarea', array('label' => 'Literaturverweise [#]: ', 'required' => true, 'attr' => array('class' => 'textAreaClass')))
            ->add('leistungspunkte', 'choice', array('label' => 'Leistungspunkte [#]: ', 'required' => true, 'choices' => ArrayValues::$lp))
            ->add('voraussetzungInh', 'textarea', array('label' => 'Voraussetzung inhaltlich [#]: ', 'required' => true, 'attr' => array('class' => 'textAreaClass')))
            ->add('erlaeuterungenLP', 'text', array('label' => 'Erläuterungen zur Vergabe von LP:', 'required' => false, 'attr' => array('class' => 'sonstigesClass')));

    }

    /**
     * @param FormEvent $event
     */
    public function onPreSetData(FormEvent $event)
    {
        $input = $event->getData();
        $form = $event->getForm();
        $encoder = new JsonEncoder();

        $lehrform = $input->getLehrform();
        $lehrformOptions = array('label' => 'Lehrformen:', 'required' => false);
        if($lehrform == null){
            $lehrformOptions['data'] = 'Vorlesungen mit Tafel und Videoprojektion'; //default
        }
        $form->add('lehrform', 'textarea', $lehrformOptions);

        $dauer = $input->getDauer();
        $dauerOptions = array('label' => 'Dauer:', 'required' => false, 'attr' => array('min' => '1'));
        if ($dauer == null) {
            $dauerOptions['data'] = 1; //default
        } else {
            $dauerOptions['data'] = intval(explode(' ', $input->getDauer())[0]); //splitte getDauer()
        }
        $form->add('dauer', 'integer', $dauerOptions);

        $vorausetzungLP = $input->getVoraussetzungLP();
        $pruefungsformen = $input->getPruefungsformen();
        $lehrveranstaltungen = $input->getLehrveranstaltungen();

        $voraussetzungLPChoiceOptions = array(
            'label' => 'Voraussetzung für Leistungspunkte:',
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
            'label' => 'Prüfungsform:',
            'choices' => ArrayValues::$pruefungsformen,
            'multiple' => true,
            'expanded' => true,
        );

        if (!is_null($pruefungsformen)) {
            $pruefungsformen = $encoder->decode($pruefungsformen, 'json');
            $pruefungsformenChoiceOptions['data'] = $pruefungsformen;
        }
        $form->add('pruefungsformen', 'choice', $pruefungsformenChoiceOptions);
        $form->add('PruefungsformSonstiges', 'text', array('label' => 'Sonstige Prüfungsform:', 'required' => false, 'attr' => array('class' => 'sonstigesClass')));


        $lehrveranstaltungenChoiceOptions = array(
            'label' => 'Lehrveranstaltungen:',
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

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\VeranstaltungHistory'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'veranstaltung';
    }
}