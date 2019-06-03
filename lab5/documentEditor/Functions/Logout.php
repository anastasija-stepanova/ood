<?php

class Logout extends Functions
{
    /** @var Menu  */
    private $menu;
    const EXIT = "Exit";

    public function action($argv, $argc): void
    {
        if (count($argc) != 1) {
            $this->showErrorForCommand(self::EXIT);

            return;
        }
        $this->menu->exit();
    }
}