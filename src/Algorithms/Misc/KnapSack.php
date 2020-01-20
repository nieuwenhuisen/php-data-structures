<?php

declare(strict_types=1);

namespace App\Algorithms\Misc;

final class KnapSack
{
    public static function getMaxValue(int $maxWeight, array $weights, array $values): int
    {
        $dp = [];
        $count = \count($values);

        for ($i = 0; $i <= $count; ++$i) {
            for ($w = 0; $w <= $maxWeight; ++$w) {
                if (0 === $i || 0 === $w) {
                    $dp[$i][$w] = 0;
                } elseif ($weights[$i - 1] <= $w) {
                    $dp[$i][$w] = max(
                        $values[$i - 1] + $dp[$i - 1][$w - $weights[$i - 1]],
                        $dp[$i - 1][$w]
                    );
                } else {
                    $dp[$i][$w] = $dp[$i - 1][$w];
                }
            }
        }

        return (int) $dp[$count][$maxWeight];
    }
}
