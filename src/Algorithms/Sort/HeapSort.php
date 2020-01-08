<?php

declare(strict_types=1);

namespace App\Algorithms\Sort;

final class HeapSort
{
    public static function sort(array $input): array
    {
        $length = \count($input);
        self::buildHeap($input);

        $heapSize = $length - 1;

        for ($i = $heapSize; $i >= 0; --$i) {
            $tmp = $input[0];
            $input[0] = $input[$heapSize];
            $input[$heapSize] = $tmp;
            --$heapSize;
            self::heapify($input, 0, $heapSize);
        }

        return $input;
    }

    private static function buildHeap(array &$input): void
    {
        $length = \count($input);
        $heapSize = $length - 1;

        for ($i = ($length / 2); $i >= 0; --$i) {
            self::heapify($input, (int) $i, $heapSize);
        }
    }

    private static function heapify(array &$input, int $i, int $heapSize): void
    {
        $largest = $i;
        $l = 2 * $i + 1;
        $r = 2 * $i + 2;

        if ($l <= $heapSize && $input[$l] > $input[$i]) {
            $largest = $l;
        }

        if ($r <= $heapSize && $input[$r] > $input[$largest]) {
            $largest = $r;
        }

        if ($largest !== $i) {
            $tmp = $input[$i];
            $input[$i] = $input[$largest];
            $input[$largest] = $tmp;
            self::heapify($input, $largest, $heapSize);
        }
    }
}
