<?php
// src/Form/Type/OrderType.php
namespace App\Form\Type;

use App\Entity\ApiClients;
use App\Form\Type\PartenairesType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PartenairesType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('client_id', ApiClients::class);
    }
}