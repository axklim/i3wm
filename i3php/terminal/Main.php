<?php

class Main
{
    public $outputs = [
        'eDP1' => 'notebook',
        'HDMI1' => 'monitor'
    ];

    private $workspace;

    public function __construct()
    {
        $this->workspace = new Workspace();
    }

    public function run() : void
    {
        echo $this->getProfile();
        exec('gnome-terminal --hide-menubar' . $this->getProfileOption());
    }

    public function getProfileOption() : ?string
    {
        if( ! $this->getProfile()){
            return null;
        }

        return ' --window-with-profile=' . $this->getProfile();
    }

    public function getProfile() : ?string
    {
        try{
            $workspace = $this->workspace->current();
        }catch (Exception $e){
            return null;
        }

        return $this->outputs[$workspace] ?? null;
    }
}


class Workspace
{
    /**
     * @return string
     * @throws Exception
     */
    public function current() : string
    {
        $json = shell_exec('i3-msg -t get_workspaces');
        $workspaces = json_decode($json);

        foreach ($workspaces as $workspace){
            if($workspace->visible && $workspace->focused && $workspace->output){
                return $workspace->output;
            }
        }
        throw new Exception('Output not found');
    }
}
