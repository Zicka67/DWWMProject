<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;

use Symfony\Component\Validator\Constraints as Assert;

class ChangePhoneType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
    ->add('phoneNumber', TextType::class, [
        'label' => 'Nouveau téléphone',
        'constraints' => [
            new NotBlank(['message' => 'Veuillez rentre un numéro de téléphone']),
            new Assert\Length([
                'min' => 10,
                'minMessage' => 'Votre numéro doit avoir au moins {{ limit }} caractères.',
                'max' => 10,
                'maxMessage' => 'Votre numéro ne doit pas dépasser {{ limit }} caractères.'
            ]),
            new NotBlank([  
                'message' => 'Entrez un nouveau numéro',
            ]),
            new Regex([
                'pattern' => '/^[a-zA-Z0-9\s.,?!\'-]{5,30}$/',
            ]),
        ],
    ]);
}

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => User::class,
    ]);
}
}
