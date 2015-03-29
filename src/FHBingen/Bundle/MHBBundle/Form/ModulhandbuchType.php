<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 08.12.2014
 * Time: 16:07
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ModulhandbuchType
 *
 * für Entity:	Modulhandbuch.php
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class ModulhandbuchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beschreibung', 'text', array('label' => 'Beschreibung: ', 'required' => true))
            ->add('gueltigAb', 'entity', array('label' => 'Gültig ab: ', 'required' => true, 'class' => 'FHBingenMHBBundle:Semester'));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'modulhandbuch';
    }
}