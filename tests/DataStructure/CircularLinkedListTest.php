<?php

namespace App\DataStructure\Tests;

use App\DataStructure\LinkedList\CircularLinkedList;
use PHPUnit\Framework\TestCase;

class CircularLinkedListTest extends TestCase
{
    private $linkedList;

    public function setUp(): void
    {
        $this->linkedList = new CircularLinkedList();
    }

    public function testInsertAtEnd(): void
    {
        $result = $this->linkedList->insert('Item 1');

        $this->assertTrue($result);
        $this->assertCount(1, $this->linkedList);
    }

    public function testToArray(): void
    {
        $this->linkedList->insert('Item 1');
        $this->linkedList->insert('Item 2');
        $this->linkedList->insert('Item 3');

        $array = $this->linkedList->toArray();

        $this->assertSame($array, [
            'Item 1',
            'Item 2',
            'Item 3',
        ]);
    }
}
