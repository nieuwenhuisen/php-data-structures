<?php

declare(strict_types=1);

namespace App\Algorithms\Search;

class LinearSearch
{
    public static function search(array $input, $needle): bool
    {
        $totalItems = \count($input);

        for ($i = 0; $i < $totalItems; ++$i) {
            if ($input[$i] === $needle) {
                return true;
            }
        }

        return false;
    }
}
