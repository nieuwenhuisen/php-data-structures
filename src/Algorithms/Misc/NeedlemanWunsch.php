<?php

declare(strict_types=1);

namespace App\Algorithms\Misc;

final class NeedlemanWunsch
{
    private const GC = '-';
    private const SP = 1;
    private const GP = -1;
    private const MS = -1;

    public static function squencing(string $string1, string $string2): array
    {
        $grid = [];
        $m = \mb_strlen($string1);
        $n = \mb_strlen($string2);

        for ($i = 0; $i <= $n; ++$i) {
            $grid[$i] = [];

            for ($j = 0; $j <= $m; ++$j) {
                $grid[$i][$j] = null;
            }
        }

        $grid[0][0] = 0;

        for ($i = 1; $i <= $m; ++$i) {
            $grid[0][$i] = -1 * $i;
        }

        for ($i = 1; $i <= $n; ++$i) {
            $grid[$i][0] = -1 * $i;
        }

        for ($i = 1; $i <= $n; ++$i) {
            for ($j = 1; $j <= $m; ++$j) {
                $grid[$i][$j] = max(
                    $grid[$i - 1][$j - 1] + ($string2[$i - 1] === $string1[$j - 1] ? self::SP : self::MS),
                    $grid[$i - 1][$j] + self::GP, $grid[$i][$j - 1] + self::GP
                );
            }
        }

        return $grid;
    }
}
