<?php

namespace Algorithm;

abstract class AlgorithmAbstract implements AlgorithmInterface
{
    protected $data = array();

    protected $oldData = array();

    protected $count = 0;

    protected $dump = false;

    public function __construct($data = array())
    {
        $this->data = $data;
        $this->oldData = $data;
        $this->count = count($data);
    }

    /**
     * 设置数据
     *
     * @param array $data
     * @return $this
     */
    public function setData($data = array())
    {
        $this->data = $data;
        $this->oldData = $data;
        $this->count = count($data);
        return $this;
    }

    /**
     * 开启打印
     *
     * @return $this
     */
    public function openDump()
    {
        $this->dump = true;
        return $this;
    }

    /**
     * 算法实现
     *
     * @return array
     */
    public function achieve()
    {
        return array();
    }

    /**
     * 运行算法
     *
     * @return array
     */
    public function run()
    {
        $result = $this->achieve();

        if ($this->dump) {
            $this->dump($result);
        } else {
            return $result;
        }
    }

    /**
     * 打印
     *
     * @param $data
     */
    public function dump($data)
    {
        print('<pre>');
        print("原数组\n");
        print_r($this->oldData);
        print("新数组\n");
        print_r($data);
        print('<pre>');
    }

    /**
     * 交换元素位置
     *
     * @param $i
     * @param $j
     */
    protected function swap($i, $j)
    {
        $temp = $this->data[$i];
        $this->data[$i] = $this->data[$j];
        $this->data[$j] = $temp;
    }
}