<?php

namespace Kevin\PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonthType extends AbstractType
{
   public function getParent()
   {
       return DateType::class;
   }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('year')
            ->remove('day')
        ;
    }
}
