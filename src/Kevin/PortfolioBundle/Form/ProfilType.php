<?php

namespace Kevin\PortfolioBundle\Form;

use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $yearsArray = range(date('Y') - 100, date('Y'));

       $builder
           ->add('name',         TextType::class)
           ->add('firstname',    TextType::class)
           ->add('birthdayDate', BirthdayType::class, array('years' => $yearsArray))
           ->add('country',      CountryType::class)
           ->add('city',         TextType::class)
           ->add('postalCode',   IntegerType::class)
           ->add('address',      TextType::class)
           ->add('title',        TextType::class)
           ->add('email',        EmailType::class)
           ->add('phoneNumber',  PhoneNumberType::class, array('default_region' => 'FR', 'format' => PhoneNumberFormat::NATIONAL))
           ->add('image',        ImageType::class, array('required' => false))
           ->add('studies',      CollectionType::class, array(
                   'entry_type'   => StudyType::class,
                   'allow_add'    => true,
                   'allow_delete' => true,
                   'by_reference' => false,
               )
           )
//           ->add('experiences',      CollectionType::class, array(
//                   'entry_type'   => ExperienceType::class,
//                   'allow_add'    => true,
//                   'allow_delete' => true,
//               )
//           )
           ->add('save',         SubmitType::class)
       ;
   }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kevin\PortfolioBundle\Entity\Profil'
        ));
    }
}