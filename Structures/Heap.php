<?php

namespace Structure;

/**
 * ¶Ñ
 *
 * Class Heap
 */
class Heap
{
    protected $heap = [];

    public function __construct($heap = ['-'])
    {
        $this->heap = $heap;
    }

    public function insert($number)
    {
        $this->heap[] = $number;
        $this->shiftUp(count($this->heap) - 1);
    }

    public function extractMax()
    {
        $maxNode = 1;
        $maxNumber = $this->heap[$maxNode] ?? null;
        $this->shiftDown($maxNode);

        return $maxNumber;
    }

    public function getHeap()
    {
        return $this->heap;
    }

    protected function shiftUp($node)
    {
        if ($node == 0) {
            return true;
        }

        $parentNode = $this->getParentNode($node);

        if ($parentNode == $node || $parentNode == 0) {
            return true;
        }

        $number = $this->heap[$node];
        $parentNumber = $this->heap[$parentNode];

        if ($number <= $parentNumber) {
            return true;
        }

        $this->heap[$parentNode] = $number;
        $this->heap[$node] = $parentNumber;

        return $this->shiftUp($parentNode);
    }

    protected function shiftDown($node)
    {
        if (count($this->heap) < 3) {
            return true;
        }

        $number = array_pop($this->heap);
        $this->heap[$node] = $number;
        $j = $node;
        $count = count($this->heap);

        while (true) {
            $leftChild = $j * 2;
            $rightChild = $leftChild + 1;

            if (!isset($this->heap[$leftChild]) && !isset($this->heap[$rightChild])) {
                break;
            }

            $rightChild = $rightChild > ($count - 1) ? $leftChild : $rightChild;

            $biggerChild = $this->heap[$leftChild] > $this->heap[$rightChild] ? $leftChild : $rightChild;

            if ($this->heap[$j] > $this->heap[$biggerChild]) {
                break;
            }

            $temp = $this->heap[$biggerChild];
            $this->heap[$biggerChild] = $this->heap[$j];
            $this->heap[$j] = $temp;

            $j = $biggerChild;
        }
    }

    protected function getParentNode($node)
    {
        return floor($node / 2);
    }
}