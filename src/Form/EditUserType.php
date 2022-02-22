<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class , [
                'constraints' => [
                    new NotBlank([
                        'message' => 'merci de saisir une adresse email'
                    ])

                    ],
                    'required' => true,
                    'attr' => [
                        'class' => 'form-control'
                    ]
            ])
            ->add('roles', ChoiceType::class,[
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Choach' => 'ROLE_COACH' ,
                    'Administrateur' => 'ROLE_ADMIN'
                ],
                'expanded' => true,
                'multiple' => true,
                'label' => 'Roles'

            ])
            ->add('FirstName')
            ->add('LastName')

            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
