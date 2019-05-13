<?php

class Logout extends Functions
{
    /** @var Menu  */
    private $menu;
    const EXIT = "Exit";

    public function action()
    {
        $args = [];
        if (count($args) != 1) {
            $this->showErrorForCommand(self::EXIT);

            return;
        }
        $this->menu->exit();
    }
}