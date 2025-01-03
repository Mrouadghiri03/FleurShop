<?php

namespace App\Form;

use App\Entity\Entretien;
use App\Entity\Fleur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntretienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('typeentretien')
            ->add('remarque')
            ->add('fleur', EntityType::class, [
                'class' => Fleur::class,
                'choice_label' => 'nomcommun',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entretien::class,
        ]);
    }
}
