<?php

namespace App\Tests\DataStructure;

use App\DataStructure\LinkedList\PriorityLinkedList;
use PHPUnit\Framework\TestCase;

class PriorityLinkedListTest extends TestCase
{
    private $linkedList;

    public function setUp(): void
    {
        $this->linkedList = new PriorityLinkedList();
    }

    public function testInsert(): void
    {
        $this->linkedList->insert('Item 4', 1);
        $this->linkedList->insert('Item 3B', 2);
        $this->linkedList->insert('Item 2', 3);
        $this->linkedList->insert('Item 1', 4);
        $this->linkedList->insert('Item 3A', 2);

        $this->assertSame(
            [
                'Item 1',
                'Item 2',
                'Item 3A',
                'Item 3B',
                'Item 4',
            ],
            $this->linkedList->toArray()
        );
    }

    public function testGetLinkNode(): void
    {
        $this->linkedList->insert('Item 1', 2);
        $this->linkedList->insert('Item 2', 1);

        $secondNode = $this->linkedList->getLinkNode(1);

        $this->assertSame($secondNode->data, 'Item 2');
    }

    public function testDeleteFirst(): void
    {
        $this->linkedList->insert('Item 1', 3);
        $this->linkedList->insert('Item 2', 2);
        $this->linkedList->insert('Item 3', 1);

        $this->linkedList->deleteFirst();
        $this->assertCount(2, $this->linkedList);

        $secondNode = $this->linkedList->getLinkNode(0);

        $this->assertSame('Item 2', $secondNode->data);
    }
}
