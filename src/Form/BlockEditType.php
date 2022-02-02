<?php

namespace App\Form;

use App\Entity\Block;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlockEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                    'disabled' => true,
                ]
            )
            ->add('path', TextType::class, [
                  'disabled' => true,
                ]
            )
            ->add('type', ChoiceType::class, [
                    'choices' => [
                        'header' => 1,
                        'content' => 2,
                        'footer' => 3,
                    ],
                ]
            )
            //->add('image',FileType::class)
            ->add('image', FileType::class, [
                'mapped' => false, 'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Block::class,
        ]);
    }
}
