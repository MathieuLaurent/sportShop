<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EditRoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
    ->add('email', EmailType::class,[
        'constraints' => [
            new NotBlank([
                'message' => 'Merci d\'entrer un e-mail',
            ]),
        ],
        'required' => true,
    ])
    ->add('roles', ChoiceType::class, [
        'choices' => [
            ' ' => 'ROLE_ADMIN'
        ],
        'expanded' => true,
        'multiple' => true,
    ])
;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
