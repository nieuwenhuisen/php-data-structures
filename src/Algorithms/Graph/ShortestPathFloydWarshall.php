<?php

declare(strict_types=1);

namespace App\Algorithms\Graph;

final class ShortestPathFloydWarshall
{
    public static function paths(array $graph): array
    {
        $distance = $graph;
        $size = count($distance);

        for ($k = 0; $k < $size; $k++) {
            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size; $j++) {
                    $distance[$i][$j] = min(
                        $distance[$i][$j],
                        $distance[$i][$k] + $distance[$k][$j]
                    );
                }
            }
        }

        return $distance;
    }
}
