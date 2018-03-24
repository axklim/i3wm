<?php
/**
 * Created by PhpStorm.
 * User: gudik
 * Date: 24.03.18
 * Time: 13:40
 */

namespace common\entities;


class Window
{
    public $id;
    public $type;
    public $focused;
    public $name;
    public $output;

    public $class;

    public function focused()
    {
        return $this->focused;
    }
}
