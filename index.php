<?php

require_once 'vendor/autoload.php';

use Michal\BinarySearchTreeAlgorithms\BST;

function test(): void
{
    $bst = new BST();
    $bst->add(9);
    $bst->add(4);
    $bst->add(17);
    $bst->add(3);
    $bst->add(6);
    $bst->add(22);
    $bst->add(5);
    $bst->add(7);
    $bst->add(20);

    try {
        $bst->traverseInOrder();
        echo PHP_EOL . "MIN" . PHP_EOL;
        echo $bst->findMin();
        echo PHP_EOL . "MAX" . PHP_EOL;
        echo $bst->findMax();
        $bst->remove(17);
        $bst->traverseInOrder();
    } catch (Exception $e) {
        echo "Coś poszło nie tak";
    }

}

test();