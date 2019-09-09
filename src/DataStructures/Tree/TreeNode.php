<?php

namespace App\DataStructures\Tree;

class TreeNode
{
    public $data;
    public $children = [];

    public function __construct($data = null) {
        $this->data = $data;
    }

    public function addChildren(TreeNode $node): void
    {
        $this->children[] = $node;
    }
}
