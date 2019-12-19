<?php

declare(strict_types=1);

namespace App\DataStructures\Queue;

use App\DataStructures\LinkedList\BasicLinkedList;
use Countable;
use OverflowException;
use UnderflowException;

class LinkedListQueue implements QueueInterface, Countable
{
    private $limit;
    private $queue;

    /**
     * @param int $limit The limit of the queue, use 0 for unlimited
     */
    public function __construct(int $limit = 0)
    {
        $this->limit = $limit;
        $this->queue = new BasicLinkedList();
    }

    public function enqueue($item): void
    {
        if ($this->limit > 0 && \count($this->queue) >= $this->limit) {
            throw new OverflowException('Queue limit reached');
        }

        $this->queue->insert($item);
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Queue is empty');
        }

        $lastItem = $this->peek();
        $this->queue->deleteFirst();

        return $lastItem;
    }

    public function peek()
    {
        return $this->queue->getLinkNode(0)->data;
    }

    public function count(): int
    {
        return $this->queue->count();
    }

    public function isEmpty(): bool
    {
        return 0 === $this->count();
    }
}
