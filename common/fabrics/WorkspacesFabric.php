<?php

namespace common\fabrics;


use common\entities\Workspaces;
use common\I3Msg;

class WorkspacesFabric
{
    public static function create() : Workspaces
    {
        $ar = I3Msg::workspaces();
        $workspaces = new Workspaces();
        /** @var \stdClass $ws */
        foreach ($ar as $ws){
            $workspaces->push(WorkspaceFabric::create($ws));
        }
        return $workspaces;
    }
}
