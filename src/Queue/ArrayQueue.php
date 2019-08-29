<?php

namespace App\Queue;

use Countable;

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

    }

    public function dequeue()
    {

    }

    public function peek()
    {

    }

    public function count()
    {
        return count($this->queue);
    }

    public function isEmpty(): bool
    {
        return empty($this->queue);
    }
}
