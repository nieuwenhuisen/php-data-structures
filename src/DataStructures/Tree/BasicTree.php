<?php

namespace App\DataStructures\Tree;

class BasicTree
{
    public $root;

    public function __construct(TreeNode $node)
    {
        $this->root = $node;
    }

    public function traverse(TreeNode $node, int $level = 0, $output = []): array
    {
        $output[] = trim(str_repeat('-', $level).' '.$node->data);

        foreach ($node->children as $childNode) {
            $output = $this->traverse($childNode, $level + 1, $output);
        }

        return $output;
    }
}
