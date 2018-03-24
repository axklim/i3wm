<?php

namespace common\fabrics;

use common\entities\Windows;
use common\entities\Workspace;
use common\I3Msg;

class WindowsFabric
{
    public static function create(Workspace $ws) : Windows
    {
        $json = I3Msg::tree();
        $windows = [];

        if(!$ws = self::findWs($json, $ws)){
            throw new \DomainException('Не найден текущий ws в дереве i3wm');
        }
        self::findWindows($ws, $windows);
        $w = new Windows();
        foreach($windows as $window){
            $w->push(WindowFabric::create($window));
        }
        return $w;
    }

    public static function findWindows(\stdClass $obj, & $output) : void
    {
        foreach ($obj->nodes as $node){
            if(self::isWindow($node)){
                $output[] = $node;
            }
            self::findWindows($node, $output);
        }
    }

    public static function isWindow(\stdClass $obj) : bool
    {
        if(isset($obj->name) && $obj->name != ''
            && $obj->type == 'con'
            && isset($obj->window) && is_int($obj->window)) return true;
        return false;
    }

    public static function findWs($json, Workspace $ws) : ?\stdClass
    {
        foreach ($json->nodes as $node){
            if(($node->name == $ws->name) && ($node->num == $ws->num)){
                return $node;
            }
            if($ret = self::findWs($node, $ws)){
                return $ret;
            }
        }
        return null;
    }
}
