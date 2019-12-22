<?php

declare(strict_types=1);

namespace App\Algorithms\Graph;

final class KruskalMinimumSpanningTree
{
    public static function minimumTree(array $graph): array
    {
        $length = \count($graph);
        $tree = [];

        $set = [];
        foreach (array_keys($graph) as $key) {
            $set[$key] = [$key];
        }

        $edges = [];
        for ($i = 0; $i < $length; ++$i) {
            for ($j = 0; $j < $i; ++$j) {
                if ($graph[$i][$j]) {
                    $edges[$i.','.$j] = $graph[$i][$j];
                }
            }
        }

        asort($edges);

        foreach (array_keys($edges) as $key) {
            [$i, $j] = explode(',', $key);
            $i = (int) $i;
            $j = (int) $j;

            $iSet = self::findSet($set, $i);
            $jSet = self::findSet($set, $j);

            if ($iSet !== $jSet) {
                $tree[] = [
                    'from' => $i,
                    'to' => $j,
                    'cost' => $graph[$i][$j],
                ];
                self::unionSet($set, $iSet, $jSet);
            }
        }

        return $tree;
    }

    private static function findSet(array &$set, $index)
    {
        foreach ($set as $key => $vertex) {
            if (\in_array($index, $vertex, true)) {
                return $key;
            }
        }

        return false;
    }

    private static function unionSet(array &$set, int $i, int $j): void
    {
        $a = $set[$i];
        $b = $set[$j];
        unset($set[$i], $set[$j]);
        $set[] = array_merge($a, $b);
    }
}
