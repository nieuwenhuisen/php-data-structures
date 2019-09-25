<?php

namespace App\Algorithms\Search;

use App\DataStructures\Tree\Node;

class BinarySearchTree
{
    public $root;

    public function __construct(int $data)
    {
        $this->root = new Node($data);
    }

    public function isEmpty(): bool
    {
        return null === $this->root;
    }

    public function insert(int $data): Node
    {
        if ($this->isEmpty()) {
            $node = new Node($data);
            $this->root = $node;

            return $node;
        }

        $node = $this->root;

        while ($node) {
            if ($data > $node->data) {
                if (!$node->right) {
                    $node->right = new Node($data, $node);
                    return $node->right;
                }

                $node = $node->right;
            } elseif ($data < $node->data) {
                if (!$node->left) {
                    $node->left = new Node($data, $node);
                    return $node->left;
                }

                $node = $node->left;
            } else {
                break;
            }
        }

        return $node;
    }

    public function traverse(Node $node, $output = []): array
    {
        if ($node->left) {
            $output = $this->traverse($node->left, $output);
        }

        $output[] = $node->data;

        if ($node->right) {
            $output = $this->traverse($node->right, $output);
        }

        return $output;
    }

    public function search(int $data)
    {
        if ($this->isEmpty()) {
            return false;
        }

        $node = $this->root;

        while ($node) {
            if ($data > $node->data) {
                $node = $node->right;
            } elseif ($data < $node->data) {
                $node = $node->left;
            } else {
                return $node;
            }
        }

        return false;
    }

    public function remove(int $data): void
    {
        $node = $this->search($data);

        if ($node) {
            $node->delete();
        }
    }
}
