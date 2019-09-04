<?php

namespace App\DataStructures\Queue;

use Countable;
use OverflowException;
use UnderflowException;

class ArrayQueue implements QueueInterface, Countable
{
    private $limit;
    private $queue;

    /**
     * @param int $limit The limit of the queue, use 0 for unlimited
     */
    public function __construct(int $limit = 0)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    public function enqueue($item): void
    {
        if ($this->limit > 0 && \count($this->queue) >= $this->limit) {
            throw new OverflowException('Queue limit reached');
        }

        $this->queue[] = $item;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Queue is empty');
        }

        return array_shift($this->queue);
    }

    public function peek()
    {
        return current($this->queue);
    }

    public function count()
    {
        return \count($this->queue);
    }

    public function isEmpty(): bool
    {
        return empty($this->queue);
    }
}
