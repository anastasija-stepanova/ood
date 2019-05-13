<?php

class Functions
{
    /** @var Menu  */
    private $menu;
    const END_POSITION = "end";

    public function action()
    {

    }

    public function getPosition(string $pos): int
    {
        if ($pos->equalsIgnoreCase(self::END_POSITION)) {
            return -1;
        }
        $value = $pos;
        if ($value < 0) {
            echo "Wrong position";
        }

        return $value;
    }

    public function showErrorForCommand(string $message): void
    {
        echo "Incorrect number of parameter for \"" . $message . "\" command.";

        $this->menu->showInstructions();
        return;
    }
}