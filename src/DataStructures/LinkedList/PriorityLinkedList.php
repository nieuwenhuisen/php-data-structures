<?php

namespace App\DataStructures\LinkedList;

use Countable;

class PriorityLinkedList implements Countable
{
    /** @var ListNode|null */
    private $firstNode;

    /** @var int */
    private $totalNodes = 0;

    public function insert($data, int $priority = 0): void
    {
        $newNode = new ListNode($data, $priority);
        ++$this->totalNodes;

        if (!$this->firstNode) {
            $this->firstNode = $newNode;

            return;
        }

        $previous = $this->firstNode;
        $currentNode = $this->firstNode;

        while ($currentNode) {
            if ($currentNode->priority <= $priority) {
                if ($currentNode === $this->firstNode) {
                    $previous = $this->firstNode;
                    $this->firstNode = $newNode;
                    $newNode->next = $previous;

                    return;
                }

                $newNode->next = $currentNode;
                $previous->next = $newNode;

                return;
            }

            if (!$currentNode->next) {
                $currentNode->next = $newNode;

                return;
            }

            $previous = $currentNode;
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
}
