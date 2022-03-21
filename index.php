<?php

include_once 'vendor/autoload.php';

use Algorithm\Sort\PHPSort;
use Algorithm\Sort\InsertionSort;
use Algorithm\Sort\BubbleSort;
use Algorithm\Sort\ShellSort;
use Algorithm\Sort\MergeSort;
use Algorithm\Sort\QuickSort;

function produceNumberData($num = 10)
{
    $data = array();

    for ($i = $num;$i > 0;$i--) {
        $data[] = $i;
    }

    return $data;
}

$num = 10;
$data = produceNumberData(1000);
$timeData = array();

$sortTool = new SortTool();
$phpSort = new PHPSort();
$insertionSort = new InsertionSort();
$bubbleSort = new BubbleSort();
$shellSort = new ShellSort();
$mergeSort = new MergeSort();
$quickSort = new QuickSort();

for ($i = 0;$i < $num;$i++) {
    //php sort函数排序
    $timeData = $sortTool->getTimeData($data, $phpSort, $timeData);
    //插入排序
    $timeData = $sortTool->getTimeData($data, $insertionSort, $timeData);
    //冒泡排序
    $timeData = $sortTool->getTimeData($data, $bubbleSort, $timeData);
    //希尔排序
    $timeData = $sortTool->getTimeData($data, $shellSort, $timeData);
    //归并排序
    $timeData = $sortTool->getTimeData($data, $mergeSort, $timeData);
    //快速排序
    $timeData = $sortTool->getTimeData($data, $quickSort, $timeData);
}

$sortTool->printTimeData($timeData, 2, $num);
