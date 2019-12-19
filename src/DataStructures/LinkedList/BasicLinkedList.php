<?php

declare(strict_types=1);

namespace App\DataStructures\LinkedList;

use Countable;
use Iterator;

class BasicLinkedList implements Countable, LinkedListInterface
{
    /** @var ListNode|null */
    private $firstNode;

    /** @var int */
    private $totalNodes = 0;

    public function insert($data): void
    {
        $this->insertAt($data);
    }

    public function insertAtFirst($data): void
    {
        $this->insertAt($data, 0);
    }

    private function insertAt($data, $index = false): void
    {
        $node = new ListNode($data);
        ++$this->totalNodes;

        if (!$this->firstNode) {
            $this->firstNode = $node;

            return;
        }

        $currentNode = $this->firstNode;

        if (0 === $index) {
            $node->next = $currentNode;
            $this->firstNode = $node;

            return;
        }

        while ($currentNode) {
            if (!$currentNode->next) {
                $currentNode->next = $node;

                return;
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

    public function delete($query): void
    {
        if (!$this->firstNode) {
            return;
        }

        $previous = $this->firstNode;
        $currentNode = $this->firstNode;

        while ($currentNode) {
            if ($currentNode->data === $query) {
                if (!$currentNode->next) {
                    $previous->next = null;
                } else {
                    $previous->next = $currentNode->next;
                }

                --$this->totalNodes;

                return;
            }

            $previous = $currentNode;
            $currentNode = $currentNode->next;
        }
    }

    public function deleteFirst(): void
    {
        if (!$this->firstNode) {
            return;
        }

        if ($this->firstNode->next) {
            $this->firstNode = $this->firstNode->next;
        } else {
            $this->firstNode = null;
        }

        --$this->totalNodes;
    }

    public function deleteLast(): void
    {
        if (!$this->firstNode) {
            return;
        }

        $currentNode = $this->firstNode;

        if (!$currentNode->next) {
            $this->firstNode = null;
        } else {
            $previousNode = null;

            while ($currentNode->next) {
                $previousNode = $currentNode;
                $currentNode = $currentNode->next;
            }

            $previousNode->next = null;
            --$this->totalNodes;
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

    public function count(): int
    {
        return $this->totalNodes;
    }

    public function getIterator(): Iterator
    {
        return new LinkedListIterator($this);
    }
}
