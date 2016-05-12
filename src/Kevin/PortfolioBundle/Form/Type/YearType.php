<?php

namespace Kevin\PortfolioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
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
        $yearsArray = range(1950, intval(date('Y')));

        $resolver->setDefaults(array('choices' => $yearsArray));
    }
}
