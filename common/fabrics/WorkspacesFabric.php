<?php

namespace common\fabrics;


use common\entities\Workspaces;

class WorkspacesFabric
{
    public static function create(array $ar) : Workspaces
    {
        $workspaces = new Workspaces();
        /** @var \stdClass $ws */
        foreach ($ar as $ws){
            $workspaces->push(WorkspaceFabric::create($ws));
        }
        return $workspaces;
    }
}
