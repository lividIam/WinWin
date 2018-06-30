<?php

namespace App\Form;

use App\Entity\Store\Store;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StoreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder
            ->add('name', TextType::class)
            ->add('logo', TextType::class)
            ->add('phoneNumber', TextType::class)
            ->add('street', TextType::class)
            ->add('streetNumber', TextType::class)
            ->add('buildingNumber', TextType::class)
            ->add('city', TextType::class)
            ->add('postCode', TextType::class)
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Store::class,
        ));
    }
}