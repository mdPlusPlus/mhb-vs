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

/**
 * Class AngebotType
 *
 * für Entity:	Angebot.php
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class AngebotType extends AbstractType
{
    private $studiengangID;
    private $isWahl;

    /**
     * @param int  $studiengangID
     * @param bool $isWahl
     */
    public function __construct($studiengangID, $isWahl)
    {
        $this->studiengangID = $studiengangID;
        $this->isWahl = $isWahl;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fachgebiet', 'entity', array(
                'label' => "Fachgebiet:",
                'required' => true,
                'class' => 'FHBingenMHBBundle:Fachgebiet',
                'query_builder' => function(EntityRepository $er) {
                    if ($this->isWahl) {
                        return $er->createQueryBuilder('f')->select('')->where('f.studiengang = ' . $this->studiengangID, 'f.Titel like \'%Wahlpflicht%\' ');
                    } else {
                        return $er->createQueryBuilder('f')->select('')->where('f.studiengang = ' . $this->studiengangID, 'f.Titel not like \'%Wahlpflicht%\'');
                    }
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

        $builder
            ->add('abweichenderNameDE', 'text', array('label' => 'abweichender Titel (Deutsch): ', 'required' => false, 'attr' => array('class' => 'sonstigesClass', 'maxlength' => '70')))
            ->add('abweichenderNameEN', 'text', array('label' => 'abweichender Titel (Englisch): ', 'required' => false, 'attr' => array('class' => 'sonstigesClass', 'maxlength' => '70')));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'angebot';
    }
}