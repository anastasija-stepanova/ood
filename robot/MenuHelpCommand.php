<?php

class MenuHelpCommand implements CommandInterface
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function execute(): void
    {
        $this->menu->showInstructions();
    }
}