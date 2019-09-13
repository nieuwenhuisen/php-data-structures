<?php

namespace App\Algorithms\Recursion;

class Factorial
{
    public static function factorial(int $number): int
    {
        if ($number === 0) {
            return 1;
        }

        return $number * self::factorial($number - 1);
    }
}
