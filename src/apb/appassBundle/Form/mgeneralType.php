<?php

namespace apb\appassBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mgeneralType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userId','hidden')
            ->add('clientId','hidden')
            ->add('templateName', 'text',array(
                    'label'=>'Name',
                    'max_length'=> '50',
                ))
            ->add('passKey', 'text',array(
                    'read_only' => true,
                    'label'=>'PassKey',
                ))
            ->add('categoryName', 'choice', array(
                    'choices' => array('Coupon' => 'Coupon','Generic' => 'Generic', 'Boarding Pass' => 'Boarding Pass',
                        'Event Ticket' => 'Event Ticket','Store Card' => 'Store Card'),
                    'label'=>'Category',
                ))
            ->add('places', 'choice', array(
                    'choices' => array(
                        'None' => 'None',
                        'Arts & Crafts' => 'Arts & Crafts', 'Books & Magazines' => 'Books & Magazines',
                        'Children & Babies' => 'Children & Babies','Clothing' => 'Clothing',
                        'Department Store' => 'Department Store','Electronics' => 'Electronics',
                        'Entertainment' => 'Entertainment','Furniture' => 'Furniture',
                        'Groceries' => 'Groceries','Health & Beauty' => 'Health & Beauty',
                        'Home & Garden' => 'Home & Garden','Jewelry' => 'Jewelry','Office Supply' => 'Office Supply',
                        'Outlet Stores' => 'Outlet Stores','Pet Supplies' => 'Pet Supplies',
                        'Restaurants' => 'Restaurants','Shoes' => 'Shoes',
                        'Sporting Goods' => 'Sporting Goods','Tools & Automotive' => 'Tools & Automotive',
                        'Toys & Games' => 'Toys & Games','Travel & Transport' => 'Travel & Transport'),
                    'label'=>'Places',
             ))
            ->add('boardingPassTransit','choice', array(
                    'choices' => array('PKTransitTypeAir' => 'Air', 'PKTransitTypeBus' => 'Bus',
                        'PKTransitTypeTrain' => 'Train', 'PKTransitTypeBoat' => 'Boat',
                        'PKTransitTypeGeneric' => 'Generic'),
                    'label'=>'Transit'
                ))
            ->add('organizationName', 'text',array(
                    'label'=>'Organisation',
                    'max_length'=> '50',
                ))
            ->add('organizationDescription', 'textarea',array(
                    'label'=>'Description',
                    'max_length'=> '100',
                ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'apb\appassBundle\Entity\mgeneral'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apb_appassbundle_mgeneral';
    }
}
