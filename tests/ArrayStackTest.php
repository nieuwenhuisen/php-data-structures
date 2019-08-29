<?php

namespace App\Tests;

use App\Stack\ArrayStack;
use OverflowException;
use PHPUnit\Framework\TestCase;
use UnderflowException;

class ArrayStackTest extends TestCase
{
    private $arrayStack;

    public function setUp(): void
    {
        $this->arrayStack = new ArrayStack(5);
    }

    public function testStackIsEmpty(): void
    {
        $this->assertTrue($this->arrayStack->isEmpty());
    }

    public function testStackPush(): void
    {
        $this->arrayStack->push('Item 1');
        $this->arrayStack->push('Item 2');
        $this->arrayStack->push('Item 3');

        $this->assertCount(3, $this->arrayStack);
    }

    public function testStackPop(): void
    {
        $this->arrayStack->push('Item 1');
        $this->arrayStack->push('Item 2');
        $this->arrayStack->push('Item 3');

        $book3 = $this->arrayStack->pop();
        $book2 = $this->arrayStack->pop();

        $this->assertCount(1, $this->arrayStack);
        $this->assertSame('Item 3', $book3);
        $this->assertSame('Item 2', $book2);

        $book1 = $this->arrayStack->pop();

        $this->assertCount(0, $this->arrayStack);
        $this->assertTrue($this->arrayStack->isEmpty());
        $this->assertSame('Item 1', $book1);
    }

    public function testStackPeek(): void
    {
        $this->arrayStack->push('Item 1');
        $this->arrayStack->push('Item 2');
        $this->arrayStack->push('Item 3');

        $this->assertSame('Item 3', $this->arrayStack->peek());

        $this->arrayStack->pop();

        $this->assertSame('Item 2', $this->arrayStack->peek());

        $this->arrayStack->pop();

        $this->assertSame('Item 1', $this->arrayStack->peek());
    }

    public function testOverflowExceptionOnStackLimit(): void
    {
        $this->expectException(OverflowException::class);

        $this->arrayStack->push('Item 1');
        $this->arrayStack->push('Item 2');
        $this->arrayStack->push('Item 3');
        $this->arrayStack->push('Item 4');
        $this->arrayStack->push('Item 5');
        $this->arrayStack->push('Item 6');
    }

    public function testUnderflowExceptionOnPopWithEmtpyStack(): void
    {
        $this->expectException(UnderflowException::class);
        $this->arrayStack->pop();
    }
}
