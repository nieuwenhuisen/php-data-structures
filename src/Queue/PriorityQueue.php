<?php

namespace App\Queue;

class PriorityQueue implements QueueInterface
{

    public function enqueue($item, $priority = 0): void
    {
    }

    public function dequeue()
    {
    }

    public function peek()
    {
    }

    public function isEmpty(): bool
    {
    }
}
