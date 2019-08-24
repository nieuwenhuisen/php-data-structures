<?php

namespace App\Stack;

use Countable;
use OverflowException;
use UnderflowException;

class ArrayStack implements StackInterface, Countable
{
    private $limit;
    private $stack;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->stack = [];
    }

    public function push($item): void
    {
        if (\count($this->stack) >= $this->limit) {
            throw new OverflowException('Stack limit reached');
        }

        $this->stack[] = $item;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Stack is empty');
        }

        return array_pop($this->stack);
    }

    public function peek()
    {
        return end($this->stack);
    }

    public function count(): int
    {
        return \count($this->stack);
    }

    public function isEmpty(): bool
    {
        return 0 === $this->count();
    }
}
