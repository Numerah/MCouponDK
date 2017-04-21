<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mdynamicType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('couponBarcodeDynamicValue')
            ->add('couponBarcodeAlternateDynamicText')
            ->add('couponHeaderLabelDynamic')
            ->add('couponHeaderTextDynamic')
            ->add('couponPrimaryFieldLabelDynamic')
            ->add('couponPrimaryFieldTextDynamic')
            ->add('couponSecondaryFieldLabelDynamicOne')
            ->add('couponSecondaryFieldTextDynamicOne')
            ->add('couponSecondaryFieldLabelDynamicTwo')
            ->add('couponSecondaryFieldTextDynamicTwo')
            ->add('couponSecondaryFieldLabelDynamicThree')
            ->add('couponSecondaryFieldTextDynamicThree')
            ->add('couponSecondaryFieldLabelDynamicFour')
            ->add('couponSecondaryFieldTextDynamicFour')
            ->add('couponAuxiliaryFieldLabelDynamicOne')
            ->add('couponAuxiliaryFieldTextDynamicOne')
            ->add('couponAuxiliaryFieldLabelDynamicTwo')
            ->add('couponAuxiliaryFieldTextDynamicTwo')
            ->add('couponAuxiliaryFieldLabelDynamicThree')
            ->add('couponAuxiliaryFieldTextDynamicThree')
            ->add('couponAuxiliaryFieldLabelDynamicFour')
            ->add('couponAuxiliaryFieldTextDynamicFour')
            ->add('couponBackFieldLabelDynamicOne')
            ->add('couponBackFieldTextDynamicOne')
            ->add('couponBackFieldLabelDynamicTwo')
            ->add('couponBackFieldTextDynamicTwo')
            ->add('couponBackFieldLabelDynamicThree')
            ->add('couponBackFieldTextDynamicThree')
            ->add('couponBackFieldLabelDynamicFour')
            ->add('couponBackFieldTextDynamicFour')
            ->add('couponBackFieldLabelDynamicFive')
            ->add('couponBackFieldTextDynamicFive')
            ->add('couponBackFieldLabelDynamicSix')
            ->add('couponBackFieldTextDynamicSix')
            ->add('couponBackFieldLabelDynamicSeven')
            ->add('couponBackFieldTextDynamicSeven')
            ->add('couponBackFieldLabelDynamicEight')
            ->add('couponBackFieldTextDynamicEight')
            ->add('couponBackFieldLabelDynamicNine')
            ->add('couponBackFieldTextDynamicNine')
            ->add('couponBackFieldLabelDynamicTen')
            ->add('couponBackFieldTextDynamicTen')
            ->add('couponRelevanceLocationTextDynamicOne')
            ->add('couponRelevanceLocationAddressOne')
            ->add('couponRelevanceLocationTextDynamicTwo')
            ->add('couponRelevanceLocationAddressTwo')
            ->add('couponRelevanceLocationTextDynamicThree')
            ->add('couponRelevanceLocationAddressThree')
            ->add('couponRelevanceLocationTextDynamicFour')
            ->add('couponRelevanceLocationAddressFour')
            ->add('couponRelevanceLocationTextDynamicFive')
            ->add('couponRelevanceLocationAddressFive')
            ->add('couponRelevanceLocationTextDynamicSix')
            ->add('couponRelevanceLocationAddressSix')
            ->add('couponRelevanceLocationTextDynamicSeven')
            ->add('couponRelevanceLocationAddressSeven')
            ->add('couponRelevanceLocationTextDynamicEight')
            ->add('couponRelevanceLocationAddressEight')
            ->add('couponRelevanceLocationTextDynamicNine')
            ->add('couponRelevanceLocationAddressNine')
            ->add('couponRelevanceLocationTextDynamicTen')
            ->add('couponRelevanceLocationAddressTen')
            ->add('couponBarcodeDynamicValueStatus')
            ->add('couponBarcodeAlternateDynamicTextStatus')
            ->add('couponHeaderLabelDynamicStatus')
            ->add('couponHeaderTextDynamicStatus')
            ->add('couponPrimaryFieldLabelDynamicStatus')
            ->add('couponPrimaryFieldTextDynamicStatus')
            ->add('couponSecondaryFieldLabelDynamicOneStatus')
            ->add('couponSecondaryFieldTextDynamicOneStatus')
            ->add('couponSecondaryFieldLabelDynamicTwoStatus')
            ->add('couponSecondaryFieldTextDynamicTwoStatus')
            ->add('couponSecondaryFieldLabelDynamicThreeStatus')
            ->add('couponSecondaryFieldTextDynamicThreeStatus')
            ->add('couponSecondaryFieldLabelDynamicFourStatus')
            ->add('couponSecondaryFieldTextDynamicFourStatus')
            ->add('couponAuxiliaryFieldLabelDynamicOneStatus')
            ->add('couponAuxiliaryFieldTextDynamicOneStatus')
            ->add('couponAuxiliaryFieldLabelDynamicTwoStatus')
            ->add('couponAuxiliaryFieldTextDynamicTwoStatus')
            ->add('couponAuxiliaryFieldLabelDynamicThreeStatus')
            ->add('couponAuxiliaryFieldTextDynamicThreeStatus')
            ->add('couponAuxiliaryFieldLabelDynamicFourStatus')
            ->add('couponAuxiliaryFieldTextDynamicFourStatus')
            ->add('couponBackFieldLabelDynamicOneStatus')
            ->add('couponBackFieldTextDynamicOneStatus')
            ->add('couponBackFieldLabelDynamicTwoStatus')
            ->add('couponBackFieldTextDynamicTwoStatus')
            ->add('couponBackFieldLabelDynamicThreeStatus')
            ->add('couponBackFieldTextDynamicThreeStatus')
            ->add('couponBackFieldLabelDynamicFourStatus')
            ->add('couponBackFieldTextDynamicFourStatus')
            ->add('couponBackFieldLabelDynamicFiveStatus')
            ->add('couponBackFieldTextDynamicFiveStatus')
            ->add('couponBackFieldLabelDynamicSixStatus')
            ->add('couponBackFieldTextDynamicSixStatus')
            ->add('couponBackFieldLabelDynamicSevenStatus')
            ->add('couponBackFieldTextDynamicSevenStatus')
            ->add('couponBackFieldLabelDynamicEightStatus')
            ->add('couponBackFieldTextDynamicEightStatus')
            ->add('couponBackFieldLabelDynamicNineStatus')
            ->add('couponBackFieldTextDynamicNineStatus')
            ->add('couponBackFieldLabelDynamicTenStatus')
            ->add('couponBackFieldTextDynamicTenStatus')
            ->add('couponRelevanceLocationAddressOneStatus')
            ->add('couponRelevanceLocationAddressTwoStatus')
            ->add('couponRelevanceLocationAddressThreeStatus')
            ->add('couponRelevanceLocationAddressFourStatus')
            ->add('couponRelevanceLocationAddressFiveStatus')
            ->add('couponRelevanceLocationAddressSixStatus')
            ->add('couponRelevanceLocationAddressSevenStatus')
            ->add('couponRelevanceLocationAddressEightStatus')
            ->add('couponRelevanceLocationAddressNineStatus')
            ->add('couponRelevanceLocationAddressTenStatus')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\mdynamic'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mdynamic';
    }
}
