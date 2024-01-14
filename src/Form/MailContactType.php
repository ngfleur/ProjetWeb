<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\MailContact;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MailContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        

            ->add('dateEnvoi', DateTimeType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('objet', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('message', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('contacts', EntityType::class, [
    'class' => Contact::class,
    'choice_label' => 'nom', 
    'multiple' => true,
    'attr' => [
        'class' => 'form-select',
            'aria-label' => 'Contacts',
    ],
    'query_builder' => function (EntityRepository $er) {
        return $er->createQueryBuilder('c')
            ->orderBy('c.nom', 'ASC'); 
    },
]);

    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MailContact::class,
        ]);
    }
}
