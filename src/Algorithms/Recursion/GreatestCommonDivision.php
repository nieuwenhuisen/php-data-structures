<?php

declare(strict_types=1);

namespace App\Algorithms\Recursion;

class GreatestCommonDivision
{
    public static function gcd(int $a, int $b): int
    {
        if (0 === $b) {
            return $a;
        }

        return self::gcd($b, $a % $b);
    }
}
