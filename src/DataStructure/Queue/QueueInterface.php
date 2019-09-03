<?php

namespace App\DataStructure\Queue;

interface QueueInterface
{
    public function enqueue($item): void;

    public function dequeue();

    public function peek();

    public function isEmpty(): bool;
}
