#!/usr/bin/php
<?php

namespace common;

use common\fabrics\WorkspacesFabric;

spl_autoload_register(function($class){
    require dirname(__DIR__) . '/' . str_replace('\\', '/', $class) . '.php';
});



$ws = WorkspacesFabric::create();

var_dump($ws->current()->windows()->list());
