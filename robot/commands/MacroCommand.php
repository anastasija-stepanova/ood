<?php

class MacroCommand implements CommandInterface
{
    /** @var CommandInterface []*/
    private $commands = [];

    public function execute(): void
    {
        foreach ($this->commands as $command)
        {
            $command->execute();
        }
    }

    public function addCommand(CommandInterface $command)
    {
        $this->commands []= $command;
    }
}