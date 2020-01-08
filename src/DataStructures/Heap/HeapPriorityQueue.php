<?php

declare(strict_types=1);

namespace App\DataStructures\Heap;

final class HeapPriorityQueue extends MaxHeap
{
    public function enqueue(int $val): void
    {
        $this->insert($val);
    }

    public function dequeue(): int
    {
        return $this->extractMax();
    }
}
