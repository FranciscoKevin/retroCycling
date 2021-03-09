<?php

namespace App\Form;

use App\Entity\CyclingShirt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CyclingShirtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cyclingShirtPicture', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'download_uri' => false,
                'attr' => ['placeholder' => 'Choisir un fichier'],
            ])

            ->add('name', TextType::class, [
                'label' => 'Nom du maillot',
            ])

            ->add('years', ChoiceType::class, [
                'choices' => [
                    'Années 50-60' => 'Années 50-60',
                    'Années 70' => 'Années 70',
                    'Années 80' => 'Années 80',
                    'Années 90' => 'Années 90',
                ],
                'label' => 'Années : ',
                'expanded' => true,
            ])

            ->add('cyclistName', TextType::class, [
                'label' => 'Nom du cycliste',
            ])

            ->add('teamInformations', TextareaType::class, [
                'label' => 'Informations sur l\'équipe',
            ])

            ->add('results', TextareaType::class, [
                'label' => 'Résultats notables : ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CyclingShirt::class,
        ]);
    }
}
