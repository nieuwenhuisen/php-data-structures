<?php

declare(strict_types=1);

namespace App\DataStructures\LinkedList;

use Iterator;

class LinkedListIterator implements Iterator
{
    /** @var int */
    private $currentPosition = 0;

    /** @var LinkedListInterface */
    private $linkList;

    /** @var ListNode|null */
    private $currentNode;

    public function __construct(LinkedListInterface $linkedList)
    {
        $this->linkList = $linkedList;
    }

    public function current(): ?ListNode
    {
        return $this->currentNode;
    }

    public function next(): void
    {
        ++$this->currentPosition;
        $this->currentNode = $this->currentNode ? $this->currentNode->next : null;
    }

    public function key(): int
    {
        return $this->currentPosition;
    }

    public function valid(): bool
    {
        return null !== $this->currentNode;
    }

    public function rewind(): void
    {
        $this->currentPosition = 0;
        $this->currentNode = $this->linkList->getLinkNode(0);
    }
}
