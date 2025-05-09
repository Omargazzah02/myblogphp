<?php 
// src/Form/RegistrationType.php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(['message' => "L'email est requis."]),
                    new Email(['message' => "L'email n'est pas valide."])
                ],
                'attr' => ['placeholder' => 'Email']
            ])
            ->add('username', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => "Le Username est requis."]),
                ],
                'attr' => ['placeholder' => 'Username']
            ])
            ->add('password', PasswordType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Le mot de passe est requis.']),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Le mot de passe doit comporter au moins {{ limit }} caractères.',
                    ])
                ],
                'attr' => ['placeholder' => 'Mot de passe']
            ])
            ->add('photo', TextType::class, [
                'attr' => ['placeholder' => 'Url de photo']
            ])
            ->add('submit', SubmitType::class, ['label' => 'S\'inscrire']);

        // CSRF protection should be enabled by default
        // No need to disable it unless you have a specific reason
        // Symfony will manage the CSRF token automatically for you
        $builder->setMethod('POST');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => true,  // Activer la protection CSRF (par défaut)
        ]);
    }
}
