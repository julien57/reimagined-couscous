<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

class ContactType extends AbstractType
{
    /** @var TranslatorInterface */
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
                        'placeholder' => '* '.$this->translator->trans('form.name'),
                        'title' => 'name',
                    ],
             ]
            )
            ->add('lastName', TextType::class,
                    [
                        'attr' => [
                    'placeholder' => '* '.$this->translator->trans('form.lastname'),
                    'title' => 'last name',
                        ],
                ]
            )
            ->add('company', TextType::class,
                [
                    'attr' => [
                        'placeholder' => $this->translator->trans('form.company'),
                        'title' => 'company',
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
                        'placeholder' => '* '.$this->translator->trans('form.email'),
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
            ->add('country', ChoiceType::class, [
                    'choices' => [
                        'Luxembourg' => 'lu',
                        'france' => 'fr',
                        'belgique' => 'be',
                    ],
                ]
            )
            ->add('eventType', ChoiceType::class, [
                    'choices' => [
                        $this->translator->trans('form.event_type') => 0,
                        $this->translator->trans('form.wedding') => 'event1',
                        $this->translator->trans('form.birthday') => 'event2',
            $this->translator->trans('form.event_pro') => 'event3',
                        $this->translator->trans('form.other') => 'event4',
                    ],
                ]
            )
            ->add('eventDate', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('peopleNumber', IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => $this->translator->trans('form.nb_people'),
                        'title' => 'Number of people',
                    ],
                ]
                )
            ->add('bookingRoom', ChoiceType::class, [
                'label' => $this->translator->trans('form.booking_room'),
                'choices' => [
                    $this->translator->trans('form.yes') => $this->translator->trans('form.yes'),
                    $this->translator->trans('form.no') => $this->translator->trans('form.no'),
                ],
                'expanded' => true, // use a radio list instead of a select input
            ],
            )
            ->add('message', TextType::class, [
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
            'data_class' => Contact::class,
            'slug' => 'slug',
        ]);
    }
}
