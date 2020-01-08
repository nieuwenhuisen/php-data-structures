<?php

namespace App\Algorithms\Recursion;

class FibonacciMemoized
{
    private static $cache = [];
    public static $count = 0;

    public static function fibonacciMemoized(int $number): int
    {
        ++self::$count;

        if (0 === $number || 1 === $number) {
            return 1;
        }

        if (isset(self::$cache[$number - 1])) {
            $tmp1 = self::$cache[$number - 1];
        } else {
            $tmp1 = self::fibonacciMemoized($number - 1);
            self::$cache[$number - 1] = $tmp1;
        }

        if (isset(self::$cache[$number - 2])) {
            $tmp2 = self::$cache[$number - 2];
        } else {
            $tmp2 = self::fibonacciMemoized($number - 2);
            self::$cache[$number - 2] = $tmp2;
        }

        return $tmp1 + $tmp2;
    }
}
