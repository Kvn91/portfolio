<?php

namespace Kevin\PortfolioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Kevin\PortfolioBundle\Form\Type\YearType;

class StudyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginYear',     YearType::class)
            ->add('endYear',       IntegerType::class)
            ->add('beginMonth',    IntegerType::class)
            ->add('endMonth',      IntegerType::class)
            ->add('establishment', TextType::class)
            ->add('title',         TextType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kevin\PortfolioBundle\Entity\Study'
        ));
    }
}
