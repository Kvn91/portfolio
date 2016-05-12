<?php

namespace Kevin\PortfolioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonthType extends AbstractType
{
   public function getParent()
   {
       return ChoiceType::class;
   }

    public function getName()
    {
        return 'month';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $months = range(1, 12);

        $resolver->setDefaults(array(
            'choices' => array_combine($months, $months)
        ));
    }
}
