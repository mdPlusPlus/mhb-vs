<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 28.01.2015
 * Time: 11:32
 */

namespace FHBingen\Bundle\MHBBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class VoraussetzungType
 *
 * für Entity:	Modulvoraussetzung.php
 *
 * @package FHBingen\Bundle\MHBBundle\Form
 */
class VoraussetzungType extends AbstractType
{
    private $modulID;

    /**
     * @param int $modulID
     */
    public function __construct($modulID)
    {
        $this->modulID = $modulID;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('voraussetzung', 'entity', array('label' => 'Vorrausgesetztes Modul:', 'required'=> false, 'class' => 'FHBingenMHBBundle:Veranstaltung',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->where('s.Modul_ID!='.$this->modulID)
                        ->OrderBy('s.Name', 'ASC');
                },));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FHBingen\Bundle\MHBBundle\Entity\Modulvoraussetzung'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'grundmodul';
    }
}