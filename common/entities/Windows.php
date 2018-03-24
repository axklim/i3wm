<?php

namespace common\entities;


class Windows
{
    private $windows;
    private $current;

    public function push(Window $window) : void
    {
        if($window->focused()) $this->current = $window;
        $this->windows[$window->id] = $window;
    }

    public function list() : array
    {
        return $this->windows;
    }

    public function current() : Window
    {
        if (!$this->current) {
            throw new \DomainException('Не найдено текущее окно');
        }
        return $this->current;
    }
}
