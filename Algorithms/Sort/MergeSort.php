<?php

namespace Algorithm\Sort;

use Algorithm\AlgorithmAbstract;

/**
 * 归并排序
 *
 * Class MergeSort
 * @package Algorithm\Sort
 */
class MergeSort extends AlgorithmAbstract
{
    public function achieve()
    {
        $this->sort(0, $this->count - 1);

        return $this->data;
    }

    protected function sort($leftIndex, $rightIndex)
    {
        if ($leftIndex >= $rightIndex) {
            return true;
        }

        $mid = ($leftIndex + $rightIndex) / 2;
        $mid = floor($mid);
        $this->sort($leftIndex, $mid);
        $this->sort($mid + 1, $rightIndex);

        if ($this->data[$mid] > $this->data[$mid + 1]) {
            $this->merge($leftIndex, $mid, $rightIndex);
        }
    }

    protected function merge($leftIndex, $mid, $rightIndex)
    {
        $data = array_slice($this->data, $leftIndex, $rightIndex + 1);
        $i = $leftIndex;
        $j = $mid + 1;

        for ($k = $leftIndex;$k <= $rightIndex;$k++) {
            if ($i > $mid) {
                $this->data[$k] = $data[$j - $leftIndex];
                $j++;
            } elseif ($j > $rightIndex) {
                $this->data[$k] = $data[$i - $leftIndex];
                $i++;
            } elseif ($data[$i - $leftIndex] < $data[$j - $leftIndex]) {
                $this->data[$k] = $data[$i - $leftIndex];
                $i++;
            } else {
                $this->data[$k] = $data[$j - $leftIndex];
                $j++;
            }
        }
    }
}