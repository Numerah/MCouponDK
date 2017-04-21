<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;


class mheaderType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('couponHeaderLabel', 'text',array(
                    'required'=> false,
                    'label'=>'Label',
                    'max_length'=> '25',
                ))
            ->add('couponHeaderLabelDynamicStatus', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponHeaderValueType','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',
                ))
            ->add('couponHeaderTextValue', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Text)',
                    'max_length'=> '25',
                ))
            ->add('couponHeaderTextDynamicStatus', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponHeaderValueDate','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponHeaderValueTime','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponHeaderValueTimezone','timezone')
            ->add('couponHeaderValueDateFormate','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',
                ))
            ->add('couponHeaderValueTimeFormate','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponHeaderNumberValue', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponHeaderNumberFormate','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)',
                        'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',
                ))
            ->add('couponHeaderCurrencyValue', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponHeaderCurrencyCode','currency')
            ->add('couponHeaderAlignmnet','choice', array(
                    'choices' => array('PKTextAlignmentLeft' => 'Left','PKTextAlignmentCenter' => 'Center',
                        'PKTextAlignmentRight' => 'Right','PKTextAlignmentNatural' => 'Natural'),
                    'label'=>'Alignment',
                ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\mheader'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mheader';
    }
}
