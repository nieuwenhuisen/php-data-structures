<?php

declare(strict_types=1);

namespace App\Tests\DataStructures;

use App\DataStructures\Heap\HeapPriorityQueue;
use PHPUnit\Framework\TestCase;

final class HeapPriorityQueueTest extends TestCase
{
    public function testHeapPriorityQueue(): void
    {
        $numbers = [37, 44, 34, 65, 26, 86, 129, 83, 9];
        $queue = new HeapPriorityQueue(\count($numbers));
        $queue->create($numbers);

        $this->assertSame(129, $queue->dequeue());
        $this->assertSame(86, $queue->dequeue());
        $this->assertSame(83, $queue->dequeue());
        $this->assertSame(65, $queue->dequeue());
        $this->assertSame(44, $queue->dequeue());
        $this->assertSame(37, $queue->dequeue());
        $this->assertSame(34, $queue->dequeue());
        $this->assertSame(26, $queue->dequeue());
        $this->assertSame(9, $queue->dequeue());
    }
}
