<?php

namespace App\Tests;

use App\LinkedList\DoublyLinkedList;
use PHPUnit\Framework\TestCase;

class DoublyLinkedListTest extends TestCase
{
    private $linkedList;

    public function setUp(): void
    {
        $this->linkedList = new DoublyLinkedList();
    }

    public function testInsertAtFirst(): void
    {
        $this->linkedList->insertAtFirst('Item 1');
        $this->linkedList->insertAtFirst('Item 2');

        $this->assertEquals(
            [
                'Item 2',
                'Item 1',
            ],
            $this->linkedList->toArray()
        );
    }

    public function testCount(): void
    {
        $this->linkedList->insertAtFirst('Item 1');
        $this->linkedList->insertAtFirst('Item 2');

        $this->assertCount(2, $this->linkedList);
    }

    public function testInsertAtLast(): void
    {
        $this->linkedList->insertAtLast('Item 1');
        $this->linkedList->insertAtLast('Item 2');

        $this->assertEquals(
            [
                'Item 1',
                'Item 2',
            ],
            $this->linkedList->toArray()
        );
    }

    public function testInsertBefore(): void
    {
        $this->linkedList->insertAtLast('Item 1');
        $this->linkedList->insertAtLast('Item 2');
        $this->linkedList->insertAtLast('Item 4');
        $this->linkedList->insertBefore('Item 3', 'Item 4');

        $this->assertEquals(
            [
                'Item 1',
                'Item 2',
                'Item 3',
                'Item 4',
            ],
            $this->linkedList->toArray()
        );
    }

    public function testInsertAfter(): void
    {
        $this->linkedList->insertAtLast('Item 1');
        $this->linkedList->insertAtLast('Item 2');
        $this->linkedList->insertAtLast('Item 4');
        $this->linkedList->insertAfter('Item 3', 'Item 2');

        $this->assertEquals(
            [
                'Item 1',
                'Item 2',
                'Item 3',
                'Item 4',
            ],
            $this->linkedList->toArray()
        );
    }

    public function testDeleteFirst(): void
    {
        $this->linkedList->insertAtLast('Item 1');
        $this->linkedList->insertAtLast('Item 2');
        $this->linkedList->insertAtLast('Item 3');
        $this->linkedList->insertAtLast('Item 4');

        $this->linkedList->deleteFirst();

        $this->assertCount(3, $this->linkedList);

        $this->assertEquals(
            [
                'Item 2',
                'Item 3',
                'Item 4',
            ],
            $this->linkedList->toArray()
        );
    }

    public function testDeleteLast(): void
    {
        $this->linkedList->insertAtLast('Item 1');
        $this->linkedList->insertAtLast('Item 2');
        $this->linkedList->insertAtLast('Item 3');
        $this->linkedList->insertAtLast('Item 4');

        $this->linkedList->deleteLast();

        $this->assertCount(3, $this->linkedList);

        $this->assertEquals(
            [
                'Item 1',
                'Item 2',
                'Item 3',
            ],
            $this->linkedList->toArray()
        );
    }

    public function testDelete(): void
    {
        $this->linkedList->insertAtLast('Item 1');
        $this->linkedList->insertAtLast('Item 2');
        $this->linkedList->insertAtLast('Item 3');
        $this->linkedList->insertAtLast('Item 4');

        $this->linkedList->delete('Item 2');
        $this->linkedList->delete('Item 3');

        $this->assertCount(2, $this->linkedList);

        $this->assertEquals(
            [
                'Item 1',
                'Item 4',
            ],
            $this->linkedList->toArray()
        );
    }

    public function testToArray(): void
    {
        $this->linkedList->insertAtLast('Item 1');
        $this->linkedList->insertAtLast('Item 2');
        $this->linkedList->insertAtLast('Item 3');

        $this->assertEquals(
            [
                'Item 1',
                'Item 2',
                'Item 3',
            ],
            $this->linkedList->toArray(
                DoublyLinkedList::DIRECTION_FORWARD
            )
        );

        $this->assertEquals(
            [
                'Item 3',
                'Item 2',
                'Item 1',
            ],
            $this->linkedList->toArray(
                DoublyLinkedList::DIRECTION_BACKWARD
            )
        );
    }
}
