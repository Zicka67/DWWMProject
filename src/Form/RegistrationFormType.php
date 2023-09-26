<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Regex;

use Symfony\Component\Validator\Constraints as Assert;

class RegistrationFormType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
    ->add('pseudo', TextType::class, [
        'constraints' => [
            new Length([
                'min' => 5,
                'max' => 25,
                'minMessage' => 'Votre pseudo doit contenir au moins {{ limit }} caractères',
                'maxMessage' => 'Votre pseudo ne doit pas contenir plus de {{ limit }} caractères',
            ]),
            new NotBlank(['message' => 'Entrez un Pseudo']),
            new Regex([
                'pattern' => '/^[a-zA-Z0-9\s.,?!\'-]{5,30}$/',
            ]),
        ],
    ])
        ->add('email', EmailType::class, [
            'constraints' => [
                new Email(['message' => 'Entrez une adresse valide !']),
                new NotBlank(['message' => 'Entrez une adresse mail']),
                new Regex([
                    'pattern' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                    'message' => 'Veuillez entrer une adresse mail valide',
                ]),
            ],
        ])
        ->add('phoneNumber', TextType::class, [
            'constraints' => [
                new NotBlank(['message' => 'Entrez un numéro de téléphone']),
                new Regex([
                    'pattern' => '/^(\+\d{1,3}[- ]?)?\d{10,15}$/',
                    'message' => 'Veuillez entrer un numéro de téléphone valide',
                ]),
            ],
        ])
        ->add('agreeTerms', CheckboxType::class, [
            'mapped' => false,
            'constraints' => [
                new IsTrue([
                    'message' => 'Vous devez être d\'accord avec les terms',
                ]),
            ],
        ])
        // ->add('plainPassword', PasswordType::class, [
        //     'mapped' => false,
        //     'attr' => ['autocomplete' => 'new-password'],
        //     'constraints' => [
        //         new NotBlank([
        //             'message' => 'Veuillez entrer un mot de passe',
        //         ]),
        //         new Length([
        //             'min' => 14,
        //             'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères.',
        //             'max' => 50,
        //             'maxMessage' => 'Votre pseudo ne doit pas dépasser {{ limit }} caractères.'
        //         ]),
        //         new Regex([
        //             'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{14,}$/',
        //             'message' => 'Votre mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, et un chiffre.',
        //         ]),
        //     ],
        // ])
        ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'mapped' => false,
            'invalid_message' => 'Les mots de passe doivent correspondre.',
            'options' => ['attr' => ['autocomplete' => 'new-password']],
            'first_options'  => ['label' => 'Mot de passe'],
            'second_options' => ['label' => 'Confirmez le mot de passe'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez entrer un mot de passe',
                ]),
                new Length([
                    'min' => 14,
                    'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères.',
                    'max' => 50,
                    'maxMessage' => 'Votre pseudo ne doit pas dépasser {{ limit }} caractères.'
                ]),
                new Regex([
                    'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{14,}$/',
                    'message' => 'Votre mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, et un chiffre.',
                ]),
            ],
        ])
    ;
}

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => User::class,
    ]);
}
}
