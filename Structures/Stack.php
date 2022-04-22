<?php

namespace Structure;

class Stack
{
    protected $length = 10;
    protected $stack = [];

    public function __construct($length = 10)
    {
        $this->length = $length;
    }

    public function insert($item)
    {
        if (count($this->stack) < $this->length) {
            $this->stack[] = $item;
        }
    }

    public function delete()
    {
        array_pop($this->stack);
    }

    public function getStack()
    {
        return $this->stack;
    }
}