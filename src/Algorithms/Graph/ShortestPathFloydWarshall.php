<?php

declare(strict_types=1);

namespace App\Algorithms\Graph;

final class ShortestPathFloydWarshall
{
    public static function path(array $graph): array
    {
        $dist = $graph;
        $size = count($dist);

        for ($k = 0; $k < $size; $k++) {
            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size; $j++) {
                    $dist[$i][$j] = min(
                        $dist[$i][$j],
                        $dist[$i][$k] + $dist[$k][$j]
                    );
                }
            }
        }

        return $dist;
    }
}
