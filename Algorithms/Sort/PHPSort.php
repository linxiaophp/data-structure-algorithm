<?php

namespace Algorithm\Sort;

use Algorithm\AlgorithmAbstract;

/**
 * PHP排序
 *
 * Class PHPSort
 * @package Algorithm\Sort
 */
class PHPSort extends AlgorithmAbstract
{
    public function achieve()
    {
        sort($this->data);

        return $this->data;
    }
}