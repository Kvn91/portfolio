<?php

namespace Kevin\PortfolioBundle\Form;

use Kevin\PortfolioBundle\Form\DataTransformer\YearSelectTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YearType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new YearSelectTransformer();
        $builder
            ->add('year', ChoiceType::class, array('label' => false, 'choices' => array_combine($options['choices'], $options['choices'])))
            ->addModelTransformer($transformer)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $years = range(Date('Y'), Date('Y') - 50);

        $resolver->setDefaults(array(
            'choices' => $years,
        ));

        $resolver->setAllowedTypes('choices', 'array');
    }

    public function getName()
    {
        return 'year';
    }
}
