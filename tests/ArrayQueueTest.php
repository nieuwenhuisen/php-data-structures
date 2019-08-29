<?php

namespace App\Tests;

use App\Queue\ArrayQueue;
use PHPUnit\Framework\TestCase;

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
}
