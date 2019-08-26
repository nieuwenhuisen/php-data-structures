<?php

namespace App\LinkedList;

use Countable;
use Iterator;

class LinkedList implements Countable
{
    /** @var ListNode|null */
    private $firstNode;

    /** @var int */
    private $totalNodes = 0;

    public function insert($data = null): void
    {
        $node = new ListNode($data);
        ++$this->totalNodes;

        if (!$this->firstNode) {
            $this->firstNode = $node;

            return;
        }

        $currentNode = $this->firstNode;

        while ($currentNode) {
            if (!$currentNode->next) {
                $currentNode->next = $node;
                break;
            }

            $currentNode = $currentNode->next;
        }
    }

    public function getLinkNode(int $index = 0): ?ListNode
    {
        $currentIndex = 0;
        $currentNode = $this->firstNode;

        while ($currentNode) {
            if ($currentIndex === $index) {
                return $currentNode;
            }
            ++$currentIndex;
            $currentNode = $currentNode->next;
        }
    }

    public function toArray(): array
    {
        $output = [];

        if (!$this->firstNode) {
            return $output;
        }

        $currentNode = $this->firstNode;

        while ($currentNode) {
            $output[] = $currentNode->data;
            $currentNode = $currentNode->next;
        }

        return $output;
    }

    public function reverse(): void
    {
        if (!$this->firstNode || !$this->firstNode->next) {
            return;
        }

        $reversedList = null;
        $next = null;
        $currentNode = $this->firstNode;

        while ($currentNode) {
            $next = $currentNode->next;
            $currentNode->next = $reversedList;
            $reversedList = $currentNode;
            $currentNode = $next;
        }

        $this->firstNode = $reversedList;
    }

    public function search($data = null): ?ListNode
    {
        if (!$this->firstNode) {
            return null;
        }

        $currentNode = $this->firstNode;
        while (null !== $currentNode) {
            if ($currentNode->data === $data) {
                return $currentNode;
            }

            $currentNode = $currentNode->next;
        }

        return null;
    }

    public function count(): int
    {
        return $this->totalNodes;
    }

    public function getIterator(): Iterator
    {
        return new LinkedListIterator($this);
    }
}
