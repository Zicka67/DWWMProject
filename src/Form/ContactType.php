<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'constraints' => [
                    new Assert\Length(['max' => 10, 'maxMessage' => 'Votre pseudo ne doit pas dépasser {{ limit }} caractères.']),
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Assert\Email(['message' => 'Veuillez entrer une adresse e-mail valide.'])
                ]
            ])
            ->add('sujet', TextType::class, [
                'constraints' => [
                    new Assert\Length(['max' => 10, 'maxMessage' => 'Votre sujet ne doit pas dépasser {{ limit }} caractères.']),
                ]
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new Assert\Length(['max' => 500, 'maxMessage' => 'Votre message ne doit pas dépasser {{ limit }} caractères.']),
                ]
            ])
            ->add('honeypot', TextType::class, [
                'mapped' => false,
                'required' => false,
                'label' => false,
                'attr' => [
                    'style' => 'display:none;',
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
