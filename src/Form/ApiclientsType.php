<?php

namespace App\Form;

use App\Entity\Apiclients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApiclientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('client_id')
            ->add('client_secret')
            ->add('client_name')
            ->add('active')
            ->add('short_description')
            ->add('full_description')
            ->add('logo_url')
            ->add('url')
            ->add('dpo')
            ->add('technical_contact')
            ->add('commercial_contact')
            ->add('user_id')
            ->add('apiclientsgrants')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Apiclients::class,
        ]);
    }
}
