<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var User $currentUser */
        $currentUser = $options['currentUser'];

        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => false,
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les deux mots de passe doivent être identiques.',
                'options' => ['attr' => ['class' => 'form-control']],
                'required' => true,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation mot de passe'],
            ])
        ;

        if (in_array('ROLE_SUPER_ADMIN', $currentUser->getRoles())) {
            $builder
                ->add('role', ChoiceType::class, [
                    'label' => 'Rôle',
                    'choices' => [
                        'Super Admin' => 'ROLE_SUPER_ADMIN',
                        'Administrateur' => 'ROLE_ADMIN',
                    ],
                    'mapped' => false,
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ])
            ;
        } else {
            $builder
                ->add('role', ChoiceType::class, [
                    'label' => 'Rôle',
                    'choices' => [
                        'Administrateur' => 'ROLE_ADMIN',
                    ],
                    'mapped' => false,
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ])
            ;
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'currentUser' => 'currentUser'
        ]);
    }
}
