<?php

namespace Algorithm\Sort;

use Algorithm\AlgorithmAbstract;

/**
 * 快速排序
 *
 * Class QuickSort
 * @package Algorithm\Sort
 */
class QuickSort extends AlgorithmAbstract
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

        $p = $this->partition($leftIndex, $rightIndex);
        $this->sort($leftIndex, $p - 1);
        $this->sort($p + 1, $rightIndex);
    }

    protected function partition($leftIndex, $rightIndex)
    {
        $this->swap($leftIndex, rand($leftIndex, $rightIndex));

        $v = $this->data[$leftIndex];
        $j = $leftIndex;

        for ($i = $leftIndex + 1;$i <= $rightIndex;$i++) {
            if ($this->data[$i] < $v) {
                $j++;
                $this->swap($j, $i);
            }
        }

        $this->swap($leftIndex, $j);

        return $j;
    }


}