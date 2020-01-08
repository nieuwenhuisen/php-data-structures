<?php

declare(strict_types=1);

namespace App\DataStructures\Heap;

class MaxHeap
{
    private $heap;
    private $count;

    public function __construct(int $size)
    {
        $this->heap = array_fill(0, $size, 0);
        $this->count = 0;
    }

    public function getHeap(): array
    {
        return $this->heap;
    }

    public function create(array $list = []): void
    {
        foreach ($list as $value) {
            $this->insert($value);
        }
    }

    public function insert(int $i): void
    {
        if (0 === $this->count) {
            $this->heap[0] = $i;
            $this->count = 1;

            return;
        }

        $this->heap[$this->count++] = $i;
        $this->siftUp();
    }

    public function siftUp(): void
    {
        $tmpPos = $this->count - 1;
        $tmp = (int) ($tmpPos / 2);

        while ($tmpPos > 0 && $this->heap[$tmp] < $this->heap[$tmpPos]) {
            $this->swap($tmpPos, $tmp);
            $tmpPos = (int) ($tmpPos / 2);
            $tmp = (int) ($tmpPos / 2);
        }
    }

    public function swap(int $a, int $b): void
    {
        $tmp = $this->heap[$a];
        $this->heap[$a] = $this->heap[$b];
        $this->heap[$b] = $tmp;
    }

    public function extractMax(): int
    {
        $max = $this->heap[0];
        $this->heap[0] = $this->heap[$this->count - 1];
        $this->heap[$this->count - 1] = 0;
        --$this->count;
        $this->siftDown(0);

        return $max;
    }

    public function siftDown(int $k): void
    {
        $largest = $k;
        $left = 2 * $k + 1;
        $right = 2 * $k + 2;

        if ($left < $this->count && $this->heap[$largest] < $this->heap[$left]) {
            $largest = $left;
        }

        if ($right < $this->count && $this->heap[$largest] < $this->heap[$right]) {
            $largest = $right;
        }

        if ($largest !== $k) {
            $this->swap($k, $largest);
            $this->siftDown($largest);
        }
    }
}
