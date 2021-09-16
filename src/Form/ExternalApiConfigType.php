<?php

namespace App\Form;

use App\Entity\ExternalApiConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExternalApiConfigType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url')
            ->add('token')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ExternalApiConfig::class,
            'csrf_token_id' => 'external_api_config',
            'csrf_protection' => true,
        ]);
    }
}
