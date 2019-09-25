<?php

namespace App\Tests\Algorithms\Search;

use App\Algorithms\Search\BinarySearchTree;
use App\DataStructures\Tree\Node;
use PHPUnit\Framework\TestCase;

class BinarySearchTreeTest extends TestCase
{
    public function testBinarySearchTreeTraverse(): void
    {
        $tree = new BinarySearchTree(10);

        $tree->insert(12);
        $tree->insert(6);
        $tree->insert(3);
        $tree->insert(8);
        $tree->insert(15);
        $tree->insert(13);
        $tree->insert(36);

        $this->assertSame(
            [10, 6, 3, 8, 12, 15, 13, 36],
            $tree->traverse($tree->root, BinarySearchTree::TRAVERSE_PRE_ORDER)
        );

        $this->assertSame(
            [3, 6, 8, 10, 12, 13, 15, 36],
            $tree->traverse($tree->root, BinarySearchTree::TRAVERSE_IN_ORDER)
        );

        $this->assertSame(
            [3, 8, 6, 13, 36, 15, 12, 10],
            $tree->traverse($tree->root, BinarySearchTree::TRAVERSE_POST_ORDER)
        );
    }

    public function testBinarySearchTreeSearch(): void
    {
        $tree = new BinarySearchTree(10);

        $tree->insert(12);
        $tree->insert(6);
        $tree->insert(3);
        $tree->insert(8);
        $tree->insert(15);
        $tree->insert(13);
        $tree->insert(36);

        $this->assertFalse($tree->search(14));
        $this->assertInstanceOf(Node::class, $tree->search(8));
        $this->assertFalse($tree->search(9));
        $this->assertFalse($tree->search(40));
        $this->assertInstanceOf(Node::class, $tree->search(6));
    }

    public function testBinarySearchTreeRemove(): void
    {
        $tree = new BinarySearchTree(10);

        $tree->insert(12);
        $tree->insert(6);
        $tree->insert(3);
        $tree->insert(8);
        $tree->insert(15);
        $tree->insert(13);
        $tree->insert(36);

        $tree->remove(8);
        $tree->remove(15);

        $this->assertSame(
            [3, 6, 10, 12, 13, 36],
            $tree->traverse($tree->root)
        );
    }
}
