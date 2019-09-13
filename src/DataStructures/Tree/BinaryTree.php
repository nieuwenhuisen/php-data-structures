<?php

namespace App\DataStructures\Tree;

class BinaryTree
{
    public $root;

    public function __construct(BinaryNode $node)
    {
        $this->root = $node;
    }

    public function traverse(BinaryNode $node, int $level = 0, $output = []): array
    {
        $output[] = trim(str_repeat('-', $level) . ' ' . $node->data);

        if ($node->left) {
            $output = $this->traverse($node->left, $level + 1, $output);
        }

        if ($node->right) {
            $output = $this->traverse($node->right, $level + 1, $output);
        }

        return $output;
    }
}
