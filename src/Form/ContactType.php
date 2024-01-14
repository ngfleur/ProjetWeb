<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Licencie;
use App\Entity\MailContact;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
        ->add('numTel', NumberType::class, [
            'attr' => [
                'class' => 'form-control col-md-10',
                'pattern' => '[0-9]*',
            ],
            'html5' => true,
            
        ])
        
        ->add('licencie', EntityType::class, [
            'class' => Licencie::class,
            'choice_label' => 'id',
            'attr' => [
                'class' => 'form-control col-md-10', 
            ],
        ])
           
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('prenom', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('email', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
           
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
