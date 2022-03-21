<?php

namespace Algorithm\Sort;

use Algorithm\AlgorithmAbstract;

/**
 * 冒泡排序
 *
 * Class BubbleSort
 * @package Algorithm\Sort
 */
class BubbleSort extends AlgorithmAbstract
{
    public function achieve()
    {
        $k = $this->count - 1;
        $pos = 0;

        for ($i = 0;$i < $this->count - 1;$i++) {
            $flag = 0;

            for ($j = 0;$j < $k;$j++) {
                if ($this->data[$j] > $this->data[$j + 1]) {
                    $this->swap($j, $j + 1);
                    $flag = 1;
                    $pos = $j;
                }
            }

            $k = $pos;

            if ($flag == 0) {
                break;
            }
        }

        return $this->data;
    }
}