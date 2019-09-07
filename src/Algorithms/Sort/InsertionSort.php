<?php

namespace App\Algorithms\Sort;

class InsertionSort
{
    public static function sort(array $input): array
    {
        $length = \count($input);

        for ($i = 1; $i < $length; ++$i) {
            $current = $input[$i];
            $j = $i - 1;

            while ($j >= 0 && $input[$j] > $current) {
                $input[$j + 1] = $input[$j];
                --$j;
            }

            $input[$j + 1] = $current;
        }

        return $input;
    }
}
