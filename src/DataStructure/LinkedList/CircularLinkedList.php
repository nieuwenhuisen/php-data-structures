<?php

namespace App\DataStructure\LinkedList;

use Countable;

class CircularLinkedList implements Countable
{
    private $firstNode;
    private $totalNodes = 0;

    public function insert($data = null): bool
    {
        $newNode = new ListNode($data);

        if (!$this->firstNode) {
            $this->firstNode = $newNode;
        } else {
            $currentNode = $this->firstNode;

            while ($currentNode->next !== $this->firstNode) {
                $currentNode = $currentNode->next;
            }

            $currentNode->next = $newNode;
        }

        $this->totalNodes++;
        $newNode->next = $this->firstNode;

        return true;
    }

    public function toArray(): array
    {
        $output = [];

        if (!$this->firstNode) {
            return $output;
        }

        $currentNode = $this->firstNode;

        while ($currentNode->next !== $this->firstNode) {
            $output[] = $currentNode->data;
            $currentNode = $currentNode->next;
        }

        if ($currentNode) {
            $output[] = $currentNode->data;
        }

        return $output;
    }

    public function count(): int
    {
        return $this->totalNodes;
    }
}
