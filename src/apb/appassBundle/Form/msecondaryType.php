<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;

class msecondaryType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('couponSecondaryFieldTotalFields','choice', array(
            'choices' => array('0' => '0','1' => '1','2' => '2', '3' => '3','4' => '4'),
            'label'=>'Total Secondary Fields',))
            ->add('couponSecondaryFieldLabelOne', 'text',array(
                    'required'=> false,
                    'max_length'=> '25',
                    'label'=>'Label',
                ))
            ->add('couponSecondaryFieldLabelDynamicStatusOne', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponSecondaryFieldValueTypeOne','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',
                ))
            ->add('couponSecondaryFieldTextValueOne', 'text',array(
                    'required'=> false,
                    'max_length'=> '25',
                    'label'=>'Value(Text)',
                ))
            ->add('couponSecondaryFieldTextDynamicStatusOne', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponSecondaryFieldValueDateOne','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponSecondaryFieldValueTimeOne','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponSecondaryFieldValueTimezoneOne','timezone')
            ->add('couponSecondaryFieldValueDateFormateOne','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',
                ))
            ->add('couponSecondaryFieldValueTimeFormateOne','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponSecondaryFieldNumberValueOne', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldNumberFormateOne','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)',
                        'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',
                ))
            ->add('couponSecondaryFieldCurrencyValueOne', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldCurrencyCodeOne','currency')
            ->add('couponSecondaryFieldAlignmnetOne','choice', array(
                    'choices' => array('PKTextAlignmentLeft' => 'Left','PKTextAlignmentCenter' => 'Center',
                        'PKTextAlignmentRight' => 'Right','PKTextAlignmentNatural' => 'Natural'),
                    'label'=>'Alignment',
                ))

            ->add('couponSecondaryFieldLabelTwo', 'text',array(
                    'required'=> false,
                    'label'=>'Label',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldLabelDynamicStatusTwo', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponSecondaryFieldValueTypeTwo','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',
                ))
            ->add('couponSecondaryFieldTextValueTwo', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Text)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldTextDynamicStatusTwo', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponSecondaryFieldValueDateTwo','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponSecondaryFieldValueTimeTwo','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponSecondaryFieldValueTimezoneTwo','timezone')
            ->add('couponSecondaryFieldValueDateFormateTwo','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',
                ))
            ->add('couponSecondaryFieldValueTimeFormateTwo','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponSecondaryFieldNumberValueTwo', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldNumberFormateTwo','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)',
                        'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',
                ))
            ->add('couponSecondaryFieldCurrencyValueTwo', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldCurrencyCodeTwo','currency')
            ->add('couponSecondaryFieldAlignmnetTwo','choice', array(
                    'choices' => array('PKTextAlignmentLeft' => 'Left','PKTextAlignmentCenter' => 'Center',
                        'PKTextAlignmentRight' => 'Right','PKTextAlignmentNatural' => 'Natural'),
                    'label'=>'Alignment',
                ))

            ->add('couponSecondaryFieldLabelThree', 'text',array(
                    'required'=> false,
                    'label'=>'Label',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldLabelDynamicStatusThree', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponSecondaryFieldValueTypeThree','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',
                ))
            ->add('couponSecondaryFieldTextValueThree', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Text)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldTextDynamicStatusThree', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponSecondaryFieldValueDateThree','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponSecondaryFieldValueTimeThree','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponSecondaryFieldValueTimezoneThree','timezone')
            ->add('couponSecondaryFieldValueDateFormateThree','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',
                ))
            ->add('couponSecondaryFieldValueTimeFormateThree','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponSecondaryFieldNumberValueThree', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldNumberFormateThree','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)',
                        'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',
                ))
            ->add('couponSecondaryFieldCurrencyValueThree', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldCurrencyCodeThree','currency')
            ->add('couponSecondaryFieldAlignmnetThree','choice', array(
                    'choices' => array('PKTextAlignmentLeft' => 'Left','PKTextAlignmentCenter' => 'Center',
                        'PKTextAlignmentRight' => 'Right','PKTextAlignmentNatural' => 'Natural'),
                    'label'=>'Alignment',
                ))

            ->add('couponSecondaryFieldLabelFour', 'text',array(
                    'required'=> false,
                    'label'=>'Label',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldLabelDynamicStatusFour', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponSecondaryFieldValueTypeFour','choice', array(
                    'choices' => array('text' => 'Text','datentime' => 'Date and Time',
                        'number' => 'Number','currency' => 'Currency'),
                    'label'=>'Type',
                ))
            ->add('couponSecondaryFieldTextValueFour', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Text)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldTextDynamicStatusFour', 'checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponSecondaryFieldValueDateFour','date',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponSecondaryFieldValueTimeFour','time',array(
                    'widget' => 'single_text',
                    'required'=> false,
                ))
            ->add('couponSecondaryFieldValueTimezoneFour','timezone')
            ->add('couponSecondaryFieldValueDateFormateFour','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 01/22/14)','medium' => 'Medium - (Ex: Jan 22, 2014)',
                        'long' => 'Long - (Ex: January 22, 2014)','full' => 'Full - (Ex: Wednesday, January 22, 2014)'),
                    'label'=>'Date Format',
                ))
            ->add('couponSecondaryFieldValueTimeFormateFour','choice', array(
                    'choices' => array('short' => 'Short - (Ex: 5:08 AM)','medium' => 'Medium - (Ex: 5:08:37 AM)',
                        'long' => 'Long - (Ex: 5:08:37 AM EDT)','full' => 'Full - (Ex: 5:08:37 AM Eastern Daylight Time)'),
                    'label'=>'Time Format',
                ))
            ->add('couponSecondaryFieldNumberValueFour', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Number)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldNumberFormateFour','choice', array(
                    'choices' => array('decimal' => 'Decimal - (Ex: 1234567=1,234,567)',
                        'percent' => 'Percent - (Ex: 0.5=50%, 1=100%)',
                        'scientific' => 'Scientific - (Ex: 123456789=12345678E8)',
                        'spellout' => 'SpellOut - (Ex: 100=one hundred)'),
                    'label'=>'Number Format',
                ))
            ->add('couponSecondaryFieldCurrencyValueFour', 'text',array(
                    'required'=> false,
                    'label'=>'Value(Currency)',
                    'max_length'=> '25',
                ))
            ->add('couponSecondaryFieldCurrencyCodeFour','currency')
            ->add('couponSecondaryFieldAlignmnetFour','choice', array(
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
            'data_class' => 'apb\appassBundle\Entity\msecondary'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_msecondary';
    }
}
