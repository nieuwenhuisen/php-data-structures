<?php

namespace App\LinkedList;

use ArrayAccess;
use Countable;

class LinkedList implements Countable, ArrayAccess
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
    }

    public function toArray()
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

    public function reverse()
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

    public function offsetExists($offset)
    {
        return $offset < $this->totalNodes;
    }

    public function offsetGet($offset)
    {
        $currentIndex = 0;
        $currentNode = $this->firstNode;

        while ($currentNode) {
            if ($currentIndex === $offset) {
                return $currentNode;
            }
            ++$currentIndex;
            $currentNode = $currentNode->next;
        }
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    public function getIterator()
    {
        return new LinkedListIterator($this);
    }
}
