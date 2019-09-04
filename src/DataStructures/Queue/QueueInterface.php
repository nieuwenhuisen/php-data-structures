<?php

namespace App\DataStructures\Queue;

interface QueueInterface
{
    public function enqueue($item): void;

    public function dequeue();

    public function peek();

    public function isEmpty(): bool;
}
