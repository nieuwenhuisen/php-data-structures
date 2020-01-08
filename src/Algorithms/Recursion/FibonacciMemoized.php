<?php

namespace App\Algorithms\Recursion;

class FibonacciMemoized
{
    public static $count = 0;

    public static function fibonacciMemoized(int $number, &$cache = []): int
    {
        ++static::$count;

        if (0 === $number || 1 === $number) {
            return 1;
        }

        if (isset($cache[$number - 1])) {
            $tmp1 = $cache[$number - 1];
        } else {
            $tmp1 = static::fibonacciMemoized($number - 1, $cache);
            $cache[$number - 1] = $tmp1;
        }

        if (isset($cache[$number - 2])) {
            $tmp2 = $cache[$number - 2];
        } else {
            $tmp2 = static::fibonacciMemoized($number - 2, $cache);
            $cache[$number - 2] = $tmp2;
        }

        return $tmp1 + $tmp2;
    }
}
