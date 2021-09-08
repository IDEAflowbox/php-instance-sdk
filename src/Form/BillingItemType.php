<?php

namespace App\Form;

use App\Entity\BillingItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BillingItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('quantity')
            ->add('unitPrice', MoneyType::class, ['currency' => false, 'divisor' => 100])
            ->add('vatRate', ChoiceType::class, [
                'choices' => array_combine(
                    range(0, 32),
                    range(0, 32)
                ),
            ])
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
