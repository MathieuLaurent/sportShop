<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SavType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('numcommande', TextType::class)
        ->add('email', EmailType::class)
        ->add('motif', ChoiceType::class, [
            'choices'=>[
                'Produit incomplet' => 'Produit incomplet',
                'Pièce cassée'=> 'Pièce cassée',
                'Produit périmé'=> 'Produit périmé'
            ]])
        ->add('message', TextareaType::class)
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
