<?php

namespace Kevin\PortfolioBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class YearSelectTransformer implements DataTransformerInterface
{
    public function __construct()
    {
    }

    public function transform($value)
    {

    }

    public function reverseTransform($value)
    {
        return $value['year'];
    }
}