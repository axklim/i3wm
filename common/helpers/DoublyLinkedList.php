<?php

namespace common\helpers;

class DoublyLinkedList
{
    private $items = [];
    private $iterator = 0;

    public function __construct(array $items)
    {
        foreach ($items as $item){
            $this->items[] = $item;
        }
    }

    public function rewindToValue($value) : void
    {
        foreach ($this->items as $index => $item){
            if($item == $value){
                $this->iterator = $index;
            }
        }
    }

    public function next() : void
    {
        if($this->canNext()){
            $this->iterator++;
        }else{
            $this->rewind();
        }
    }

    public function prev() : void
    {
        if($this->canPrev()){
            $this->iterator--;
        }else{
            $this->rewindToEnd();
        }
    }

    public function current()
    {
        return $this->items[$this->iterator];
    }

    public function getItems() : array
    {
        return $this->items;
    }

    public function rewind() : void
    {
        $this->iterator = 0;
    }

    public function rewindToEnd() : void
    {
        $this->iterator = (count($this->items) - 1);
    }

    public function canNext() : bool
    {
        return isset($this->items[$this->iterator + 1]);
    }

    public function canPrev() : bool
    {
        return isset($this->items[$this->iterator - 1]);
    }
}
