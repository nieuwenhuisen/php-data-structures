<?php

namespace App\Algorithms\Search;

class ExponentialSearch
{
    public static function search(array $input, int $key): bool
    {
        $count = count($input);

        if ($count === 0) {
            return -1;
        }

        $bound = 1;

        while ($bound < $count && $input[$bound] < $key) {
            $bound *= 2;
        }

        return BinarySearch::searchWithBounds($input, $key, intval($bound / 2), min($bound, $count));
    }
}
