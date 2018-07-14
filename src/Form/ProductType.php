<?php

namespace App\Form;

use App\Entity\Product\Product;
use App\Entity\Product\Category;
use App\Form\Product_DetailsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder
//            ->add('name', TextType::class)
            ->add('category', EntityType::class, array(
                'class' => Category::class,
                'multiple' => false,
                'expanded' => false,
                'placeholder' => ''
            ))
//            ->add('description', TextType::class)
//            ->add('productDetails', CollectionType::class, array(
//                'entry_type' => Product_DetailsType::class,
//                'allow_add'  => true
//            ))
            
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class,
        ));
    }
}