<?php

namespace Algorithm\Sort;

use Algorithm\AlgorithmAbstract;

/**
 * 希尔排序
 *
 * Class ShellSort
 * @package Algorithm\Sort
 */
class ShellSort extends AlgorithmAbstract
{
    public function achieve()
    {
        for ($gap = ceil($this->count / 2);$gap > 0;$gap = $gap / 2) {
            if ($gap == 1.5) {
                $gap = floor($gap);
            } else {
                $gap = ceil($gap);
            }

            for ($i = $gap;$i < $this->count;$i++) {
                $temp = $this->data[$i];

                for ($j = $i;$j >= $gap && ($temp < $this->data[$j - $gap]);$j -= $gap) {
                    $this->data[$j] = $this->data[$j - $gap];
                }
                $this->data[$j] = $temp;
            }

            if ($gap == 1) {
                break;
            }
        }

        return $this->data;
    }
}