<?php

namespace App\DataStructure\Tests;

use App\DataStructure\Stack\ArrayStack;
use OverflowException;
use PHPUnit\Framework\TestCase;
use UnderflowException;

class ArrayStackTest extends TestCase
{
    private $stack;

    public function setUp(): void
    {
        $this->stack = new ArrayStack(5);
    }

    public function testStackIsEmpty(): void
    {
        $this->assertTrue($this->stack->isEmpty());
    }

    public function testStackPush(): void
    {
        $this->stack->push('Item 1');
        $this->stack->push('Item 2');
        $this->stack->push('Item 3');

        $this->assertCount(3, $this->stack);
    }

    public function testStackPop(): void
    {
        $this->stack->push('Item 1');
        $this->stack->push('Item 2');
        $this->stack->push('Item 3');

        $item3 = $this->stack->pop();
        $item2 = $this->stack->pop();

        $this->assertCount(1, $this->stack);
        $this->assertSame('Item 3', $item3);
        $this->assertSame('Item 2', $item2);

        $item1 = $this->stack->pop();

        $this->assertCount(0, $this->stack);
        $this->assertTrue($this->stack->isEmpty());
        $this->assertSame('Item 1', $item1);
    }

    public function testStackPeek(): void
    {
        $this->stack->push('Item 1');
        $this->stack->push('Item 2');
        $this->stack->push('Item 3');

        $this->assertSame('Item 3', $this->stack->peek());

        $this->stack->pop();

        $this->assertSame('Item 2', $this->stack->peek());

        $this->stack->pop();

        $this->assertSame('Item 1', $this->stack->peek());
    }

    public function testOverflowExceptionOnStackLimit(): void
    {
        $this->expectException(OverflowException::class);

        $this->stack->push('Item 1');
        $this->stack->push('Item 2');
        $this->stack->push('Item 3');
        $this->stack->push('Item 4');
        $this->stack->push('Item 5');
        $this->stack->push('Item 6');
    }

    public function testUnderflowExceptionOnPopWithEmtpyStack(): void
    {
        $this->expectException(UnderflowException::class);
        $this->stack->pop();
    }
}
