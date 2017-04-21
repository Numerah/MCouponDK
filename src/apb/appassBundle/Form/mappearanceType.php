<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mappearanceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('couponId','hidden')
            ->add('iconName','hidden')
            ->add('logoName','hidden')
            ->add('genericThumbnail','hidden')
            ->add('boardingPassFooter','hidden')
            ->add('couponStrip','hidden')
            ->add('storeCardStrip','hidden')
            ->add('eventTicketStrip','hidden')
            ->add('eventTicketThumbnail','hidden')
            ->add('eventTicketBackground','hidden')

            ->add('iconNameFile', 'file',array('required'=>false))
            ->add('logoNameFile', 'file',array('required'=>false))
            ->add('genericThumbnailFile', 'file',array('required'=>false))
            ->add('boardingPassFooterFile', 'file',array('required'=>false))
            ->add('couponStripFile', 'file',array('required'=>false))
            ->add('storeCardStripFile', 'file',array('required'=>false))
            ->add('eventTicketStripFile', 'file',array('required'=>false))
            ->add('eventTicketThumbnailFile', 'file',array('required'=>false))
            ->add('eventTicketBackgroundFile', 'file',array('required'=>false))

            ->add('logoText', 'text',array(
                'required'=> false,
                'label'=>'Logo Text',
                'max_length'=> '25',
            ))
            ->add('eventTicketStatus', 'choice' , array(
                'choices' => array(
                    'Layout 1: Strip' => 'Layout 1: Strip',
                    'Layout 2: Background/Thumbnail' => 'Layout 2: Background/Thumbnail'
                ),
            ))
            ->add('backgroundColorCode')
            ->add('fieldLabelColorCode')
            ->add('fieldValueColorCode');
    }


    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\mappearance'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mappearance';
    }
}
