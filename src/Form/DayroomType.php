<?php

namespace App\Form;

use App\Entity\Dayroom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

class DayroomType extends AbstractType
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => [
                    'placeholder' => '*' . $this->translator->trans('form.name'),
                    'title' => 'last name',
                ],
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'placeholder' =>'*' . $this->translator->trans('form.lastname'),
                    'title' => 'last name',
                ],
            ])
            ->add('email', TextType::class, [
                'attr' => [
                    'placeholder' => '*' . $this->translator->trans('form.email'),
                    'title' => 'Email',
                ],
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'placeholder' => $this->translator->trans('form.phone_number'),
                    'title' => 'phone',
                ],
            ])
            ->add('atDate', DateType::class, [
                'attr' => [
                    'placeholder' => $this->translator->trans('form.date'),
                ],
                'widget' => 'single_text',
            ])
            ->add('room', ChoiceType::class, [
                'placeholder' => $this->translator->trans('form.your_room'),
                'choices' => [
                    $this->translator->trans('form.confort_1') => $this->translator->trans('form.confort_1'),
                    $this->translator->trans('form.superior_1') => $this->translator->trans('form.superior_1'),
                    $this->translator->trans('form.confort_2') => $this->translator->trans('form.confort_2'),
                    $this->translator->trans('form.superior_2') => $this->translator->trans('form.superior_2'),
                ],
            ])
            ->add('message', TextType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => $this->translator->trans('form.message'),
                    'title' => 'phone',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dayroom::class,
            'slug' => 'slug',
        ]);
    }
}
