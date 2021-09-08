<?php

namespace App\Form;

use App\Dto\CreateClientDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('companyName')
            ->add('taxId')
            ->add('city')
            ->add('zipCode')
            ->add('street')
            ->add('propertyNumber')
            ->add('country')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreateClientDto::class,
            'csrf_token_id' => 'client',
            'csrf_protection' => true,
        ]);
    }
}
