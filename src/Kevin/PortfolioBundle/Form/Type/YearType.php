<?php

namespace Kevin\PortfolioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YearType extends AbstractType
{
   public function getParent()
   {
       return ChoiceType::class;
   }

    public function getName()
    {
        return 'year';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $years = range(1950, date('Y'));

        $resolver->setDefaults(array(
            'choices' => array_combine($years, $years)
        ));
    }
}
