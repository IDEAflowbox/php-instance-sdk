<?php

namespace App\Form;

use App\Dto\CreateClientDto;
use App\Entity\IssuerAddress;
use Cyberkonsultant\DTO\RecommendationFrame;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateAdvancedFrameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('groupId')
            ->add('numberOfProducts', NumberType::class)
            ->add('xpath')
            ->add('customHtml');

        /** @var RecommendationFrame $data */
        $data = $builder->getData();
        $data->setFrameType('advanced');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecommendationFrame::class,
            'csrf_protection' => false,
        ]);
    }
}
