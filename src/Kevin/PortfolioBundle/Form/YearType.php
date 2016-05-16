<?php

namespace Kevin\PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YearType extends AbstractType
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
//        foreach ($view->vars['choices'] as $key=>$choice){
//            $view->vars['choices'][$key]->label = $view->vars['choices'][$key]->value;
//        }
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        var_dump($builder);exit;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $years = range(Date('Y'), Date('Y') - 50);

        $resolver->setDefaults(array(
            'choices' => $years,
        ));

        $resolver->setAllowedTypes('choices', 'array');
    }

    public function getParent()
    {
        return ChoiceType::class;
    }

    public function getName()
    {
        return 'year';
    }
}
