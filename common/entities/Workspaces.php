<?php

namespace common\entities;

class Workspaces
{
    private $workspaces;
    private $current;

    public function push(Workspace $workspace)
    {
        if($workspace->isCurrent()) $this->current = $workspace;
        $this->workspaces[$workspace->num] = $workspace;
    }

    public function current() : Workspace
    {
        if(!$this->current){
            throw new \DomainException('Не найден текущий workspace');
        }
        return $this->current;
    }
}
