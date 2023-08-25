<?php

namespace Michal\BinarySearchTreeAlgorithms;

class Node
{
    public function __construct(
        private int|string|float $data,
        private ?Node $left = null,
        private ?Node $right = null
    ) {}

    public function getData(): float|int|string
    {
        return $this->data;
    }

    public function setData(float|int|string $data): void
    {
        $this->data = $data;
    }

    public function getLeft(): ?Node
    {
        return $this->left;
    }

    public function setLeft(?Node $left): void
    {
        $this->left = $left;
    }

    public function getRight(): ?Node
    {
        return $this->right;
    }

    public function setRight(?Node $right): void
    {
        $this->right = $right;
    }
}
