<?php

declare(strict_types=1);

namespace App\Algorithms\String;

final class PatternMatching
{
    public static function findAll(string $pattern, string $text): array
    {
        $patternLength = \mb_strlen($pattern);
        $textLength = \mb_strlen($text);
        $positions = [];

        for ($i = 0; $i <= $textLength - $patternLength; ++$i) {
            for ($j = 0; $j < $patternLength; ++$j) {
                if ($text[$i + $j] !== $pattern[$j]) {
                    break;
                }
            }

            if ($j === $patternLength) {
                $positions[] = $i;
            }
        }

        return $positions;
    }
}
