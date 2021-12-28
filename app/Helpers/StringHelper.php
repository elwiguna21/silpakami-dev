<?php

namespace App\Helpers;

class StringHelper
{

    public static function getSynopsis($string, $length=100)
    {
        $s = substr($string, 0, $length);

        return substr($s, 0, strrpos($s, ' '));
    }

    public static function underscore($string, $isLowerCase=true)
    {
        $extract = $isLowerCase ? explode(' ', strtolower($string)) : explode(' ', $string);
        $implode = count($extract) > 1 ? implode('_', $extract) : $extract[0];

        return $implode;
    }

}