<?php

declare(strict_types=1);

namespace App\DataStructures\Queue;

interface QueueInterface
{
    public function enqueue($item): void;

    public function dequeue();

    public function peek();

    public function isEmpty(): bool;
}
