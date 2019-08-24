<?php

namespace App\Tests\LinkedList;

use App\LinkedList\LinkedList;
use App\LinkedList\LinkedListIterator;
use App\LinkedList\ListNode;
use PHPUnit\Framework\TestCase;

class LinkedListTest extends TestCase
{
    private $linkedList;

    public function setUp(): void
    {
        $this->linkedList = new LinkedList();
    }

    private function insertLinkNodes($amount = 3): void
    {
        for ($i = 1; $i <= $amount; ++$i) {
            $this->linkedList->insert('Item '.$i);
        }
    }

    public function testInsert(): void
    {
        $this->insertLinkNodes(3);
        $this->assertCount(3, $this->linkedList);
    }

    public function testGetNode(): void
    {
        $this->insertLinkNodes(3);
        $secondNode = $this->linkedList[1];

        $this->assertSame($secondNode->data, 'Item 2');
    }

    public function testToArray(): void
    {
        $this->insertLinkNodes(3);
        $array = $this->linkedList->toArray();

        $this->assertSame($array, [
            'Item 1',
            'Item 2',
            'Item 3',
        ]);
    }

    public function testReverse(): void
    {
        $this->insertLinkNodes(3);
        $this->linkedList->reverse();
        $array = $this->linkedList->toArray();

        $this->assertSame($array, [
            'Item 3',
            'Item 2',
            'Item 1',
        ]);
    }

    public function searchDataProvider(): array
    {
        return [
            ['Item 3', 'Item 3'],
            ['Test 1', null],
            ['Item 1', 'Item 1'],
            ['Test 2', null],
            ['Item 2', 'Item 2'],
        ];
    }

    /**
     * @dataProvider searchDataProvider
     */
    public function testSearch($query, $expected): void
    {
        $this->insertLinkNodes(3);
        $searchNode = $this->linkedList->search($query);

        if (null === $expected) {
            $this->assertNull($searchNode);
        } else {
            $this->assertNotNull($searchNode);
            $this->assertInstanceOf(ListNode::class, $searchNode);
            $this->assertSame($searchNode->data, $expected);
        }
    }

    public function testIterator()
    {
        $this->insertLinkNodes(3);


        /** @var ListNode $linkNode */
        foreach ($this->linkedList->getIterator() as $linkNode) {
            $this->assertNotNull($linkNode);
            $this->assertInstanceOf(ListNode::class, $linkNode);
        }
    }
}
