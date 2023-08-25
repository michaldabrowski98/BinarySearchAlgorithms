<?php

namespace Michal\BinarySearchTreeAlgorithms;

use Exception;

class BST
{
    private ?Node $root;

    public function __construct(?Node $root = null)
    {
        $this->root = $root;
    }

    public function add(int|string|float $data): void
    {
        $node = $this->root;
        if (null === $node) {
            $this->root = new Node($data);
            return;
        }

        $this->addNodeRecursive($node, $data);
    }

    /**
     * @throws Exception
     */
    public function traverseInOrder(): void
    {
        $node = $this->root;
        if (null === $this->root) {
            throw new Exception('Tree is empty');
        }

        $this->inOrder($node);
    }

    /**
     * @throws Exception
     */
    public function findMin(): int|string|float
    {
        $node = $this->root;
        if (null === $this->root) {
            throw new Exception('Tree is empty');
        }

        while(null !== $node->getLeft()) {
            $node = $node->getLeft();
        }

        return $node->getData();
    }

    /**
     * @throws Exception
     */
    public function findMax(): int|string|float
    {
        $node = $this->root;
        if (null === $this->root) {
            throw new Exception('Tree is empty');
        }

        while(null !== $node->getRight()) {
            $node = $node->getRight();
        }

        return $node->getData();
    }

    /**
     * @throws Exception
     */
    public function find(int|string|float $data): ?Node
    {
        $node = $this->root;
        if (null === $this->root) {
            throw new Exception('Tree is empty');
        }

        while($data !== $node->getData()) {
            if ($data < $node->getData()) {
                $node = $node->getLeft();
            } else {
                $node = $node->getRight();
            }
        }

        return $node;
    }

    /**
     * @throws Exception
     */
    public function remove(int|string|float $data, ?Node $node = null): Node
    {
        $node ??= $this->root;
        if (null === $node) {
            throw new Exception('Tree is empty');
        }

        if ($node->getData() > $data) {
            $node->setLeft($this->remove($data, $node->getLeft()));
            return $node;
        } else if ($node->getData() < $data) {
            $node->setRight($this->remove($data, $node->getRight()));
            return $node;
        }

        if (null === $node->getLeft()) {
            $temp = $node->getRight();
            $node = null;
            return $temp;
        }

        if (null === $node->getLeft()) {
            $temp = $node->getRight();
            $node = null;
            return $temp;
        } else if (null === $node->getRight()) {
            $temp = $node->getLeft();
            $node = null;
            return $temp;
        } else {
            $successorParent = $node;

            $successor = $node->getRight();
            while (null !== $successor->getLeft()) {
                $successorParent = $successor;
                $successor = $successor->getLeft();
            }

            if ($successorParent !== $node) {
                $successorParent->setLeft($successorParent->getRight());
            } else {
                $successorParent->setRight($successorParent->getRight());
            }

            $node->setData($successor->getData());

            $successor = null;
            return $node;
        }
    }


    private function inOrder(?Node $node): void
    {
        if (null === $node) {
            return;
        }

        $this->inOrder($node->getLeft());
        echo sprintf("%s %s", $node->getData(), PHP_EOL);
        $this->inOrder($node->getRight());
    }

    private function addNodeRecursive(Node $node, int|string|float $data): void
    {
        if ($data < $node->getData()) {
            if (null === $node->getLeft()) {
                $node->setLeft(new Node($data));
                return;
            }

            $this->addNodeRecursive($node->getLeft(), $data);
        } else {
            if (null === $node->getRight()) {
                $node->setRight(new Node($data));
                return;
            }

            $this->addNodeRecursive($node->getRight(), $data);
        }
    }
}
