<?php

declare(strict_types=1);

namespace App\Algorithms\Graph;

use SplPriorityQueue;

final class ShortestPathDijkstra
{
    public static function path(array $graph, string $source, string $target): array
    {
        $distanceList = [];
        $predecessor = [];
        $queue = new SplPriorityQueue();

        foreach ($graph as $vertex => $adjudication) {
            $distanceList[$vertex] = PHP_INT_MAX;
            $predecessor[$vertex] = null;
            $queue->insert($vertex, min($adjudication));
        }

        $distanceList[$source] = 0;

        while (!$queue->isEmpty()) {
            $u = $queue->extract();
            if (!empty($graph[$u])) {
                foreach ($graph[$u] as $vertex => $cost) {
                    if ($distanceList[$u] + $cost < $distanceList[$vertex]) {
                        $distanceList[$vertex] = $distanceList[$u] + $cost;
                        $predecessor[$vertex] = $u;
                    }
                }
            }
        }

        $stack = [];
        $u = $target;
        $distance = 0;

        while (isset($predecessor[$u]) && $predecessor[$u]) {
            array_unshift($stack, $u);
            $distance += $graph[$u][$predecessor[$u]];
            $u = $predecessor[$u];
        }

        if (0 === \count($stack)) {
            return ['distance' => 0, 'path' => $stack];
        }

        array_unshift($stack, $source);

        return ['distance' => $distance, 'path' => $stack];
    }
}
