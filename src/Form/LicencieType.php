<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\Licencie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LicencieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numLicence', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('prenom', TextType::class, [
                'attr' => ['class' => 'form-control mb-3']
            ])
            
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'attr' => [
                    'class' => 'form-control col-md-10', 
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Licencie::class,
        ]);
    }
}
