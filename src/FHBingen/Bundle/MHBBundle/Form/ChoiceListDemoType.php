<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 30.12.2014
 * Time: 19:27
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ChoiceListDemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('c', 'choice', array(
                'choice_list' => new ChoiceList(array(1, 0.5), array('Full', 'Half')),
                'expanded' => true,
                'multiple' => true
            ));
    }

    public function getName()
    {
        return 'angebot';
    }
}