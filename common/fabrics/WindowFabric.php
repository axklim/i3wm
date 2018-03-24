<?php

namespace common\fabrics;


use common\entities\Window;

class WindowFabric
{
    public static function create(\stdClass $obj)
    {
        $window = new Window();
        $window->id = $obj->id;
        $window->output = $obj->output;
        $window->name = $obj->name;
        $window->type = $obj->type;
        $window->focused = $obj->focused;
        $window->class = $obj->window_properties->class;
        return $window;
    }
}
