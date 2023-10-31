<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;

class UserDetailsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-ZéèêëàâäôöûüçÉÈÊËÀÂÄÔÖÛÜÇ\s\-]+$/',
                        'message' => 'Le prénom ne peut contenir que des lettres et des espaces.'
                    ]),
                    new Length([
                        'max' => 100,
                        'maxMessage' => 'Le prénom ne peut pas dépasser 100 caractères.',
                    ])
                ],
            ])
            ->add('user_lastname', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-ZéèêëàâäôöûüçÉÈÊËÀÂÄÔÖÛÜÇ\s\-]+$/',
                        'message' => 'Le nom ne peut contenir que des lettres et des espaces.'
                    ]),
                    new Length([
                        'max' => 100,
                        'maxMessage' => 'Le nom ne peut pas dépasser 100 caractères.',
                    ])
                ],
            ])
            ->add('user_adress', TextType::class, [
                'label' => 'Adresse',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\s,]+$/',
                        'message' => 'L\'adresse contient des caractères invalides.',
                    ]),
                    new Length([
                        'max' => 100,
                        'maxMessage' => 'L\'adresse ne peut pas dépasser 100 caractères.',
                    ])
                ],
            ])
            ->add('user_phone', TextType::class, [
                'label' => 'Téléphone',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\+?[0-9\s]{9,15}$/',
                        'message' => 'Le numéro de téléphone doit avoir entre 9 et 15 chiffres.'
                    ]),
                ],
            ])
            ->add('honeypot', TextType::class, [
                'mapped' => false,
                'required' => false,
                'label' => false,
                'attr' => [
                    'style' => 'display:none;',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            
        ]);
    }
}
