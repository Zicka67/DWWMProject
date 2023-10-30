<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserDetailsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_firstname', TextType::class, [
                'label' => 'Prénom',
               
            ])
            ->add('user_lastname', TextType::class, [
                'label' => 'Nom de famille',
            ])
            ->add('user_adress', TextType::class, [
                'label' => 'Adresse',
            ])
            ->add('user_phone', TextType::class, [
                'label' => 'Numéro de téléphone',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            
        ]);
    }
}
