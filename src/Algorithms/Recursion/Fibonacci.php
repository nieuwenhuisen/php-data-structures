<?php

declare(strict_types=1);

namespace App\Algorithms\Recursion;

class Fibonacci
{
    public static $count = 0;

    public static function fibonacci(int $number): int
    {
        ++self::$count;

        if (0 === $number || 1 === $number) {
            return 1;
        }

        return self::fibonacci($number - 1) + self::fibonacci($number - 2);
    }
}
