<?php

namespace App\Algorithms\Sort;

use function count;

class QuickSort
{
    public static function sort(array &$input, $p = 0, $r = false): void
    {
        if (false === $r) {
            $r = count($input) - 1;
        }

        if ($p < $r) {
            $q = self::partition($input, $p, $r);
            self::sort($input, $p, $q);
            self::sort($input, $q + 1, $r);
        }
    }

    public static function partition(array &$input, int $p, int $r): ?int
    {
        $pivot = $input[$p];
        $i = $p - 1;
        $j = $r + 1;

        while (true) {
            do {
                ++$i;
            } while ($input[$i] < $pivot && $input[$i] !== $pivot);

            do {
                --$j;
            } while ($input[$j] > $pivot && $input[$j] !== $pivot);

            if ($i < $j) {
                $temp = $input[$i];
                $input[$i] = $input[$j];
                $input[$j] = $temp;
            } else {
                return $j;
            }
        }
    }
}
