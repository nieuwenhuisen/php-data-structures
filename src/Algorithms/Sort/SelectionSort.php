<?php

namespace App\Algorithms\Sort;

class SelectionSort
{
    public static function sort(array $input): array
    {
        $length = \count($input);

        for ($i = 0; $i < $length; ++$i) {
            $min = $i;

            for ($j = $i + 1; $j < $length; ++$j) {
                if ($input[$j] < $input[$min]) {
                    $min = $j;
                }
            }

            if ($min !== $i) {
                $tmp = $input[$i];
                $input[$i] = $input[$min];
                $input[$min] = $tmp;
            }
        }

        return $input;
    }
}
