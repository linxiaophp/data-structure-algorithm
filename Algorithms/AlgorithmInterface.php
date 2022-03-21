<?php

namespace Algorithm;

/**
 * 算法接口
 *
 * Interface AlgorithmInterface
 * @package Algorithm
 */
interface AlgorithmInterface
{
    /**
     * 设置数据
     *
     * @param array $data
     * @return mixed
     */
    public function setData($data = array());

    /**
     * 算法实现
     *
     * @return mixed
     */
    public function achieve();

    /**
     * 运行算法
     *
     * @return mixed
     */
    public function run();
}