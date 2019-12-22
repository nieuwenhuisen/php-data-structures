<?php

declare(strict_types=1);

namespace App\Algorithms\Graph;

use RuntimeException;

final class ShortestPathBellmanFord
{
    public static function paths(array $graph, int $source): array
    {
        $distance = [];
        $length = \count($graph);

        foreach (array_keys($graph) as $vertex) {
            $distance[$vertex] = PHP_INT_MAX;
        }

        $distance[$source] = 0;

        for ($k = 0; $k < $length - 1; ++$k) {
            for ($i = 0; $i < $length; ++$i) {
                for ($j = 0; $j < $length; ++$j) {
                    if ($distance[$i] > $distance[$j] + $graph[$j][$i]) {
                        $distance[$i] = $distance[$j] + $graph[$j][$i];
                    }
                }
            }
        }

        for ($i = 0; $i < $length; ++$i) {
            for ($j = 0; $j < $length; ++$j) {
                if ($distance[$i] > $distance[$j] + $graph[$j][$i]) {
                    throw new  RuntimeException('The graph contains a negative-weight cycle!');
                }
            }
        }

        return $distance;
    }
}
