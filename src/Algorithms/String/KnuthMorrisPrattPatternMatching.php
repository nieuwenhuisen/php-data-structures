<?php

declare(strict_types=1);

namespace App\Algorithms\String;

final class KnuthMorrisPrattPatternMatching
{
    private static function computeLPS(string $pattern, array &$lps)
    {
        $length = 0;
        $i = 1;
        $patternLength = \mb_strlen($pattern);

        $lps[0] = 0;

        while ($i < $patternLength) {
            if ($pattern[$i] === $pattern[$length]) {
                ++$length;
                $lps[$i] = $length;
                ++$i;
            } elseif (0 !== $length) {
                $length = $lps[$length - 1];
            } else {
                $lps[$i] = 0;
                ++$i;
            }
        }
    }

    public static function stringMatching(string $pattern, string $text): array
    {
        $matches = [];
        $patternLength = \mb_strlen($pattern);
        $textLength = \mb_strlen($text);
        $i = $j = 0;
        $lps = [];

        self::computeLPS($pattern, $lps);

        while ($i < $textLength) {
            if ($pattern[$j] === $text[$i]) {
                ++$j;
                ++$i;
            }

            if ($j === $patternLength) {
                $matches[] = $i - $j;
                $j = $lps[$j - 1];
            } elseif ($i < $textLength && $pattern[$j] !== $text[$i]) {
                if (0 !== $j) {
                    $j = $lps[$j - 1];
                } else {
                    ++$i;
                }
            }
        }

        return $matches;
    }
}
