<?php

namespace App\Tests;

use App\Queue\ArrayQueue;
use OverflowException;
use PHPUnit\Framework\TestCase;
use UnderflowException;

class ArrayQueueTest extends TestCase
{
    private $arrayQueue;

    public function setUp(): void
    {
        $this->arrayQueue = new ArrayQueue(5);
    }

    public function testQueueIsEmpty(): void
    {
        $this->assertTrue($this->arrayQueue->isEmpty());
    }

    public function testQueuePush(): void
    {
        $this->arrayQueue->enqueue('Item 1');
        $this->arrayQueue->enqueue('Item 2');
        $this->arrayQueue->enqueue('Item 3');

        $this->assertCount(3, $this->arrayQueue);
    }

    public function testQueuePop(): void
    {
        $this->arrayQueue->enqueue('Item 1');
        $this->arrayQueue->enqueue('Item 2');
        $this->arrayQueue->enqueue('Item 3');

        $item1 = $this->arrayQueue->dequeue();
        $item2 = $this->arrayQueue->dequeue();

        $this->assertCount(1, $this->arrayQueue);
        $this->assertSame('Item 1', $item1);
        $this->assertSame('Item 2', $item2);

        $item3 = $this->arrayQueue->dequeue();

        $this->assertCount(0, $this->arrayQueue);
        $this->assertTrue($this->arrayQueue->isEmpty());
        $this->assertSame('Item 3', $item3);
    }

    public function testQueuePeek(): void
    {
        $this->arrayQueue->enqueue('Item 1');
        $this->arrayQueue->enqueue('Item 2');
        $this->arrayQueue->enqueue('Item 3');

        $this->assertSame('Item 1', $this->arrayQueue->peek());

        $this->arrayQueue->dequeue();

        $this->assertSame('Item 2', $this->arrayQueue->peek());

        $this->arrayQueue->dequeue();

        $this->assertSame('Item 3', $this->arrayQueue->peek());
    }

    public function testOverflowExceptionOnQueueLimit(): void
    {
        $this->expectException(OverflowException::class);

        $this->arrayQueue->enqueue('Item 1');
        $this->arrayQueue->enqueue('Item 2');
        $this->arrayQueue->enqueue('Item 3');
        $this->arrayQueue->enqueue('Item 4');
        $this->arrayQueue->enqueue('Item 5');
        $this->arrayQueue->enqueue('Item 6');
    }

    public function testUnderflowExceptionOnPopWithEmtpyQueue(): void
    {
        $this->expectException(UnderflowException::class);
        $this->arrayQueue->dequeue();
    }
}
