<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mdatasettingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('couponBarcodeStatus', 'choice', array(
                    'choices' => array('show' => 'Show Barcode on the Pass', 'hide' => 'Hide Barcode on the Pass'),
                    'label' => 'Add Barcode',
                ))
            ->add('couponBarcodeType','choice', array(
                    'choices' => array('QRCode' => 'QRCode', 'Aztec' => 'Aztec','PDF417' => 'PDF417'),
                    'label'=>'Barcode Type',
                ))
            ->add('couponBarcodeValueOption', 'choice' , array(
                    'choices' => array('Static' => 'Fixed Value','Dynamic' => 'Dynamic Value'),
                    'label'=>'Barcode Value',
                ))
            ->add('couponBarcodeFixedValue', 'textarea',array(
                    'required'=> false,
                    'label'=>'Fixed Value',
                ))
            ->add('couponBarcodeValueSource','choice', array(
                    'choices' => array('autogen' => 'Auto-Generate', 'Dynamic' => 'Dynamic'),
                    'label'=>'Barcode Value Source',
                ))
            ->add('couponAutoGenerateValueType','choice', array(
                    'choices' => array('type'=>'-Select Type-','Numeric' => 'Type: Numeric Value',
                        'Alphabet' => 'Type: Alphabet Value','Alphanumeric' => 'Type: Alphanumeric Value'),
                ))
            ->add('couponAutoGenerateValueLength','choice', array(
                    'choices' => array('length'=>'-Select Length-','4' => 'Length: 4 Chars',
                        '5' => 'Length: 5 Chars', '6' => 'Length: 6 Chars','7' => 'Length: 7 Chars',
                        '8' => 'Length: 8 Chars', '9' => 'Length: 9 Chars','10' => 'Length: 10 Chars',
                        '11' => 'Length: 11 Chars', '12' => 'Length: 12 Chars','13' => 'Length: 13 Chars',
                        '14' => 'Length: 14 Chars','15' => 'Length: 15 Chars'),
                ))
            ->add('couponAutoGenerateValue','hidden')
            ->add('couponBarcodeDynamicValue', 'textarea',array(
                    'required'=> false,
                    'label'=>'Default Value',
                ))
            ->add('couponBarcodeEncoding','choice', array(
                    'choices' => array('encoding' => 'ISO-8859-1'),
                    'label'=>'Barcode Encoding',
                ))
            ->add('barcodeAlternateText','choice', array(
                    'choices' => array('same' => 'Same as Barcode Value', 'static' => 'Fixed Text',
                        'dynamic' => 'Dynamic Text'),
                    'label'=>'Alternate Text',
                ))
            ->add('barcodeAlternateFixedText', 'textarea',array(
                    'required'=> false,
                    'label'=>'Fixed Text',
                ))
            ->add('barcodeAlternateDynamicText', 'textarea',array(
                    'required'=> false,
                    'label'=>'Default Text',
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\mdatasetting'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mdatasetting';
    }
}
