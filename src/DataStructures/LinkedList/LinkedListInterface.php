<?php

declare(strict_types=1);

namespace App\DataStructures\LinkedList;

interface LinkedListInterface
{
    public function getLinkNode(int $index = 0): ?ListNode;
}
