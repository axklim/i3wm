#!/usr/bin/php
<?php

namespace common;

spl_autoload_register(function($class){
    require dirname(__DIR__) . '/' . str_replace('\\', '/', $class) . '.php';
});


$i3 = new I3();

var_dump($i3->getCurrentWorkspace());
