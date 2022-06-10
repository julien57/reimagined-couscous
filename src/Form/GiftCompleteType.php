<?php

namespace App\Form;

use App\Entity\Gift;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

class GiftCompleteType extends AbstractType
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                    'attr' => [
                        'placeholder' => $this->translator->trans('form.name'),
                        'title' => 'name',
                    ],
                ]
            )
            ->add('lastName', TextType::class,
                [
                    'attr' => [
                        'placeholder' => $this->translator->trans('form.lastname'),
                        'title' => 'last name',
                    ],
                ]
            )
            ->add('phone', TextType::class,
                [
                    'attr' => [
                        'placeholder' => $this->translator->trans('form.phone_number'),
                        'title' => 'phone',
                    ],
                ]
            )
            ->add('email', TextType::class,
                [
                    'attr' => [
                        'placeholder' => $this->translator->trans('form.email'),
                        'title' => 'email',
                    ],
                ]
            )
            ->add('adress', TextType::class, [
                    'attr' => [
                        'placeholder' => $this->translator->trans('form.nb_street'),
                        'title' => 'Number, street',
                    ],
                ]
            )

            ->add('zipcode', TextType::class, [
                'attr' => [
                    'placeholder' => $this->translator->trans('form.postcode'),
                    'title' => $this->translator->trans('form.postcode'),
                ],
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'placeholder' => $this->translator->trans('form.city'),
                    'title' => $this->translator->trans('form.city'),
                ],
            ])

            ->add('country', ChoiceType::class, [
                    'choices' => [
                        'Luxembourg' => 'lu',
                        'France' => 'fr',
                        'Belgique' => 'be',
                    ],
                ]
            )
            ->add('personName', TextType::class,
                [
                    'attr' => [
                        'placeholder' => $this->translator->trans('form.person_name'),
                        'title' => '',
                    ],
                ]
            )
            ->add('amount', ChoiceType::class, [
                    'placeholder' => $this->translator->trans('form.amount'),
                    'choices' => [
                        '50' => '50',
                        '100' => '100',
                        '150' => '150',
                        '200' => '200',
                    ],
                ]
            )
            ->add('message', TextType::class,
                [
                    'attr' => [
                        'placeholder' => $this->translator->trans('form.message'),
                        'title' => '',
                    ],
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gift::class,
        ]);
    }
}
