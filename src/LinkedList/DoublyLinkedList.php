<?php

namespace App\LinkedList;

use Countable;

class DoublyLinkedList implements Countable
{
    public const DIRECTION_FORWARD = 'DIRECTION_FORWARD';
    public const DIRECTION_BACKWARD = 'DIRECTION_BACKWARD';

    private $firstNode;
    private $lastNode;
    private $totalNodes = 0;

    private function createNode($data)
    {
        $newNode = new ListNode($data);
        $this->totalNodes++;

        if (!$this->firstNode) {
            $this->firstNode = $newNode;
            $this->lastNode = $newNode;

            return null;
        }

        return $newNode;
    }

    public function insertAtFirst($data): void
    {
        if ($newNode = $this->createNode($data)) {
            $currentFirstNode = $this->firstNode;
            $newNode->next = $currentFirstNode;
            $currentFirstNode->prev = $newNode;
            $this->firstNode = $newNode;
        }
    }

    public function insertAtLast($data): void
    {
        if ($newNode = $this->createNode($data)) {
            $currentLastNode = $this->lastNode;
            $currentLastNode->next = $newNode;
            $newNode->previous = $currentLastNode;
            $this->lastNode = $newNode;
        }
    }

    public function toArray($direction = self::DIRECTION_FORWARD): array
    {
        $output = [];

        $forward = $direction === self::DIRECTION_FORWARD;
        $currentNode = $forward ? $this->firstNode : $this->lastNode;

        /** @var ListNode $currentNode */
        while ($currentNode) {
            $output[] = $currentNode->data;
            $currentNode = $forward ? $currentNode->next : $currentNode->previous;
        }

        return $output;
    }

    public function count(): int
    {
        return $this->totalNodes;
    }
}
