<?php

namespace App\Queue;

interface QueueInterface
{
    public function enqueue($item): void;
    public function dequeue();
    public function peek();
    public function isEmpty(): bool;
}
