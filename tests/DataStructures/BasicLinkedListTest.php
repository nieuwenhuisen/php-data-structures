<?php

namespace App\Tests\DataStructures;

use App\DataStructures\LinkedList\BasicLinkedList;
use App\DataStructures\LinkedList\ListNode;
use PHPUnit\Framework\TestCase;

class BasicLinkedListTest extends TestCase
{
    private $linkedList;

    public function setUp(): void
    {
        $this->linkedList = new BasicLinkedList();
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

    public function testInsertAtFirst(): void
    {
        $this->insertLinkNodes(3);
        $this->linkedList->insertAtFirst('First item');

        $firstNode = $this->linkedList->getLinkNode(0);
        $this->assertSame('First item', $firstNode->data);
    }

    public function testDelete(): void
    {
        $this->insertLinkNodes(3);
        $this->linkedList->delete('Item 2');
        $this->assertCount(2, $this->linkedList);

        $secondNode = $this->linkedList->getLinkNode(1);
        $this->assertSame('Item 3', $secondNode->data);
    }

    public function testDeleteFirst(): void
    {
        $this->insertLinkNodes(3);
        $this->linkedList->deleteFirst();
        $this->assertCount(2, $this->linkedList);

        $secondNode = $this->linkedList->getLinkNode(0);

        $this->assertSame('Item 2', $secondNode->data);
    }

    public function testDeleteLast(): void
    {
        $this->insertLinkNodes(3);
        $this->linkedList->deleteLast();
        $this->assertCount(2, $this->linkedList);

        $secondNode = $this->linkedList->getLinkNode(1);

        $this->assertSame('Item 2', $secondNode->data);
    }

    public function testGetLinkNode(): void
    {
        $this->insertLinkNodes(3);
        $secondNode = $this->linkedList->getLinkNode(1);

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

    public function testIterator(): void
    {
        $this->insertLinkNodes(3);

        /** @var ListNode $linkNode */
        foreach ($this->linkedList->getIterator() as $linkNode) {
            $this->assertNotNull($linkNode);
            $this->assertInstanceOf(ListNode::class, $linkNode);
        }
    }
}
