<?php

namespace App\LinkedList;

use Countable;

class DoublyLinkedList implements Countable
{
    public const DIRECTION_FORWARD = 'DIRECTION_FORWARD';
    public const DIRECTION_BACKWARD = 'DIRECTION_BACKWARD';

    /** @var ListNode|null */
    private $firstNode;

    /** @var ListNode|null */
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

    public function insertBefore($data, $query): void
    {
        /** @var ListNode $newNode */
        if ($newNode = $this->createNode($data)) {
            $previous = null;
            $currentNode = $this->firstNode;

            while ($currentNode) {
                if ($currentNode->data === $query) {
                    $currentNode->previous = $newNode;
                    $previous->next = $newNode;
                    $newNode->next = $currentNode;
                    $newNode->previous = $previous;
                    break;
                }

                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function insertAfter($data, $query): void
    {
        /** @var ListNode $newNode */
        if ($newNode = $this->createNode($data)) {
            $nextNode = null;
            $currentNode = $this->firstNode;

            while ($currentNode) {
                if ($currentNode->data === $query) {
                    if ($nextNode) {
                        $newNode->next = $nextNode;
                    }

                    if ($currentNode === $this->lastNode) {
                        $this->lastNode = $newNode;
                    }

                    $currentNode->next = $newNode;
                    $nextNode->previous = $newNode;
                    $newNode->previous = $currentNode;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }

    public function deleteFirst(): void
    {
        if ($this->count() === 0) {
            return;
        }

        if ($this->firstNode->next) {
            $this->firstNode = $this->firstNode->next;
            $this->firstNode->previous = null;
        } else {
            $this->firstNode = null;
        }

        $this->totalNodes--;
    }

    public function deleteLast(): void
    {
        if ($this->count() === 0) {
            return;
        }

        $currentNode = $this->lastNode;

        if (!$currentNode->previous) {
            $this->firstNode = null;
            $this->lastNode = null;
        } else {
            $previousNode = $currentNode->previous;
            $this->lastNode = $previousNode;
            $previousNode->next = null;
        }

        $this->totalNodes--;
    }

    public function delete($query): void
    {
        if ($this->count() === 0) {
            return;
        }

        $previous = null;
        $currentNode = $this->firstNode;

        while ($currentNode) {
            if ($currentNode->data === $query) {
                if (!$currentNode->next) {
                    $previous->next = null;
                } else {
                    $previous->next = $currentNode->next;
                    $currentNode->next->previous = $previous;
                }

                $this->totalNodes--;
                break;
            }

            $previous = $currentNode;
            $currentNode = $currentNode->next;
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
