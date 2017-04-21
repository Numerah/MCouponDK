<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class madvancedType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')

            ->add('passGenerateSetting','choice', array(
            'choices' => array('unique' => 'Generate unique passes upon any request'
            ,'personalized' => 'Generate only personalized passes'
            ),
            'label'=>'Pass Generate Settings',
        ))
            ->add('allowPassPerEmail','checkbox', array(
            'label' => 'Allow only (1) pass per email address',
            'required'=> false,
            'label'=>'Allow (1) Pass Per Request ',
        ))
            ->add('allowPassPerNumber','checkbox', array(
            'label' => 'Allow only (1) pass per phone number',
            'required'=> false,))
            ->add('allowPassPerDevice','checkbox', array(
            'label' => 'Allow only (1) pass per device',
            'required'=> false,))
            ->add('limitTotalPass','choice', array(
            'choices' => array('unset' => 'No Limit','set' => 'Set a limit on total passes generated'
            ),
            'label'=>'Limit Total Passes',))
            ->add('limitPassValue','text', array(
            'data' => '100',
            'required'=> false,))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\madvanced'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_madvanced';
    }
}
