<?php

declare(strict_types=1);

namespace App\Algorithms\Misc;

final class LongestCommonSubsequence
{
    public static function length(string $x, string $y): int
    {
        $countX = \mb_strlen($x); // M
        $countY = \mb_strlen($y);
        $l = [];

        for ($i = 0; $i <= $countX; ++$i) {
            $l[$i][0] = 0;
        }

        for ($j = 0; $j <= $countY; ++$j) {
            $l[0][$j] = 0;
        }

        for ($i = 0; $i <= $countX; ++$i) {
            for ($j = 0; $j <= $countY; ++$j) {
                if (0 === $i || 0 === $j) {
                    $l[$i][$j] = 0;
                } elseif ($x[$i - 1] === $y[$j - 1]) {
                    $l[$i][$j] = $l[$i - 1][$j - 1] + 1;
                } else {
                    $l[$i][$j] = max($l[$i - 1][$j], $l[$i][$j - 1]);
                }
            }
        }

        return $l[$countX][$countY];
    }
}
