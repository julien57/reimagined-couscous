<?php

namespace App\Form;

use App\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('sql_type', ChoiceType::class, [
                    'choices' => [
                        'varchar' => 'varchar',
                        'text' => 'text',
                        'integer' => 'integer',
                        'date' => 'date',
                        'boolean' => 'boolean',
                    ],
                ]
            )
            ->add('html_name', TextType::class)
            ->add('html_type', ChoiceType::class, [
                    'choices' => [
                        'text' => 'text',
                        'number' => 'number',
                        'email' => 'email',
                        'file' => 'file',
                        'textarea' => 'textarea',
                        'wysiwyg' => 'wysiwyg',
                        'date' => 'date',
                        'time' => 'time',
                        'checkbox' => 'checkbox',
                    ],
                ]
            )
            ->add('info', TextType::class, [
                'label' => 'Info sous le champs',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
