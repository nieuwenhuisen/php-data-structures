<?php

declare(strict_types=1);

namespace App\Algorithms\Search;

use App\DataStructures\Tree\Node;

class BinarySearchTree
{
    public const TRAVERSE_IN_ORDER = 'in_order';
    public const TRAVERSE_PRE_ORDER = 'pre_order';
    public const TRAVERSE_POST_ORDER = 'post_order';

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

    public function traverse(Node $node, $type = self::TRAVERSE_IN_ORDER): array
    {
        switch ($type) {
            case self::TRAVERSE_PRE_ORDER:
                return $this->traversePreOrder($node);
            case self::TRAVERSE_POST_ORDER:
                return $this->traversePostOrder($node);
            case self::TRAVERSE_IN_ORDER:
            default:
                return $this->traverseInOrder($node);
        }
    }

    private function traverseInOrder(Node $node, $output = []): array
    {
        if ($node->left) {
            $output = $this->traverseInOrder($node->left, $output);
        }

        $output[] = $node->data;

        if ($node->right) {
            $output = $this->traverseInOrder($node->right, $output);
        }

        return $output;
    }

    private function traversePreOrder(Node $node, $output = []): array
    {
        $output[] = $node->data;

        if ($node->left) {
            $output = $this->traversePreOrder($node->left, $output);
        }

        if ($node->right) {
            $output = $this->traversePreOrder($node->right, $output);
        }

        return $output;
    }

    private function traversePostOrder(Node $node, $output = []): array
    {
        if ($node->left) {
            $output = $this->traversePostOrder($node->left, $output);
        }

        if ($node->right) {
            $output = $this->traversePostOrder($node->right, $output);
        }

        $output[] = $node->data;

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
