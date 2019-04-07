<?php

class ExitMenuCommand
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function execute(): void
    {
        $this->menu->logout();
    }
}