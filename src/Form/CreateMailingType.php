<?php

namespace App\Form;

use Cyberkonsultant\DTO\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateMailingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('title')
            ->add('startDate', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('segmentId')
            ->add('senderId')
            ->add('contents')
            ->add('utmCampaign')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
            'csrf_protection' => false,
        ]);
    }
}
