<?php

declare(strict_types=1);

namespace App\Algorithms\Sort;

use SplQueue;

class TopologicalSorting
{
    private static function createIncommingArray(array $matrix, SplQueue $queue): array
    {
        $size = \count($matrix);
        $incoming = array_fill(0, $size, 0);

        for ($i = 0; $i < $size; ++$i) {
            for ($j = 0; $j < $size; ++$j) {
                if ($matrix[$j][$i] > 0) {
                    ++$incoming[$i];
                }
            }
            if (0 === $incoming[$i]) {
                $queue->enqueue($i);
            }
        }

        return $incoming;
    }

    public static function sort(array $matrix): array
    {
        $queue = new SplQueue();
        $order = [];
        $size = \count($matrix);
        $incoming = self::createIncommingArray($matrix, $queue);

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();

            for ($i = 0; $i < $size; ++$i) {
                if (1 === $matrix[$node][$i]) {
                    $matrix[$node][$i] = 0;
                    --$incoming[$i];

                    if (0 === $incoming[$i]) {
                        $queue->enqueue($i);
                    }
                }
            }

            $order[] = $node;
        }

        if ($size !== \count($order)) {
            return [];
        }

        return $order;
    }
}
