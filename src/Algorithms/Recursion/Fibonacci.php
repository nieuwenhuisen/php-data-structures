<?php

namespace App\Algorithms\Recursion;

class Fibonacci
{
    public static function fibonacci(int $number): int
    {
        if (0 === $number || 1 === $number) {
            return 1;
        }

        return self::fibonacci($number - 1) + self::fibonacci($number - 2);
    }
}
