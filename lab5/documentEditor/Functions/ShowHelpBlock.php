<?php

class ShowHelpBlock extends Functions
{
    /** @var Menu*/
    private $menu;
    const HELP = "Help";

    public function action()
    {
        $args = [];
        if (count($args) != 1) {
            $this->showErrorForCommand(self::HELP);

            return;
        }
        $this->menu->showInstructions();
    }
}