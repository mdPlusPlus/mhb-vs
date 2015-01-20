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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class VorAngebotType extends AbstractType
{
    private $studiengangIDs;
    private $queryString;

    public function __construct($studiengangIDs)
    {
       $this->studiengangIDs = $studiengangIDs;
        $this->queryString = "";

        $max = sizeof($this->studiengangIDs);
        for($i = 0; $i < $max;$i++) {
                    if($i<=$max-2){
                    $this->queryString=$this->queryString. 's.Studiengang_ID=' . $this->studiengangIDs[$i].' or ';
                    }else{
                        $this->queryString =$this->queryString. ' s.Studiengang_ID=' . $this->studiengangIDs[$i];
                    }
                }

    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('modulid', 'hidden', array('required' => true))

            ->add('studiengang', 'entity', array(
                'label' => 'Studiengang: ',
                'required' => true,
                'class' => 'FHBingenMHBBundle:Studiengang',
                //TODO (Ingmar): nur Studiengänge anzeigen, in denen es noch nicht angeboten wird (jedenfalls bei "in weiterem Studiengang anbieten")
                                    'query_builder' => function(EntityRepository $er) {
                                        $qb= $er->createQueryBuilder('s');
                                        foreach ($this->studiengangIDs as $id) {
                                            $qb->where($this->queryString);

                                        }
                                         return $qb;
                                    },))




            ->add('angebotsart', 'choice', array('label' => 'Angebotsart:', 'required' => true, 'choices' => ArrayValues::$offerTypes))

            ->add('studienplan_ws', 'choice', array(
                'label' => 'Regelsemester bei Start in Wintersemester',
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'choices' => ArrayValues::$regelsem))

            ->add('studienplan_ss', 'choice', array(
                'label' => 'Regelsemester bei Start in Sommersemester',
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'choices' => ArrayValues::$regelsem));
    }

    public function getName()
    {
        return 'vorangebot';
    }
}