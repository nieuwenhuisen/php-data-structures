<?php

declare(strict_types=1);

namespace App\DataStructures\Tree;

class TreeNode
{
    public $data;
    public $children = [];

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function addChildren(self $node): void
    {
        $this->children[] = $node;
    }
}
