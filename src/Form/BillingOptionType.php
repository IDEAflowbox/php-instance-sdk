<?php

namespace App\Form;

use App\Entity\BillingOption;
use App\Entity\IssuerAddress;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BillingOptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('issuerAddress', EntityType::class, [
                'class' => IssuerAddress::class,
                'choice_label' => function (IssuerAddress $address) {
                    return implode(
                        ', ',
                        [
                            $address->getCompanyName(),
                            $address->getCity(),
                            $address->getCountry(),
                        ]
                    );
                },
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BillingOption::class,
            'csrf_token_id' => 'billing_option',
            'csrf_protection' => false,
        ]);
    }
}
