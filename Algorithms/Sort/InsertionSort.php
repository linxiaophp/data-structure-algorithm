<?php

namespace Algorithm\Sort;

use Algorithm\AlgorithmAbstract;

/**
 * 插入排序
 *
 * Class InsertionSort
 * @package Algorithm\Sort
 */
class InsertionSort extends AlgorithmAbstract
{
    public function achieve()
    {
        for ($i = 1;$i < $this->count;$i++) {
            for ($j = $i;$j >= 1;$j--) {
                if ($this->data[$j] < $this->data[$j - 1]) {
                    $this->swap($j, $j - 1);
                } else {
                    continue;
                }
            }
        }

        return $this->data;
    }
}