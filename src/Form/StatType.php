<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Stat;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('country', EntityType::class, [
                'label' => 'Pays',
                'class' => Country::class, // Quelle classe est reliée au champ country
                'choice_label' => 'name', // Quel champ de country afficher dans le select
                ])
            ->add('contaminated', IntegerType::class, [
                'label' => 'Contaminé',
                ])
            ->add('healed', IntegerType::class, [
                'label' => 'Guéri',
                ])
            ->add('zombified', IntegerType::class, [
                'label' => 'Zombifié',
                ])
            ->add('stat_date', DateTimeType::class, ['label' => 'Date entrée'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stat::class,
        ]);
    }
}
