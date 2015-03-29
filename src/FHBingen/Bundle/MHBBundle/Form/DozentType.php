<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 08.12.2014
 * Time: 11:05
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use FHBingen\Bundle\MHBBundle\PHP\ArrayValues;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class DozentType
 *
 * für Entity:	Dozent.php
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class DozentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'))
            ->add('anrede', 'choice', array('label' => 'Anrede: ', 'required' => true, 'choices' => ArrayValues::$gender))
            ->add('titel', 'text', array('label' => 'Titel: ', 'required' => false))
            ->add('name', 'text', array('label' => 'Vorname: ', 'required' => true))
            ->add('nachname', 'text', array('label' => 'Nachname: ', 'required' => true))
            ->add('email', 'email', array('label' => 'Email: ', 'required' => true))
            //->add('password', 'text', array('label' => 'Passwort: ', 'required' => true))
            //->add('reset', 'reset', array('label' => 'zurücksetzen', 'attr' => array('class' =>'btn btn-default')))
            //->add('submit', 'submit', array('label' => 'abschicken', 'attr' => array('class' =>'btn btn-default')))
            ;
    }

    /**
     * @param FormEvent $event
     */
    public function onPreSetData(FormEvent $event)
    {
        $input = $event->getData();
        $form = $event->getForm();

        $roles = $input->getRoles();
        $role = $roles[0]; //Notwendig wegen UserDependentRole

        $form->add('roles', 'entity', array(
            'label' => 'Position: ',
            'required' => true,
            'class' => 'FHBingenMHBBundle:Role',
            'data' => $role));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Dozent'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dozent';
    }
}