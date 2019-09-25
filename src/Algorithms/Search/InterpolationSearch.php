<?php

namespace App\Algorithms\Search;

class InterpolationSearch
{
    public static function search(array $input, int $key): int
    {
        $low = 0;
        $high = \count($input) - 1;

        while ($input[$high] !== $input[$low] && $key >= $input[$low] && $key <= $input[$high]) {
            $mid = (int) ($low + (($key - $input[$low]) * ($high - $low) / ($input[$high] - $input[$low])));

            if ($input[$mid] < $key) {
                $low = $mid + 1;
            } elseif ($key < $input[$mid]) {
                $high = $mid - 1;
            } else {
                return $mid;
            }
        }

        if ($key === $input[$low]) {
            return $low;
        }

        return -1;
    }
}
