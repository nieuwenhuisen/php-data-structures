<?php

namespace App\LinkedList;

use Iterator;

class LinkedListIterator implements Iterator
{
    /** @var int */
    private $currentPosition = 0;

    /** @var LinkedList */
    private $linkList;

    /** @var ListNode|null */
    private $currentNode;

    public function __construct(LinkedList $linkedList)
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
