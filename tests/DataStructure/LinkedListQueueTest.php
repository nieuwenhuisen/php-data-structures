<?php

namespace App\DataStructure\Tests;

use App\DataStructure\Queue\LinkedListQueue;
use OverflowException;
use PHPUnit\Framework\TestCase;
use UnderflowException;

class LinkedListQueueTest extends TestCase
{
    private $queue;

    public function setUp(): void
    {
        $this->queue = new LinkedListQueue(5);
    }

    public function testQueueIsEmpty(): void
    {
        $this->assertTrue($this->queue->isEmpty());
    }

    public function testQueuePush(): void
    {
        $this->queue->enqueue('Item 1');
        $this->queue->enqueue('Item 2');
        $this->queue->enqueue('Item 3');

        $this->assertCount(3, $this->queue);
    }

    public function testQueuePop(): void
    {
        $this->queue->enqueue('Item 1');
        $this->queue->enqueue('Item 2');
        $this->queue->enqueue('Item 3');

        $item1 = $this->queue->dequeue();
        $item2 = $this->queue->dequeue();

        $this->assertCount(1, $this->queue);
        $this->assertSame('Item 1', $item1);
        $this->assertSame('Item 2', $item2);

        $item3 = $this->queue->dequeue();

        $this->assertCount(0, $this->queue);
        $this->assertTrue($this->queue->isEmpty());
        $this->assertSame('Item 3', $item3);
    }

    public function testQueuePeek(): void
    {
        $this->queue->enqueue('Item 1');
        $this->queue->enqueue('Item 2');
        $this->queue->enqueue('Item 3');

        $this->assertSame('Item 1', $this->queue->peek());

        $this->queue->dequeue();

        $this->assertSame('Item 2', $this->queue->peek());

        $this->queue->dequeue();

        $this->assertSame('Item 3', $this->queue->peek());
    }

    public function testOverflowExceptionOnQueueLimit(): void
    {
        $this->expectException(OverflowException::class);

        $this->queue->enqueue('Item 1');
        $this->queue->enqueue('Item 2');
        $this->queue->enqueue('Item 3');
        $this->queue->enqueue('Item 4');
        $this->queue->enqueue('Item 5');
        $this->queue->enqueue('Item 6');
    }

    public function testUnderflowExceptionOnPopWithEmtpyQueue(): void
    {
        $this->expectException(UnderflowException::class);
        $this->queue->dequeue();
    }
}
