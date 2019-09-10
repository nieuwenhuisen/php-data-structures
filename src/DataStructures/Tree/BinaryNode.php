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

    public function addChildren(BinaryNode $left, BinaryNode $right): void
    {
        $this->left = $left;
        $this->right = $right;
    }
}
