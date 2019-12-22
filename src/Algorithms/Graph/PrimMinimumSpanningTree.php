<?php

declare(strict_types=1);

namespace App\Algorithms\Graph;

final class PrimMinimumSpanningTree
{
    public static function minimumTree(array $graph): array
    {
        $parent = [];   // Array to store the MST
        $key = [];      // used to pick minimum weight edge
        $visited = [];  // set of vertices not yet included in MST
        $length = \count($graph);

        // Initialize all keys as MAX
        for ($i = 0; $i < $length; ++$i) {
            $key[$i] = PHP_INT_MAX;
            $visited[$i] = false;
        }

        $key[0] = 0;
        $parent[0] = -1;

        // The minimum spanning tree will have V vertices
        for ($count = 0; $count < $length - 1; ++$count) {
            // Pick the minimum key vertex
            $minValue = PHP_INT_MAX;
            $minIndex = -1;

            foreach (array_keys($graph) as $vertex) {
                if (false === $visited[$vertex] && $key[$vertex] < $minValue) {
                    $minValue = $key[$vertex];
                    $minIndex = $vertex;
                }
            }

            $u = $minIndex;

            // Add the picked vertex to the MST Set
            $visited[$u] = true;

            for ($vertex = 0; $vertex < $length; ++$vertex) {
                if (0 !== $graph[$u][$vertex] && false === $visited[$vertex] &&
                    $graph[$u][$vertex] < $key[$vertex]) {
                    $parent[$vertex] = $u;
                    $key[$vertex] = $graph[$u][$vertex];
                }
            }
        }

        $minimumCost = 0;
        $edges = [];

        for ($i = 1; $i < $length; ++$i) {
            $cost = $graph[$i][$parent[$i]];
            $minimumCost += $cost;
            $edges[] = ['source' => $parent[$i], 'destination' => $i, 'cost' => $cost];
        }

        return [
            'minimum_cost' => $minimumCost,
            'edges' => $edges,
        ];
    }
}
