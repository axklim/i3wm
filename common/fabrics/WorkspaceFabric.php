<?php

namespace common\fabrics;

use common\entities\Workspace;

class WorkspaceFabric
{
    public static function create(\stdClass $obj) : Workspace
    {
        $workspace = new Workspace();
        $workspace->num = $obj->num;
        $workspace->name = $obj->name;
        $workspace->visible = $obj->visible;
        $workspace->focused = $obj->focused;
        $workspace->output = $obj->output;
        return $workspace;
    }
}
