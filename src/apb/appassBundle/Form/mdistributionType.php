<?php

namespace apb\appassBundle\Form;

use Passbook\Pass\NumberField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mdistributionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('distributionStatus','checkbox', array(
                'required'=> false,
                'label' => " ",
            ))
            ->add('passLinkType', 'choice' , array(
                'choices' => array(
                    'public' => 'public',
                    'private' => 'private'
                ),
            ))
            ->add('restrictMultiple','checkbox', array(
                'required'=> false,
                'label' => 'Limit to 1 pass per user',
            ))
            ->add('voidPasses','checkbox', array(
                'required'=> false,
                'label' => 'Flag all passes as expired',
            ))
            ->add('passExpirationDate','date',array(
                'widget' => 'single_text',
                'required'=> false,
            ))
            ->add('quantityRestriction', 'choice' , array(
                'choices' => array(
                    'unlimited' => 'Unlimited Quantity',
                    'limited' => 'Limited Quantity'
                ),
            ))
            ->add('limitValue', 'integer', array(
                'data' => 1000
            ))
            ->add('dateRestriction', 'choice' , array(
                'choices' => array(
                    'permanent' => 'Pass is permanently available',
                    'date' => 'Do not issue passes after a date'
                ),
            ))
            ->add('restrictedDate','date',array(
                'widget' => 'single_text',
                'required'=> false,
            ))
            ->add('passwordIssueStatus', 'choice' , array(
                'choices' => array(
                    'nopass' => 'No password Required',
                    'fixedpass' => 'Fixed password',
                    'singleusepass' => 'Single-use password'
                ),
            ))
            ->add('fixedIssuePassword')
            ->add('singleUsePasswords')
            ->add('passwordUpdateStatus', 'choice' , array(
                'choices' => array(
                    'nopass' => 'No password Required',
                    'fixedpass' => 'Fixed password'
                ),
            ))
            ->add('fixedUpdatePassword')
            ->add('socialSharing','checkbox', array(
                'required'=> false,
                'label' => 'Enable social side panel',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\mdistribution'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mdistribution';
    }
}
