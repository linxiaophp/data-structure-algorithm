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
        $number = array_pop($this->heap);
        $this->heap[$maxNode] = $number;
        $this->shiftDown($maxNode);

        return $maxNumber;
    }

    public function heapify()
    {
        $count = count($this->heap) - 1;

        for ($i = floor($count / 2);$i > 0;$i--) {
            $this->shiftDown($i);
        }
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

        if ($this->heap[$node] <= $this->heap[$parentNode]) {
            return true;
        }

        $this->swap($node, $parentNode);

        return $this->shiftUp($parentNode);
    }

    protected function shiftDown($node)
    {
        if (count($this->heap) < 3) {
            return true;
        }

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

            $this->swap($j, $biggerChild);

            $j = $biggerChild;
        }
    }

    protected function swap($i, $j)
    {
        $temp = $this->heap[$i];
        $this->heap[$i] = $this->heap[$j];
        $this->heap[$j] = $temp;
    }

    protected function getParentNode($node)
    {
        return floor($node / 2);
    }
}