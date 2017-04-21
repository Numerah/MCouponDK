<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mbackfieldsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('couponBackFieldTotalFields','choice', array(
                    'choices' => array('0' => '0','1' => '1','2' => '2', '3' => '3','4' => '4'
                    ,'5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10'),
                    'label'=>'Total Back Fields',
                ))
            ->add('couponBackFieldLabelOne','text',array(
                    'required'=> false,
                    'max_length' => '25',
                    'label'=>'Label',
                ))
            ->add('couponBackFieldLabelDynamicStatusOne','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponBackFieldTextValueOne','textarea',array(
                    'required'=> false,
                    'max_length' => '250',
                    'label'=>'Value',
                ))
            ->add('couponBackFieldTextDynamicStatusOne','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponBackFieldLabelTwo','text',array(
                    'required'=> false,
                    'max_length' => '25',
                    'label'=>'Label',
                ))
            ->add('couponBackFieldLabelDynamicStatusTwo','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponBackFieldTextValueTwo','textarea',array(
                    'required'=> false,
                    'max_length' => '250',
                    'label'=>'Value',
                ))
            ->add('couponBackFieldTextDynamicStatusTwo','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponBackFieldLabelThree','text',array(
                    'required'=> false,
                    'max_length' => '25',
                    'label'=>'Label',
                ))
            ->add('couponBackFieldLabelDynamicStatusThree','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponBackFieldTextValueThree','textarea',array(
                    'required'=> false,
                    'max_length' => '250',
                    'label'=>'Value',
                ))
            ->add('couponBackFieldTextDynamicStatusThree','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponBackFieldLabelFour','text',array(
                    'required'=> false,
                    'max_length' => '25',
                    'label'=>'Label',
                ))
            ->add('couponBackFieldLabelDynamicStatusFour','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponBackFieldTextValueFour','textarea',array(
                    'required'=> false,
                    'max_length' => '250',
                    'label'=>'Value',
                ))
            ->add('couponBackFieldTextDynamicStatusFour','checkbox',array(
                    'required'=> false,
                    'label'=> " ",
                ))
            ->add('couponBackFieldLabelFive','text',array(
                'required'=> false,
                'max_length' => '25',
                'label'=>'Label',
            ))
            ->add('couponBackFieldLabelDynamicStatusFive','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldTextValueFive','textarea',array(
                'required'=> false,
                'max_length' => '250',
                'label'=>'Value',
            ))
            ->add('couponBackFieldTextDynamicStatusFive','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldLabelSix','text',array(
                'required'=> false,
                'max_length' => '25',
                'label'=>'Label',
            ))
            ->add('couponBackFieldLabelDynamicStatusSix','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldTextValueSix','textarea',array(
                'required'=> false,
                'max_length' => '250',
                'label'=>'Value',
            ))
            ->add('couponBackFieldTextDynamicStatusSix','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldLabelSeven','text',array(
                'required'=> false,
                'max_length' => '25',
                'label'=>'Label',
            ))
            ->add('couponBackFieldLabelDynamicStatusSeven','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldTextValueSeven','textarea',array(
                'required'=> false,
                'max_length' => '250',
                'label'=>'Value',
            ))
            ->add('couponBackFieldTextDynamicStatusSeven','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldLabelEight','text',array(
                'required'=> false,
                'max_length' => '25',
                'label'=>'Label',
            ))
            ->add('couponBackFieldLabelDynamicStatusEight','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldTextValueEight','textarea',array(
                'required'=> false,
                'max_length' => '250',
                'label'=>'Value',
            ))
            ->add('couponBackFieldTextDynamicStatusEight','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldLabelNine','text',array(
                'required'=> false,
                'max_length' => '25',
                'label'=>'Label',
            ))
            ->add('couponBackFieldLabelDynamicStatusNine','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldTextValueNine','textarea',array(
                'required'=> false,
                'max_length' => '250',
                'label'=>'Value',
            ))
            ->add('couponBackFieldTextDynamicStatusNine','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldLabelTen','text',array(
                'required'=> false,
                'max_length' => '25',
                'label'=>'Label',
            ))
            ->add('couponBackFieldLabelDynamicStatusTen','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
            ->add('couponBackFieldTextValueTen','textarea',array(
                'required'=> false,
                'max_length' => '250',
                'label'=>'Value',
            ))
            ->add('couponBackFieldTextDynamicStatusTen','checkbox',array(
                'required'=> false,
                'label'=> " ",
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\mbackfields'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mbackfields';
    }
}
