<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;

class mprimaryType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('couponPrimaryFieldLabel', 'text',array(
                    'required'=> false,
                    'label'=>'Label',
                    'max_length'=> '25',
                ))
            ->add('couponPrimaryFieldLabelDynamicStatus', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponPrimaryFieldValueType','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',
                ))
            ->add('couponPrimaryFieldTextValue', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Text)',
                    'max_length'=> '25',
                ))
            ->add('couponPrimaryFieldTextDynamicStatus', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponPrimaryFieldValueDate','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponPrimaryFieldValueTime','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponPrimaryFieldValueTimezone','timezone')
            ->add('couponPrimaryFieldValueDateFormate','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',
                ))
            ->add('couponPrimaryFieldValueTimeFormate','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponPrimaryFieldNumberValue', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponPrimaryFieldNumberFormate','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)',
                        'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',
                ))
            ->add('couponPrimaryFieldCurrencyValue', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponPrimaryFieldCurrencyCode','currency')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\mprimary'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mprimary';
    }
}
