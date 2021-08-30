<?php

namespace App\Form;

use App\Entity\BillingItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BillingItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('quantity')
            ->add('unitPrice')
            ->add('valueNet')
            ->add('valueVat')
            ->add('valueGross')
            ->add('vatRate')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BillingItem::class,
            'csrf_token_id' => 'billing_item',
            'csrf_protection' => true,
        ]);
    }
}
