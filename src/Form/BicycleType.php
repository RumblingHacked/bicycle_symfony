<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BicycleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start', SubmitType::class, [
                'label' => 'Start Bicycle',
                'attr' => ['class' => 'btn btn-success'],
            ])
            ->add('checkStatus', SubmitType::class, [
                'label' => 'Check Status',
                'attr' => ['class' => 'btn btn-primary'],
            ])
            ->add('stop', SubmitType::class, [
                'label' => 'Stop Bicycle',
                'attr' => ['class' => 'btn btn-danger'],
            ]);
    }
}
