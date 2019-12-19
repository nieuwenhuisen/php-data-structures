<?php

declare(strict_types=1);

namespace App\Algorithms\Sort;

class MergeSort
{
    public static function sort(array $input): array
    {
        $length = \count($input);

        if (1 === $length) {
            return $input;
        }

        $mid = $length / 2;

        $left = self::sort(\array_slice($input, 0, (int)$mid));
        $right = self::sort(\array_slice($input, (int)$mid));

        return self::merge($left, $right);
    }

    public static function merge(array $left, array $right): array
    {
        $combined = [];
        $countLeft = \count($left);
        $countRight = \count($right);
        $leftIndex = $rightIndex = 0;

        while ($leftIndex < $countLeft && $rightIndex < $countRight) {
            if ($left[$leftIndex] > $right[$rightIndex]) {
                $combined[] = $right[$rightIndex];
                ++$rightIndex;
            } else {
                $combined[] = $left[$leftIndex];
                ++$leftIndex;
            }
        }

        while ($leftIndex < $countLeft) {
            $combined[] = $left[$leftIndex];
            ++$leftIndex;
        }

        while ($rightIndex < $countRight) {
            $combined[] = $right[$rightIndex];
            ++$rightIndex;
        }

        return $combined;
    }
}
