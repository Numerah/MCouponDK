<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;

class mauxiliaryType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('couponAuxiliaryFieldTotalFields','choice', array(
            'choices' => array('0' => '0','1' => '1','2' => '2', '3' => '3','4' => '4'),
            'label'=>'Total Secondary Fields',))
            ->add('couponAuxiliaryFieldLabelOne', 'text',array(
                    'required'=> false,
                    'label'=>'Label',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldLabelDynamicStatusOne', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponAuxiliaryFieldValueTypeOne','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',
                    'max_length'=> '25',))
            ->add('couponAuxiliaryFieldTextValueOne', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Text)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldTextDynamicStatusOne', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponAuxiliaryFieldValueDateOne','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponAuxiliaryFieldValueTimeOne','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponAuxiliaryFieldValueTimezoneOne',new TimezoneType())
            ->add('couponAuxiliaryFieldValueDateFormateOne','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',))
            ->add('couponAuxiliaryFieldValueTimeFormateOne','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponAuxiliaryFieldNumberValueOne', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldNumberFormateOne','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)', 'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',

                ))
            ->add('couponAuxiliaryFieldCurrencyValueOne', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldCurrencyCodeOne','currency')
            ->add('couponAuxiliaryFieldAlignmnetOne','choice', array(
                    'choices' => array('PKTextAlignmentLeft' => 'Left','PKTextAlignmentCenter' => 'Center',
                        'PKTextAlignmentRight' => 'Right','PKTextAlignmentNatural' => 'Natural'),
                    'label'=>'Alignment',))

            ->add('couponAuxiliaryFieldLabelTwo', 'text',array(
                    'required'=> false,
                    'label'=>'Label',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldLabelDynamicStatusTwo', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponAuxiliaryFieldValueTypeTwo','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',))
            ->add('couponAuxiliaryFieldTextValueTwo', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Text)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldTextDynamicStatusTwo', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponAuxiliaryFieldValueDateTwo','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponAuxiliaryFieldValueTimeTwo','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponAuxiliaryFieldValueTimezoneTwo',new TimezoneType())
            ->add('couponAuxiliaryFieldValueDateFormateTwo','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',))
            ->add('couponAuxiliaryFieldValueTimeFormateTwo','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponAuxiliaryFieldNumberValueTwo', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldNumberFormateTwo','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)',
                        'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',
                ))
            ->add('couponAuxiliaryFieldCurrencyValueTwo', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldCurrencyCodeTwo','currency')
            ->add('couponAuxiliaryFieldAlignmnetTwo','choice', array(
                    'choices' => array('PKTextAlignmentLeft' => 'Left','PKTextAlignmentCenter' => 'Center',
                        'PKTextAlignmentRight' => 'Right','PKTextAlignmentNatural' => 'Natural'),
                    'label'=>'Alignment',))

            ->add('couponAuxiliaryFieldLabelThree', 'text',array(
                    'required'=> false,
                    'label'=>'Label',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldLabelDynamicStatusThree', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponAuxiliaryFieldValueTypeThree','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',
                ))
            ->add('couponAuxiliaryFieldTextValueThree', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Text)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldTextDynamicStatusThree', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponAuxiliaryFieldValueDateThree','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponAuxiliaryFieldValueTimeThree','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponAuxiliaryFieldValueTimezoneThree',new TimezoneType())
            ->add('couponAuxiliaryFieldValueDateFormateThree','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',
                ))
            ->add('couponAuxiliaryFieldValueTimeFormateThree','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponAuxiliaryFieldNumberValueThree', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldNumberFormateThree','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)',
                        'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',
                ))
            ->add('couponAuxiliaryFieldCurrencyValueThree', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldCurrencyCodeThree','currency')
            ->add('couponAuxiliaryFieldAlignmnetThree','choice', array(
                    'choices' => array('PKTextAlignmentLeft' => 'Left','PKTextAlignmentCenter' => 'Center',
                        'PKTextAlignmentRight' => 'Right','PKTextAlignmentNatural' => 'Natural'),
                    'label'=>'Alignment',))

            ->add('couponAuxiliaryFieldLabelFour', 'text',array(
                    'required'=> false,
                    'label'=>'Label',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldLabelDynamicStatusFour', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponAuxiliaryFieldValueTypeFour','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',
                ))
            ->add('couponAuxiliaryFieldTextValueFour', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Text)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldTextDynamicStatusFour', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponAuxiliaryFieldValueDateFour','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponAuxiliaryFieldValueTimeFour','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponAuxiliaryFieldValueTimezoneFour',new TimezoneType())
            ->add('couponAuxiliaryFieldValueDateFormateFour','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',
                ))
            ->add('couponAuxiliaryFieldValueTimeFormateFour','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponAuxiliaryFieldNumberValueFour', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldNumberFormateFour','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)',
                        'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',
                ))
            ->add('couponAuxiliaryFieldCurrencyValueFour', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponAuxiliaryFieldCurrencyCodeFour','currency')
            ->add('couponAuxiliaryFieldAlignmnetFour','choice', array(
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
            'data_class' => 'apb\appassBundle\Entity\mauxiliary'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mauxiliary';
    }
}
