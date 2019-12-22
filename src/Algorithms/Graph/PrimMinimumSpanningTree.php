<?php

declare(strict_types=1);

namespace App\Algorithms\Graph;

final class PrimMinimumSpanningTree
{
    public static function minimumTree(array $graph): array
    {
        $parent = [-1];
        $length = \count($graph);

        $keys = array_fill(0, $length, PHP_INT_MAX);
        $visited = array_fill(0, $length, false);

        $keys[0] = 0;

        for ($count = 0; $count < $length - 1; ++$count) {
            $minValue = PHP_INT_MAX;
            $minIndex = -1;

            foreach (array_keys($graph) as $vertex) {
                if (false === $visited[$vertex] && $keys[$vertex] < $minValue) {
                    $minValue = $keys[$vertex];
                    $minIndex = $vertex;
                }
            }

            $u = $minIndex;

            $visited[$u] = true;

            for ($vertex = 0; $vertex < $length; ++$vertex) {
                if (0 !== $graph[$u][$vertex] && false === $visited[$vertex] &&
                    $graph[$u][$vertex] < $keys[$vertex]) {
                    $parent[$vertex] = $u;
                    $keys[$vertex] = $graph[$u][$vertex];
                }
            }
        }

        return self::tree($graph, $parent);
    }

    private static function tree(array $graph, array $parent): array
    {
        $tree = [];

        foreach (array_keys($graph) as $i) {
            if (0 === $i) {
                continue;
            }

            $cost = $graph[$i][$parent[$i]];
            $tree[] = ['from' => $parent[$i], 'to' => $i, 'cost' => $cost];
        }

        return $tree;
    }
}
