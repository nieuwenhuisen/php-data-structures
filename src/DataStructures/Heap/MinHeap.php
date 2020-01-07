<?php

declare(strict_types=1);

namespace App\DataStructures\Heap;

final class MinHeap
{
    private $heap;
    private $count;

    public function __construct(int $size)
    {
        $this->heap = array_fill(0, $size + 1, 0);
        $this->count = 0;
    }

    public function getHeap(): array
    {
        return \array_slice($this->heap, 1);
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
            $this->heap[1] = $i;
            $this->count = 2;

            return;
        }

        $this->heap[$this->count++] = $i;
        $this->siftUp();
    }

    public function siftUp(): void
    {
        $tmpPos = $this->count - 1;
        $tmp = (int) ($tmpPos / 2);

        while ($tmpPos > 0 && $this->heap[$tmp] > $this->heap[$tmpPos]) {
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

    public function extractMin(): int
    {
        $min = $this->heap[1];
        $this->heap[1] = $this->heap[$this->count - 1];
        $this->heap[--$this->count] = 0;
        $this->siftDown(1);

        return $min;
    }

    public function siftDown(int $k): void
    {
        $smallest = $k;
        $left = 2 * $k;
        $right = 2 * $k + 1;

        if ($left < $this->count && $this->heap[$smallest] > $this->heap[$left]) {
            $smallest = $left;
        }

        if ($right < $this->count && $this->heap[$smallest] > $this->heap[$right]) {
            $smallest = $right;
        }

        if ($smallest !== $k) {
            $this->swap($k, $smallest);
            $this->siftDown($smallest);
        }
    }
}
