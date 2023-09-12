<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

use Symfony\Component\Validator\Constraints as Assert;

class ResetPasswordRequestFormType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('email', EmailType::class, [
            'attr' => ['autocomplete' => 'email'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Entrez un mail valide',
                ]),
                new Regex([
                    'pattern' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                    'message' => 'Veuillez entrer une adresse mail valide',
                ]),
            ],
        ]);
}

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([]);
}
}
