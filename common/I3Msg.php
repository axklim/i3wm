<?php

namespace common;

class I3Msg
{
    const COMMAND = 'command';
    const WORKSPACES = 'get_workspaces';
    const OUTPUTS = 'get_outputs';
    const TREE = 'get_tree';
    const MARKS = 'get_marks';
    const BAR_CONFIG = 'get_bar_config';
    const BINDING_MODES = 'get_binding_modes';
    const VERSION = 'get_version';

    static function get(string $type)
    {
        $json = shell_exec('i3-msg -t ' . $type);
        return json_decode($json);
    }

    static function workspaces() : array
    {
        return self::get(self::WORKSPACES);
    }

    static function tree() : \stdClass
    {
        return self::get(self::TREE);
    }
}
