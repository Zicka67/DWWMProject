<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

use Symfony\Component\Validator\Constraints as Assert;

class ChangePasswordFormType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'options' => [
                'attr' => [
                    'autocomplete' => 'Nouveau mot de passe',
                ],
            ],
            'first_options' => [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Confirmez ce mot de passe',
                    ]),
                    new Length([
                        'min' => 12,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{12,}$/',
                        'message' => 'Votre mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, et un chiffre.',
                    ]),
                ],
                'label' => 'Nouveau mot de passe',
            ],
            'second_options' => [
                'label' => 'Confirmez ce mot de passe',
            ],
            'invalid_message' => 'Les champs du mot de passe doivent correspondre.',
            // Instead of being set onto the object directly,
            // this is read and encoded in the controller
            'mapped' => false,
        ])
    ;
}

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([]);
}
}
