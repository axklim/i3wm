<?php

namespace common\entities;

class Workspace
{
    public $num;
    public $name;
    public $visible;
    public $focused;
    public $output;

    public function isCurrent() : bool
    {
        if($this->visible && $this->focused) return true;
        return false;
    }
}
