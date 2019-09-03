<?php

namespace App\DataStructure\LinkedList;

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

    private function createNode($data): ?ListNode
    {
        $newNode = new ListNode($data);
        ++$this->totalNodes;

        if (!$this->firstNode) {
            $this->firstNode = $newNode;
            $this->lastNode = $newNode;

            return null;
        }

        return $newNode;
    }

    public function insertAtFirst($data): void
    {
        $newNode = $this->createNode($data);

        if ($newNode && $this->firstNode) {
            $currentFirstNode = $this->firstNode;
            $newNode->next = $currentFirstNode;
            $currentFirstNode->previous = $newNode;
            $this->firstNode = $newNode;
        }
    }

    public function insertAtLast($data): void
    {
        $newNode = $this->createNode($data);

        if ($newNode && $this->lastNode) {
            $currentLastNode = $this->lastNode;
            $currentLastNode->next = $newNode;
            $newNode->previous = $currentLastNode;
            $this->lastNode = $newNode;
        }
    }

    public function insertBefore($data, $query): void
    {
        $newNode = $this->createNode($data);

        if ($newNode) {
            /** @var ListNode $previous */
            $previous = $this->firstNode;
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
        $newNode = $this->createNode($data);

        /** @var ListNode $newNode */
        if ($newNode) {
            $nextNode = null;
            $currentNode = $this->firstNode;

            while ($currentNode) {
                if ($currentNode->data === $query) {
                    if ($nextNode) {
                        $newNode->next = $nextNode;
                        $nextNode->previous = $newNode;
                    }

                    if ($currentNode === $this->lastNode) {
                        $this->lastNode = $newNode;
                    }

                    $currentNode->next = $newNode;
                    $newNode->previous = $currentNode;
                    break;
                }
                $currentNode = $currentNode->next;

                if ($currentNode) {
                    $nextNode = $currentNode->next;
                }
            }
        }
    }

    public function deleteFirst(): void
    {
        if (!$this->firstNode) {
            return;
        }

        if ($this->firstNode->next) {
            $this->firstNode = $this->firstNode->next;
            $this->firstNode->previous = null;
        } else {
            $this->firstNode = null;
        }

        --$this->totalNodes;
    }

    public function deleteLast(): void
    {
        if (!$this->lastNode) {
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

        --$this->totalNodes;
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
                    $currentNode->next->previous = $previous;
                }

                --$this->totalNodes;
                break;
            }

            $previous = $currentNode;
            $currentNode = $currentNode->next;
        }
    }

    public function toArray($direction = self::DIRECTION_FORWARD): array
    {
        $output = [];

        $forward = self::DIRECTION_FORWARD === $direction;
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
