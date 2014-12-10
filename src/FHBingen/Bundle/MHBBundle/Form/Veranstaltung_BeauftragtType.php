<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 10.12.2014
 * Time: 12:00
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Veranstaltung_BeautfragtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beauftragter', 'entity', array('label' => 'Modulbeauftragter: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Dozent', 'property' => 'email'));
    }

    public function getName()
    {
        return 'Veranstaltung_Beauftragt';
    }
}