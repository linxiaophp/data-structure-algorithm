<?php

namespace Structure;

class Queue
{
    protected $length = 10;
    protected $queue = [];

    public function __construct($length = 10)
    {
        $this->length = $length;
    }

    public function insert($item)
    {
        if (count($this->queue) < $this->length) {
            $this->queue[] = $item;
        }
    }

    public function delete()
    {
        array_shift($this->queue);
    }

    public function getQueue()
    {
        return $this->queue;
    }
}