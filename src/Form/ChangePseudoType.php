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

class ChangePseudoType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
    ->add('pseudo', TextType::class, [
        'label' => 'Nouveau pseudo',
        'constraints' => [
            new NotBlank([  
                'message' => 'Entrez un nouveau message',
            ]),
            new Regex([
                'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{5,25}$/',
                'message' => 'Votre pseudo doit contenir au moins une majuscule, une minuscule, un chiffre et avoir entre 5 et 25 caractères.',
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
