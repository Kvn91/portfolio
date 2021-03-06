<?php

namespace Kevin\PortfolioBundle\Utils;

class StringsOperations
{
    /*
     * Met en majuscule tous les mots d'une chaine, 
     * en prenant en compte un tableau de délimiteurs
     */
    public function ucname($string)
    {
        $delimiters = array(
            '-',
            '\'',
        );

        var_dump($string);
        $string =ucwords(mb_strtolower($string));
        var_dump($string);

        foreach ($delimiters as $delimiter) {
            if (strpos($string, $delimiter)!==false) {
                $string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
            }
        }
        return $string;
    }
}