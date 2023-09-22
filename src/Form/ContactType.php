<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;



use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez rentre un pseudo']),
                    new Assert\Length([
                        'min' => 5,
                        'minMessage' => 'Votre pseudo doit avoir au moins {{ limit }} caractères.',
                        'max' => 30,
                        'maxMessage' => 'Votre pseudo ne doit pas dépasser {{ limit }} caractères.'
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\s.,?!\'-]{5,30}$/',
                    ]),
                ]
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
            ->add('sujet', TextType::class, [
                'constraints' => [
                    new Assert\Length([
                        'max' => 30
                    ]),
                    new NotBlank(['message' => 'Entrez un sujet']),
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\s.,?!\'-]{3,100}$/',
                        'message' => 'Votre sujet ne doit pas dépasser {{ limit }} caractères.',
                    ]),
                ]
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new Assert\Length([
                        'min' => 5,
                        'minMessage' => 'Votre message doit avoir au moins {{ limit }} caractères.',
                        'max' => 500,
                        'maxMessage' => 'Votre message ne doit pas dépasser {{ limit }} caractères.'
                    ]),
                    new NotBlank(['message' => 'Entrez un message']),
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\s.,?!\'"\n\r-]{5,500}$/',
                    ]),
                ]
            ])
            ->add('honeypot', TextType::class, [
                'mapped' => false,
                'required' => false,
                'label' => false,
                'attr' => [
                    'style' => 'display:;',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
