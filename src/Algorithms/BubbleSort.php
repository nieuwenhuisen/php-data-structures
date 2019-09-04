<?php

namespace App\Algorithms;

class BubbleSort
{
    public static function sort(array $input): array
    {
        if (count($input) < 2) {
            return $input;
        }

        $length = count($input);
        $bound = $length - 1;

        for ($i = 0; $i < $length; $i++) {
            $swapped = false;
            $lastSwapPosition = 0;

            for ($j = 0; $j < $bound; $j++) {
                if ($input[$j] > $input[$j+1]) {
                    $tmp = $input[$j+1];
                    $input[$j+1] = $input[$j];
                    $input[$j] = $tmp;
                    $swapped = true;
                    $lastSwapPosition = $j;
                }
            }

            $bound = $lastSwapPosition;

            if (!$swapped) {
                break;
            }
        }

        return $input;
    }
}
