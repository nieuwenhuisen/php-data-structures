<?php

declare(strict_types=1);

namespace App\DataStructures\Tree;

use SplQueue;

class BasicTree
{
    public $root;

    public function __construct(TreeNode $node)
    {
        $this->root = $node;
    }

    public function breadthFirstSearch(TreeNode $node): array
    {
        $queue = new SplQueue();
        $output = [];

        $queue->enqueue($node);

        while (!$queue->isEmpty()) {
            /** @var TreeNode $current */
            $current = $queue->dequeue();
            $output[] = $current->data;

            foreach ($current->children as $child) {
                $queue->enqueue($child);
            }
        }

        return $output;
    }

    public function depthFirstSearch(TreeNode $node, $output = []): array
    {
        $output[] = $node->data;

        if ($node->children) {
            foreach ($node->children as $child) {
                $output = $this->depthFirstSearch($child, $output);
            }
        }

        return $output;
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
