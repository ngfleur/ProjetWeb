<?php

namespace App\Form;

use App\Entity\Educateur;
use App\Entity\Licencie;
use App\Entity\MailEdu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            /*->add('roles', ChoiceType::class, [
    'label' => 'Role',
    'required' => false,
    'attr' => ['class' => 'form-select'], // Utilisez une classe form-select pour un meilleur rendu avec Bootstrap
    'multiple' => true, // Permet de sélectionner plusieurs rôles
    'choices' => [
        'Admin' => 'ROLE_ADMIN', // Ajoutez d'autres rôles au besoin
        'Pas admin' => 'ROLE_USER', // Ajoutez d'autres rôles au besoin
    ],
])*/

            ->add('password', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('licencie', EntityType::class, [
                'class' => Licencie::class,
                'choice_label' => 'id',
                'attr' => [
                    'class' => 'form-control col-md-10', 
                ],
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Educateur::class,
        ]);
    }
}
