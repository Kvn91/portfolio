<?php

namespace Kevin\PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $years = range(Date('Y'), Date('Y') - 50);

        $builder
            ->add('beginYear',     YearType::class, array('choices' => range(2016, 2013)))
            ->add('beginMonth',    TextType::class)
            ->add('endYear',       YearType::class)
            ->add('endMonth',      TextType::class)
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
