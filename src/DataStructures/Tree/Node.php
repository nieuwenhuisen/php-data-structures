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
        if ($this->left && $this->right) {
            $successor = $this->successor();

            if ($successor) {
                $this->data = $successor->data;
                $successor->delete();
            }

            return;
        }

        $node = $this->left ?? $this->right;

        if ($this->parent->left === $this) {
            $this->parent->left = $node;

            if ($node) {
                $node->parent = $this->parent->left;
            }
        }

        if ($this->parent->right === $this) {
            $this->parent->right = $node;

            if ($node) {
                $node->parent = $this->parent->right;
            }
        }

        $this->left = null;
        $this->right = null;
    }
}
