<?php

declare(strict_types=1);

namespace App\DataStructures\Tree;

class Node
{
    public $data;
    public $left;
    public $right;
    public $parent;

    public function __construct(int $data = null, self $parent = null)
    {
        $this->data = $data;
        $this->parent = $parent;
    }

    public function min(): self
    {
        $node = $this;

        while ($node->left) {
            $node = $node->left;
        }

        return $node;
    }

    public function max(): self
    {
        $node = $this;

        while ($node->right) {
            $node = $node->right;
        }

        return $node;
    }

    public function successor(): ?self
    {
        $node = $this;

        if ($node->right) {
            /** @var Node $right */
            $right = $node->right;

            return $right->min();
        }

        return null;
    }

    public function predecessor(): ?self
    {
        $node = $this;

        if ($node->left) {
            /** @var Node $left */
            $left = $node->left;

            return $left->max();
        }

        return null;
    }

    public function delete(): void
    {
        $node = $this;

        if (!$node->left && !$node->right) {
            if ($node->parent->left === $node) {
                $node->parent->left = null;
            } else {
                $node->parent->right = null;
            }
        } elseif ($node->left && $node->right) {
            $successor = $node->successor();

            if ($successor) {
                $node->data = $successor->data;
                $successor->delete();
            }
        } elseif ($node->left) {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->left;
                $node->left->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->left;
                $node->left->parent = $node->parent->right;
            }
            $node->left = null;
        } elseif ($node->right) {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->right;
                $node->right->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->right;
                $node->right->parent = $node->parent->right;
            }

            $node->right = null;
        }
    }
}
