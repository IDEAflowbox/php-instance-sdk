<?php

namespace App\Form;

use Cyberkonsultant\DTO\Group\Criteria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScenarioCriteriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filters', CollectionType::class, [
                'entry_type' => ScenarioCriteriaFilterType::class,
                'allow_add' => true
            ]);;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Criteria::class,
            'csrf_protection' => false,
        ]);
    }
}
