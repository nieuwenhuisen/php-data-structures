<?php

namespace App\DataStructures\Tree;

class BinaryNode
{
    public $data;
    public $left;
    public $right;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function addChildren(self $left, self $right): void
    {
        $this->left = $left;
        $this->right = $right;
    }
}
