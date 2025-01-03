<?php

namespace App\Form;

use App\Entity\Fleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomscentifique')
            ->add('nomcommun')
            ->add('couleur')
            ->add('descrpition')
            ->add('quantitestock')
            ->add('prixunitaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fleur::class,
        ]);
    }
}
