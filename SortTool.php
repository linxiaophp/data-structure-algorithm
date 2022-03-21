<?php

use Algorithm\AlgorithmAbstract;
use Algorithm\Sort\PHPSort;
use Algorithm\Sort\InsertionSort;
use Algorithm\Sort\BubbleSort;
use Algorithm\Sort\ShellSort;
use Algorithm\Sort\MergeSort;
use Algorithm\Sort\QuickSort;

class SortTool
{
    protected $keyMapping = array(
        PHPSort::class => 'PHPSort',
        InsertionSort::class => 'InsertionSort',
        BubbleSort::class => 'BubbleSort',
        ShellSort::class => 'ShellSort',
        MergeSort::class => 'MergeSort',
        QuickSort::class => 'QuickSort',
    );

    protected $znMapping = array(
        'PHPSort' => 'PHP排序',
        'InsertionSort' => '插入排序',
        'BubbleSort' => '冒泡排序',
        'ShellSort' => '希尔排序',
        'MergeSort' => '归并排序',
        'QuickSort' => '快速排序',
    );

    public function getTimeData($data, AlgorithmAbstract $algorithmAbstract, $timeData = array())
    {
        foreach ($this->keyMapping as $key => $keyName) {
            if ($algorithmAbstract instanceof $key) {
                $startTime = microtime(true);
                $result = $algorithmAbstract->setData($data)->run();
                $endTime = microtime(true);
                $diffTime = ($endTime - $startTime) * 1000;
                $timeData[$keyName]['all'][] = $diffTime;
                break;
            }
        }

        return $timeData;
    }

    public function printTimeData($data, $type = 1, $num = 10)
    {
        switch ($type) {
            case 1://输出所有
                print('<pre>');

                foreach ($data as $key => $item) {
                    $title = empty($this->znMapping[$key]) ? $key : $this->znMapping[$key];
                    $title = "{$title}\n";

                    print($title);
                    print_r($item['all']);
                }

                print('<pre>');
                break;
            case 2://输出平均
                print('<pre>');

                foreach ($data as $key => $item) {
                    $title = empty($this->znMapping[$key]) ? $key : $this->znMapping[$key];
                    $title = "{$title}\n";
                    $timeAverage = array_sum($item['all']) / $num;

                    print($title);
                    print_r($timeAverage);
                    print("\n");
                }

                print('<pre>');
                break;
        }
    }
}