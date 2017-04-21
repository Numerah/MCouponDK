<?php

namespace apb\appassBundle\Form;

use DCS\Form\GeoFormFieldBundle\DependencyInjection\DCSFormGeoFormFieldExtension;
use DCS\Form\GeoFormFieldBundle\Form\Type\GeocodeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;

class mrelevanceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('couponRelevanceLocationTotalFields','choice', array(
                    'choices' => array('0' => '0','1' => '1','2' => '2', '3' => '3','4' => '4',
                        '5' => '5','6' => '6','7' => '7', '8' => '8','9' => '9', '10'=>'10'),
                    'label'=>'Total Relevant Locations',
                ))
            ->add('couponRelevanceLocationAddressOne','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                ))
            ->add('couponRelevanceLocationTextOne', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusOne','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationAddressTwo','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                    'label'=>'Relevant Address',
                ))
            ->add('couponRelevanceLocationTextTwo', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusTwo','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationAddressThree','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                    'label'=>'Relevant Address',
                ))
            ->add('couponRelevanceLocationTextThree', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusThree','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationAddressFour','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                    'label'=>'Relevant Address',
                ))
            ->add('couponRelevanceLocationTextFour', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusFour','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationAddressFive','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                    'label'=>'Relevant Address',
                ))
            ->add('couponRelevanceLocationTextFive', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusFive','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationAddressSix','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                    'label'=>'Relevant Address',
                ))
            ->add('couponRelevanceLocationTextSix', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusSix','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationAddressSeven','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                    'label'=>'Relevant Address',
                ))
            ->add('couponRelevanceLocationTextSeven', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusSeven','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationAddressEight','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                    'label'=>'Relevant Address',
                ))
            ->add('couponRelevanceLocationTextEight', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusEight','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationAddressNine','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                    'label'=>'Relevant Address',
                ))
            ->add('couponRelevanceLocationTextNine', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusNine','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationAddressTen','text',array(
                    'required'=> false,
                    'attr' => array('style' => 'width: 500px'),
                    'label'=>'Relevant Address',
                ))
            ->add('couponRelevanceLocationTextTen', 'textarea',array(
                'label'=>'Relevant Text',
                'max_length'=> '100',
                'required'=> false,
            ))
            ->add('couponRelevanceLocationTextDynamicStatusTen','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponRelevanceLocationDate','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponRelevanceLocationTime','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponRelevanceLocationTimezone','timezone')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\mrelevance'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mrelevance';
    }
}
