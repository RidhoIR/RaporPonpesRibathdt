<?php

namespace App\Helpers;

class NumberHelper
{
    public static function toRoman($num)
    {
        $n = intval($num);
        $result = '';

        $lookup = [
            'II' => 2,
            'I' => 1,
        ];

        foreach ($lookup as $roman => $value) {
            $matches = intval($n / $value);
            $result .= str_repeat($roman, $matches);
            $n = $n % $value;
        }

        return $result;
    }
}
