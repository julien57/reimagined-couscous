<?php

namespace App\Form;

use App\Entity\Block;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('path', TextType::class,
                [
                    'attr' => ['id' => 'path_block', 'readonly' => 'readonly'],
                ]
            )
            ->add('type', ChoiceType::class, [
                    'choices' => [
                        'site' => 0,
                        'header' => 1,
                        'content' => 2,
                        'slider' => 3,
                        'footer' => 4,
                        'component' => 5,
                        'dailymessage' => 6,
                    ],
                ]
            )
            //->add('image',FileType::class)
            ->add('image', FileType::class, [
                'mapped' => false, 'required' => false,
            ])
            ->add('subBlock', CheckboxType::class, [
                'label' => 'Sous blocs ?',
                'required' => false,
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
