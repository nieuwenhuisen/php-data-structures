<?php declare(strict_types=1);

namespace App\Algorithms\String;

use SplPriorityQueue;

final class HuffmanCoding
{
    public static function encode(array $symbols): array
    {
        $heap = new SplPriorityQueue;
        $heap->setExtractFlags(SplPriorityQueue::EXTR_BOTH);

        foreach ($symbols as $symbol => $weight) {
            $heap->insert([$symbol => ''], -$weight);
        }

        while ($heap->count() > 1) {
            $low = $heap->extract();
            $high = $heap->extract();

            foreach ($low['data'] as &$x) {
                $x = '0' . $x;
            }

            foreach ($high['data'] as &$x) {
                $x = '1' . $x;
            }

            $heap->insert($low['data'] + $high['data'],
                $low['priority'] + $high['priority']);
        }

        $result = $heap->extract();
        return $result['data'];
    }
}
