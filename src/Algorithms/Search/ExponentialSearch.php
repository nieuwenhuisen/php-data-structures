<?php

declare(strict_types=1);

namespace App\Algorithms\Search;

class ExponentialSearch
{
    public static function search(array $input, int $key): bool
    {
        $count = \count($input);

        if (0 === $count) {
            return false;
        }

        $bound = 1;

        while ($bound < $count && $input[$bound] < $key) {
            $bound *= 2;
        }

        return BinarySearch::searchWithBounds($input, $key, (int) ($bound / 2), min($bound, $count));
    }
}
