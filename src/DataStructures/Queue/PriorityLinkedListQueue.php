<?php

declare(strict_types=1);

namespace App\DataStructures\Queue;

use App\DataStructures\LinkedList\PriorityLinkedList;
use Countable;
use OverflowException;
use UnderflowException;

class PriorityLinkedListQueue implements Countable, QueueInterface
{
    private $limit;
    private $queue;

    /**
     * @param int $limit The limit of the queue, use 0 for unlimited
     */
    public function __construct(int $limit = 0)
    {
        $this->limit = $limit;
        $this->queue = new PriorityLinkedList();
    }

    public function enqueue($item, $priority = 0): void
    {
        if ($this->limit > 0 && \count($this->queue) >= $this->limit) {
            throw new OverflowException('Queue limit reached');
        }

        $this->queue->insert($item, $priority);
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
