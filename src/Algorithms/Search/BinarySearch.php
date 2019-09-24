<?php

namespace App\Algorithms\Search;

class BinarySearch
{
    public static function search(array $input, $needle): bool
    {
        $low = 0;
        $high = count($input) - 1;

        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);

            if ($input[$mid] > $needle) {
                $high = $mid - 1;
            } else if ($input[$mid] < $needle) {
                $low = $mid + 1;
            } else {
                return true;
            }
        }

        return false;
    }

    public static function searchWithBounds(array $input, $needle, int $low, int $high): bool
    {
        if ($high < $low) {
            return false;
        }

        $mid = (int) (($low + $high) / 2);

        if ($input[$mid] > $needle) {
            return self::searchWithBounds($input, $needle, $low, $mid - 1);
        }

        if ($input[$mid] < $needle) {
            return self::searchWithBounds($input, $needle, $mid + 1, $high);
        }

        return true;
    }
}
