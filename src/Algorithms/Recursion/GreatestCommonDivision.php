<?php

namespace App\Algorithms\Recursion;

class GreatestCommonDivision
{
    public static function gcd(int $a, int $b): int
    {
        if ($b === 0) {
            return $a;
        }

        return self::gcd($b, $a % $b);
    }
}
