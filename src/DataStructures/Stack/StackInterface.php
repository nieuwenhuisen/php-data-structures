<?php

declare(strict_types=1);

namespace App\DataStructures\Stack;

interface StackInterface
{
    public function push($item): void;

    public function pop();

    public function peek();

    public function isEmpty(): bool;
}
