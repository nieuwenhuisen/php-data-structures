<?php

namespace App\DataStructures\Tree;

class Node
{
    public $data;
    public $left;
    public $right;
    public $parent;

    public function __construct(int $data = null, Node $parent = null)
    {
        $this->data = $data;
        $this->parent = $parent;
    }

    public function min(): Node
    {
        $node = $this;

        while ($node->left) {
            $node = $node->left;
        }

        return $node;
    }

    public function max(): Node
    {
        $node = $this;

        while ($node->right) {
            $node = $node->right;
        }

        return $node;
    }

    public function successor(): ?Node
    {
        $node = $this;

        if ($node->right) {
            /** @var Node $right */
            $right = $node->right;
            return $right->min();
        }

        return null;
    }

    public function predecessor(): ?Node
    {
        $node = $this;

        if ($node->left) {
            /** @var Node $left */
            $left = $node->left;
            return $left->max();
        }

        return null;
    }
}
