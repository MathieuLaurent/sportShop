<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr'=> [
                    'class' => 'form-control',
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr'=> [
                    'class' => 'form-control',
                ]
            ])
            ->add('civilite', ChoiceType::class, [
                'choices'=>[
                    'M' => true,
                    'F'=> false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('email', EmailType::class, [
                'attr'=> [
                    'class' => 'form-control',
                ]
            ])
            ->add('objet', TextType::class, [
                'attr'=> [
                    'class' => 'form-control',
                ]
            ])
            ->add('contenu', TextareaType::class, [
                'attr'=> [
                    'class' => 'form-control',
                ]
            ])
            ->add('envoyer', SubmitType::class, [
                'attr'=> [
                    'class' => 'btn btn-warning',
                    'style' => 'margin-left:47%;margin-top:2%'
                ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
