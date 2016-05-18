<?php

namespace Kevin\PortfolioBundle\Form;

use Kevin\PortfolioBundle\Form\DataTransformer\MonthSelectTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonthType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $monthsList = $this->formatMonths($options);

        $transformer = new MonthSelectTransformer();
        $builder
            ->add('month', ChoiceType::class, array('choices' => $monthsList))
            ->addModelTransformer($transformer);
        ;
    }

    private function formatMonths(array $options)
    {
        $result = array();
        $formattedMonths = array();

        foreach ($options['choices'] as $month) {
            $formattedMonths[gmmktime(0, 0, 0, $month, 15)] = $month;
        }

        $dateFormat = is_int($options['format']) ? $options['format'] : DateType::DEFAULT_FORMAT;
        $timeFormat = \IntlDateFormatter::NONE;
        $calendar = \IntlDateFormatter::GREGORIAN;

        $formatter = new \IntlDateFormatter(
            \Locale::getDefault(),
            $dateFormat,
            $timeFormat,
            null,
            $calendar,
            'MMM'
        );

        // new \IntlDateFormatter may return null instead of false in case of failure, see https://bugs.php.net/bug.php?id=66323
        if (!$formatter) {
            throw new InvalidOptionsException(intl_get_error_message(), intl_get_error_code());
        }

        $formatter->setTimeZone('UTC');
        $formatter->setLenient(false);

        foreach ($formattedMonths as $timestamp => $choice) {
            $result[$formatter->format($timestamp)] = $choice;
        }

        return $result;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => range(1, 12),
            'format' => DateType::DEFAULT_FORMAT,
        ));
    }
}
