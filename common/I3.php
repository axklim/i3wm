<?php

namespace common;

use common\entities\Workspace;

class I3
{
    public function getCurrentWorkspace() : Workspace
    {
        $workspaces = I3Msg::workspaces();

        return $workspaces->current();
    }
}
