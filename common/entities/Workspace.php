<?php

namespace common\entities;

use common\fabrics\WindowsFabric;

class Workspace
{
    public $num;
    public $name;
    public $visible;
    public $focused;
    public $output;

    private $windows;

    public function isCurrent() : bool
    {
        if($this->visible && $this->focused) return true;
        return false;
    }

    public function windows() : Windows
    {
        if($this->windows) return $this->windows;
        $this->windows = WindowsFabric::create($this);
        return $this->windows();
    }
}
